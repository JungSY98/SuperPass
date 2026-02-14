<script>
/* ==========================================================================
 * Map init (Kakao / Google) + Zoom/Pan Lock
 * + My Location (Auto Start) + Heading (Compass Beam)
 * Interactivity-hardened: higher z-index, pointer-events fixes, explicit permission prompts & logs
 * File: scriptMapInit.php
 * ========================================================================== */
(function(App){
	'use strict';
	/* ====== minimal CSS for busy state & toast ====== */
	function ensureGeoStyles(){
		if (document.getElementById('geoStyle')) return;
		const css = `
		#mapUiOverlay button.busy { opacity: .85; }
		#mapUiOverlay button.busy::after {
			content: '';
			display:inline-block; width:12px; height:12px; margin-left:6px;
			border:2px solid #999; border-top-color: transparent; border-radius:50%;
			animation: geo-spin 1s linear infinite; vertical-align:-2px;
		}
		@keyframes geo-spin { to { transform: rotate(360deg); } }
		#mapToast {
			position:fixed; left:50%; bottom:40px; transform:translateX(-50%);
			max-width:80%; background:#111; color:#fff; padding:10px 14px; border-radius:10px;
			box-shadow:0 4px 12px rgba(0,0,0,.4); font-size:13px; z-index:100002; opacity:.96;
			pointer-events:none;
		}
		#mapToast.ok { background:#0a7; }
		#mapToast.err { background:#c33; }
		`;
		const s=document.createElement('style'); s.id='geoStyle'; s.textContent=css; document.head.appendChild(s);
	}
	function showToast(msg, cls){
		ensureGeoStyles();
		const host = document.getElementById('mapUiOverlay') || document.body;
		let t = document.getElementById('mapToast');
		if (!t){ t = document.createElement('div'); t.id='mapToast'; host.appendChild(t); }
		t.className = cls ? cls : '';
		t.textContent = msg;
		clearTimeout(window.__hideToastTimer);
		t.style.display='block';
		window.__hideToastTimer = setTimeout(()=>{ t.style.display='none'; }, 2200);
	}
	/* ====== small logger ====== */
	const LOG_PREFIX = '[MAP-GEO]';
	function log(){ try{ console.log.apply(console, [LOG_PREFIX, ...arguments]); }catch(_){} }
	function warn(){ try{ console.warn.apply(console, [LOG_PREFIX, ...arguments]); }catch(_ ){} }

	/* ====== math helpers ====== */
	const EARTH_R = 6378137;
	const toRad = d => d * Math.PI / 180;
	const toDeg = r => r * 180 / Math.PI;
	function computeDestination(lat, lng, distMeters, bearingDeg){
		const brng = toRad(bearingDeg), ang = distMeters / EARTH_R;
		const lat1 = toRad(lat), lng1 = toRad(lng);
		const sinLat1 = Math.sin(lat1), cosLat1 = Math.cos(lat1);
		const sinAng = Math.sin(ang), cosAng = Math.cos(ang);
		const lat2 = Math.asin( sinLat1 * cosAng + cosLat1 * sinAng * Math.cos(brng) );
		const lng2 = lng1 + Math.atan2(Math.sin(brng)*sinAng*cosLat1, cosAng - sinLat1*Math.sin(lat2));
		return { lat: toDeg(lat2), lng: (toDeg(lng2) + 540) % 360 - 180 };
	}

	/* ====== bounds helpers ====== */
	function computeBoundsFromMarkers(markers, api){
		if (!markers || markers.length === 0) return null;
		if (api === 'kakao'){
			const b = new kakao.maps.LatLngBounds();
			markers.forEach(m => b.extend(m.getPosition ? m.getPosition() : m));
			return b;
		}else{
			const b = new google.maps.LatLngBounds();
			markers.forEach(m => b.extend(m.getPosition ? m.getPosition() : m));
			return b;
		}
	}
	function expandBoundsByKm(bounds, km, api){
		const kmPerDegLat = 111.0;
		if (api === 'kakao'){
			const sw = bounds.getSouthWest(), ne = bounds.getNorthEast();
			const centerLat = (sw.getLat() + ne.getLat()) / 2;
			const kmPerDegLng = 111.0 * Math.cos(centerLat * Math.PI / 180);
			const dLat = km / kmPerDegLat, dLng = km / kmPerDegLng;
			const newSw = new kakao.maps.LatLng(sw.getLat() - dLat, sw.getLng() - dLng);
			const newNe = new kakao.maps.LatLng(ne.getLat() + dLat, ne.getLng() + dLng);
			return new kakao.maps.LatLngBounds(newSw, newNe);
		}else{
			const sw = bounds.getSouthWest(), ne = bounds.getNorthEast();
			const centerLat = (sw.lat() + ne.lat()) / 2;
			const kmPerDegLng = 111.0 * Math.cos(centerLat * Math.PI / 180);
			const dLat = km / kmPerDegLat, dLng = km / kmPerDegLng;
			const newSw = new google.maps.LatLng(sw.lat() - dLat, sw.lng() - dLng);
			const newNe = new google.maps.LatLng(ne.lat() + dLat, ne.lng() + dLng);
			return new google.maps.LatLngBounds(newSw, newNe);
		}
	}

	/* ====== lock google/kakao ====== */
	function lockGoogleMap(map, markers, opt={}){
		const {minZoom=12, maxZoom=18, padKm=50} = opt;
		const mb = computeBoundsFromMarkers(markers, 'google'); if(!mb) return;
		const fence = expandBoundsByKm(mb, padKm, 'google');
		map.setOptions({minZoom, maxZoom, restriction:{latLngBounds:fence, strictBounds:true}});
		map.fitBounds(mb);
		map.__fenceBounds = fence;
	}
	function lockKakaoMap(map, markers, opt={}){
		const {minLevel=3, maxLevel=8, padKm=50} = opt;
		const mb = computeBoundsFromMarkers(markers, 'kakao'); if(!mb) return;
		const fence = expandBoundsByKm(mb, padKm, 'kakao');
		map.__fenceBounds = fence;
		map.setBounds(mb);

		function getViewBounds(){ try{return map.getBounds();}catch(_){return null;} }
		function clampToFence(){
			const view = getViewBounds(); if(!view) return;
			const swV=view.getSouthWest(), neV=view.getNorthEast();
			const swF=fence.getSouthWest(), neF=fence.getNorthEast();
			const halfLat=(neV.getLat()-swV.getLat())/2, halfLng=(neV.getLng()-swV.getLng())/2;
			const minLat=swF.getLat()+halfLat, maxLat=neF.getLat()-halfLat;
			const minLng=swF.getLng()+halfLng, maxLng=neF.getLng()-halfLng;

			const fenceLatSpan=neF.getLat()-swF.getLat(), fenceLngSpan=neF.getLng()-swF.getLng();
			const viewLatSpan=neV.getLat()-swV.getLat(), viewLngSpan=neV.getLng()-swV.getLng();
			let adjusted=false;
			while((viewLatSpan>fenceLatSpan || viewLngSpan>fenceLngSpan) && map.getLevel()>minLevel){ map.setLevel(map.getLevel()-1); adjusted=true; break; }
			if(adjusted) return;
			const c=map.getCenter();
			const lat=Math.min(Math.max(c.getLat(),minLat),maxLat);
			const lng=Math.min(Math.max(c.getLng(),minLng),maxLng);
			if(lat!==c.getLat() || lng!==c.getLng()) map.setCenter(new kakao.maps.LatLng(lat,lng));
		}
		kakao.maps.event.addListener(map,'zoom_changed',function(){ const lv=map.getLevel(); if(lv<minLevel) map.setLevel(minLevel); if(lv>maxLevel) map.setLevel(maxLevel); });
		kakao.maps.event.addListener(map,'idle',function(){ const lv=map.getLevel(); if(lv<minLevel) map.setLevel(minLevel); if(lv>maxLevel) map.setLevel(maxLevel); clampToFence(); });
	}

	/* ====== loader ====== */
	function loadScript(src, cb, onerr){
		if (document.querySelector(`script[src="${src}"]`)) return;
		const s=document.createElement('script'); s.src=src; s.async=true; s.defer=true;
		if(cb) s.onload=cb; if(onerr) s.onerror=onerr; document.head.appendChild(s);
	}
	/* ---------- [ADD] Kakao: 검은 점 마커(CustomOverlay) ---------- */
	function createKakaoDotOverlay(lat, lng, sizePx){
		const d = Math.max(6, sizePx|0 || 10);
		const el = document.createElement('div');
		el.style.cssText = `
			width:${d}px;height:${d}px;border-radius:50%;
			background:#000; box-shadow:0 0 0 2px rgba(255,255,255,.85), 0 0 6px rgba(0,0,0,.35);
			//transform:translate(-50%,-50%);
			pointer-events:none;
		`;
		return new kakao.maps.CustomOverlay({
			position: new kakao.maps.LatLng(lat, lng),
			content: el,
			xAnchor: 0.5,
			yAnchor: 0.5,
			zIndex: 99999
		});
	}

	/* ---------- [ADD] Kakao: 방향 삼각형(CustomOverlay, 픽셀 고정 + 그라데이션) ---------- */
	function createKakaoBeamOverlay(sizePx, fovDeg){
		const W = Math.max(40, sizePx|0 || 120);
		const H = W;
		const half = W/2;

		// ▼ 정점(=현재위치)을 "아래 중앙"에 둡니다. (= 지도 좌표 = 앵커)
		const tipX = half;
		const tipY = H - 6;

		// 끝쪽(멀리) 밑변(=넓은 변)은 윗쪽에 배치
		const farY = 6;
		const fov = (fovDeg || 60) * Math.PI/180;
		const halfBase = Math.tan(fov/2) * (tipY - farY);
		const farL = Math.max(6,	half - halfBase);
		const farR = Math.min(W-6, half + halfBase);

		const gid = 'grad-' + Math.random().toString(36).slice(2);
		const mid = 'hole-' + Math.random().toString(36).slice(2); // 중앙 홀(선택)

		// ★ 그라데이션: 정점(tip)에서 가장 진함 → 위쪽(멀리)로 갈수록 연함
		const svg =
		`<svg xmlns="http://www.w3.org/2000/svg" width="${W}" height="${H}" viewBox="0 0 ${W} ${H}" style="display:block">
		<defs>
			<linearGradient id="${gid}" x1="50%" y1="100%" x2="50%" y2="0%">
			<stop offset="0%"	 stop-color="#10A07E" stop-opacity="0.70"/>	 <!-- tip(현재위치) -->
			<stop offset="65%"	stop-color="#10A07E" stop-opacity="0.24"/>
			<stop offset="100%" stop-color="#10A07E" stop-opacity="0.05"/>		<!-- 멀리 -->
			</linearGradient>
			<mask id="${mid}">
			<rect x="0" y="0" width="100%" height="100%" fill="white"/>
			<!-- 현재위치 검은점 가독성 보장용 작은 구멍 -->
			<circle cx="${tipX}" cy="${tipY}" r="8" fill="black"/>
			</mask>
		</defs>
		<polygon points="${tipX},${tipY} ${farL},${farY} ${farR},${farY}"
				 fill="url(#${gid})" stroke="none" mask="url(#${mid})"/>
		</svg>`;

		const host = document.createElement('div');
		host.style.cssText = `
		width:${W}px;height:${H}px;
		/* 회전축=정점(현재위치) */
		transform-origin:${tipX}px ${tipY}px;
		transform:rotate(0deg);
		pointer-events:none;
		`;
		host.innerHTML = svg;

		// ★ Kakao CustomOverlay 좌표 = 정점
		const overlay = new kakao.maps.CustomOverlay({
		position: new kakao.maps.LatLng(37.5665,126.9780), // dummy
		content: host,
		xAnchor: tipX / W,
		yAnchor: tipY / H,
		zIndex: 99998
		});

		// ▲ iOS webkitCompassHeading는 시계방향, CSS도 시계방향 → '거꾸로' 보여서 360 - θ
		overlay.__setHeading = function(deg){
			host.style.transform = `rotate(${(deg||0)%360}deg)`; // 반전 제거
		};
		overlay.__setPosition = function(lat, lng){
		overlay.setPosition(new kakao.maps.LatLng(lat, lng));
		};
		return overlay;
	}

	/* ---------- [ADD] Google: 픽셀고정 방향 웨지(OverlayView + SVG) ---------- */
	function createGoogleBeamOverlay(map, sizePx, fovDeg){
		const W = Math.max(40, sizePx|0 || 120);
		const H = W;
		const half = W/2;
		const tipX = half;
		const tipY = H - 6;
		const farY = 6;
		const fov = (fovDeg||60) * Math.PI/180;
		const halfBase = Math.tan(fov/2) * (tipY - farY);
		const farL = Math.max(6,	half - halfBase);
		const farR = Math.min(W-6, half + halfBase);

		const gid = 'ggrad-' + Math.random().toString(36).slice(2);
		const mid = 'ghole-' + Math.random().toString(36).slice(2);

		const svg =
		`<svg xmlns="http://www.w3.org/2000/svg" width="${W}" height="${H}" viewBox="0 0 ${W} ${H}" style="display:block">
			<defs>
				<linearGradient id="${gid}" x1="50%" y1="100%" x2="50%" y2="0%">
					<stop offset="0%"	 stop-color="#1A73E8" stop-opacity="0.70"/>
					<stop offset="65%"	stop-color="#1A73E8" stop-opacity="0.24"/>
					<stop offset="100%" stop-color="#1A73E8" stop-opacity="0.05"/>
				</linearGradient>
				<mask id="${mid}">
					<rect x="0" y="0" width="100%" height="100%" fill="white"/>
					<circle cx="${tipX}" cy="${tipY}" r="8" fill="black"/>
				</mask>
			</defs>
			<polygon points="${tipX},${tipY} ${farL},${farY} ${farR},${farY}"
							 fill="url(#${gid})" stroke="none" mask="url(#${mid})"/>
		</svg>`;

		// OverlayView 구현
		function Beam(){ this.div = null; this.latlng = new google.maps.LatLng(37.5665,126.9780); this.heading = 0; }
		Beam.prototype = new google.maps.OverlayView();

		Beam.prototype.onAdd = function(){
			const div = document.createElement('div');
			div.style.position = 'absolute';
			div.style.width	= W + 'px';
			div.style.height = H + 'px';
			div.style.pointerEvents = 'none';
			// 회전축 = 정점
			div.style.transformOrigin = `${tipX}px ${tipY}px`;
			div.innerHTML = svg;
			this.div = div;
			const panes = this.getPanes();
			panes.overlayMouseTarget.appendChild(div); // 마커 위에 표시
		};

		Beam.prototype.draw = function(){
			if (!this.div) return;
			const proj = this.getProjection();
			const p = proj.fromLatLngToDivPixel(this.latlng);
			// 정점이 지도 좌표에 정확히 오도록 좌상단 좌표를 보정
			this.div.style.left = (p.x - tipX) + 'px';
			this.div.style.top	= (p.y - tipY) + 'px';
			this.div.style.transform = `rotate(${(this.heading||0)%360}deg)`;
		};

		Beam.prototype.onRemove = function(){
			if (this.div && this.div.parentNode) this.div.parentNode.removeChild(this.div);
			this.div = null;
		};

		// 헬퍼
		Beam.prototype.__setHeading = function(deg){ this.heading = deg; this.draw(); };
		Beam.prototype.__setPosition = function(lat,lng){ this.latlng = new google.maps.LatLng(lat,lng); this.draw(); };

		const overlay = new Beam();
		overlay.setMap(map);
		return overlay;
	}

	/* ====== config ====== */
	App.MAP_LOCK = App.MAP_LOCK || {
		google: { minZoom: 10, maxZoom: 20, padKm: 50 },
		kakao : { minLevel: 1,	maxLevel: 20,	padKm: 50 },
	};
	App.FOCUS_ZOOM = App.FOCUS_ZOOM || {
		google: 18,	 // 모바일 포커스 때 적용할 절대 줌
		kakao : 4		 // 카카오맵은 숫자 작을수록 확대 (level)
	};





	/* ====== GEO (my location + heading) ====== */
	App.GEO = App.GEO || {
		setBusy(flag){
			const b = document.getElementById('btnMyLocation');
			if (!b) return;
			ensureGeoStyles();
			/*
			if (flag)
				b.classList.add('busy');
			else
				b.classList.remove('busy');
			*/
		},

		watchId:null, marker:null, circle:null, beam:null, isActive:false, headingDeg:null,
		beamLen:80, beamFov:60,

		clear(){
			try{ if(this.watchId && navigator.geolocation) navigator.geolocation.clearWatch(this.watchId);}catch(_){}
			this.watchId=null;
			if (App.MAP?.provider==='google'){ this.marker?.setMap(null); this.circle?.setMap(null); this.beam?.setMap(null); }
			if (App.MAP?.provider==='kakao'){ this.marker?.setMap(null); this.circle?.setMap(null); this.beam?.setMap(null); }
			this.marker=this.circle=this.beam=null; this.isActive=false;
			document.getElementById('btnMyLocation')?.classList.remove('active');
			this.setBusy(false);
			showToast('현재 위치 끔');
			log('GEO cleared');
		},

		updateBeam(lat,lng){
			if (this.headingDeg==null) return;
			const h=this.headingDeg, h1=(h-this.beamFov/2+360)%360, h2=(h+this.beamFov/2)%360;
			const p1=computeDestination(lat,lng,this.beamLen,h1), p2=computeDestination(lat,lng,this.beamLen,h2);
			if (App.MAP?.provider==='google' && window.google){
				if (!this.beam){
				this.beam = createGoogleBeamOverlay(App.MAP.map, 60, this.beamFov || 120);
				}
				this.beam.__setPosition(lat, lng);
				const deg = (typeof this.headingDeg==='number') ? this.headingDeg : 0;
				this.beam.__setHeading(deg);	// 내부에서 360- 보정 적용
			}
			if (App.MAP?.provider==='kakao' && window.kakao){
				if (!this.beam){
				this.beam = createKakaoBeamOverlay(60, this.beamFov || 120);
				this.beam.setMap(App.MAP.map);
				}
				this.beam.__setPosition(lat, lng);
				const deg = (typeof this.headingDeg==='number') ? this.headingDeg : 0;
				this.beam.__setHeading(deg);				// ← 내부에서 360-보정
			}
		},

		onCompass(e){
			let heading=null;
			if (typeof e.webkitCompassHeading==='number'){ heading=e.webkitCompassHeading; }
			else if (typeof e.alpha==='number'){ heading=(e.alpha); }
			if (heading!=null){
				const angle=(screen.orientation && typeof screen.orientation.angle==='number')?screen.orientation.angle:(window.orientation||0);
				this.headingDeg=(heading+angle+360)%360;
				// 매 틱마다 beam 갱신 (현재 위치 저장해두진 않으므로 marker 위치로 유추)
				let lat=null, lng=null;
				if (this.marker){
					if (App.MAP?.provider==='google') { const p=this.marker.getPosition(); lat=p.lat(); lng=p.lng(); }
					if (App.MAP?.provider==='kakao')	{ const p=this.marker.getPosition(); lat=p.getLat(); lng=p.getLng(); }
					if (lat!=null) this.updateBeam(lat, lng);
				}
			}
		},

		async enableCompass(){
			try{
				if (window.DeviceOrientationEvent && typeof DeviceOrientationEvent.requestPermission==='function'){
					const state=await DeviceOrientationEvent.requestPermission();
					if (state!=='granted'){ warn('Compass permission denied'); return false; }
				}
				window.addEventListener('deviceorientation', this.onCompass.bind(this), true);
				window.addEventListener('deviceorientationabsolute', this.onCompass.bind(this), true);
				log('Compass enabled');
				return true;
			}catch(e){ warn('Compass not available', e); return false; }
		},

		start(){
			if (!('geolocation' in navigator)){ warn('Geolocation not supported'); return; }
			if (location.protocol!=='https:'){ warn('Geolocation requires HTTPS for accuracy'); }
			this.isActive=true;
			document.getElementById('btnMyLocation')?.classList.add('active');

			showToast('현재 위치 검색 중…');
			this.setBusy(true);

			const opts={enableHighAccuracy:true, maximumAge:5000, timeout:10000};
			this.watchId = navigator.geolocation.watchPosition(pos=>{
				const lat=pos.coords.latitude, lng=pos.coords.longitude, acc=Math.max(10,Math.min(pos.coords.accuracy||50,500));
				const course=(typeof pos.coords.heading==='number' && !isNaN(pos.coords.heading))?pos.coords.heading:null;
				if (!App.MAP || !App.MAP.map) return;

				// draw
				if (App.MAP.provider==='google' && window.google){
					if (!this.marker){ this.marker=new google.maps.Marker({map:App.MAP.map, clickable:false, zIndex:99999, icon:{path:google.maps.SymbolPath.CIRCLE, scale:6}, title:'내 위치'}); }
					this.marker.setPosition(new google.maps.LatLng(lat,lng));
					if (!this.circle){ this.circle=new google.maps.Circle({map:App.MAP.map, strokeWeight:1, fillOpacity:0.15}); }
					this.circle.setCenter({lat,lng}); this.circle.setRadius(acc);
					const fb=App.MAP.map.__fenceBounds; if (fb && !fb.contains({lat,lng})) { App.MAP.map.fitBounds(fb); } else { App.MAP.map.panTo({lat,lng}); }
				}
				 if (App.MAP.provider==='kakao' && window.kakao){
					 // 1) 현재 위치 "검은 점" (픽셀 고정)
					 if (!this.marker){
					 this.marker = createKakaoDotOverlay(lat, lng, 10);
					 this.marker.setMap(App.MAP.map);
					 } else {
					 this.marker.setPosition(new kakao.maps.LatLng(lat, lng));
					 }
					 // 2) 정확도 원은 기존 유지(지오펜스와 중복되면 끄실 수 있어요)
					 const ll = new kakao.maps.LatLng(lat,lng);
					 if (!this.circle){
					 this.circle = new kakao.maps.Circle({
						 center: ll, radius: acc,
						 strokeWeight: 1, strokeOpacity: 0.6, strokeColor:'#10A07E',
						 fillOpacity: 0.07, fillColor:'#10A07E'
					 });
					 this.circle.setMap(App.MAP.map);
					 } else {
					 this.circle.setPosition(ll); this.circle.setRadius(acc);
					 }
					 // 3) (선택) 지도 중앙 고정/펜스 처리
					 const fb=App.MAP.map.__fenceBounds;
					 if (fb){
					 const sw=fb.getSouthWest(), ne=fb.getNorthEast();
					 const latClamp=Math.min(Math.max(lat,sw.getLat()),ne.getLat());
					 const lngClamp=Math.min(Math.max(lng,sw.getLng()),ne.getLng());
					 App.MAP.map.setCenter(new kakao.maps.LatLng(latClamp,lngClamp));
					 }
				 }

				if (course!=null) this.headingDeg = course;
				// ⬇️ 첫 고정 시 busy 해제 + 토스트
				if (!this.__gotFirstFix){
					this.__gotFirstFix = true;
					this.setBusy(false);
					showToast('현재 위치를 찾았습니다.','ok');
				}
				App.GEO.enableCompass();
				this.updateBeam(lat, lng);
			}, err=>{
				warn('watchPosition error', err);
					this.setBusy(false);
				showToast('위치를 가져올 수 없습니다','err');			
			}, opts);
			log('GEO started');
		},

		toggle(){ if (this.isActive) this.clear(); else this.start(); }
	};

	/* ====== UI controls (button overlay) ====== */
	function ensureControls(){
		const mapEl=document.getElementById('map');
		let host = mapEl && mapEl.parentElement ? mapEl.parentElement : null;
		if (!host){ warn('map host not found; fallback to body'); host=document.body; }

		if (!host.style.position || host.style.position==='static') host.style.position='relative';

		let wrap=document.getElementById('mapUiOverlay');
		if (!wrap){
			wrap=document.createElement('div'); wrap.id='mapUiOverlay';
			Object.assign(wrap.style,{
				position:'fixed', right:'0', bottom:'0', zIndex:'100000',
				pointerEvents:'none', width:'0', height:'0' // keep compact
			});
			host.appendChild(wrap);
		}

		function mkBtn(id, label, bottomPx){
			let b=document.getElementById(id);
			if (!b){
				b=document.createElement('button'); b.id=id; b.type='button'; b.innerHTML=label;
				Object.assign(b.style,{
					position:'absolute',
					right:'12px', 
					bottom:bottomPx,
					zIndex:'100',
					padding:'10px 12px', 
					borderRadius:'10px',
					border:'1px solid rgba(0,0,0,1)',
					background:'#fff',
					boxShadow:'0 2px 8px rgba(0,0,0,0.2)',
					fontSize:'10px',
					cursor:'pointer',
					pointerEvents:'auto',
					userSelect:'none'
				});
				b.setAttribute('tabindex','0');
				wrap.appendChild(b);
			}
			return b;
		}
		// === offcanvas(#resultPanel) 높이에 맞춰 FAB 위치를 재계산 ===
		function placeFabs(){
			const panel = document.getElementById('resultPanel');
			// offcanvas가 열려 있으면 그 높이만큼 위로 띄우고, 닫혀 있으면 기본 16px
			let offset = 16;
			if (panel && panel.classList.contains('show')) {
				const rect = panel.getBoundingClientRect();
				// 드래그 중 height 스타일이 바뀌므로 rect.height를 그대로 사용
				offset = Math.max(16, Math.min(window.innerHeight, rect.height || 0)) + 16;
			}
			const btnH = 48, gap = 10; // 버튼 세로 + 간격
			// 하단 버튼(컴퍼스)을 기준으로 쌓기
			b2.style.bottom = offset + 'px';
			b1.style.bottom = (offset + btnH + gap) + 'px';
		}

		const b1 = mkBtn('btnMyLocation','<i class="fa fa-location-arrow" aria-hidden="true"></i>','180px');
		const b2 = mkBtn('btnCompass','<i class="fa fa-dot-circle-o" aria-hidden="true"></i>','140px');
		b2.style.display = 'none';

		b1.onclick = async function(e){
			e.preventDefault(); e.stopPropagation();
			if (!App.GEO.isActive) App.GEO.start();
			const ok = await App.GEO.enableCompass();
			if (ok) document.getElementById('btnCompass')?.classList.add('active');
			placeFabs(); // 위치 재계산
		};
		b2.onclick = async function(e){
			e.preventDefault(); e.stopPropagation();
			const ok = await App.GEO.enableCompass();
			if (ok) this.classList.add('active');
			placeFabs();
		};
		if (window.innerWidth < 1200) {
			// 초기 배치
			placeFabs();
		}

		// offcanvas 열림/닫힘 시
		const panel = document.getElementById('resultPanel');
		if (panel) {
			panel.addEventListener('shown.bs.offcanvas', placeFabs);
			panel.addEventListener('hidden.bs.offcanvas', placeFabs);
			// 드래그로 height가 변하므로 style/class 변경을 감지
			const mo = new MutationObserver(placeFabs);
			mo.observe(panel, { attributes:true, attributeFilter:['style','class'] });
		}

		// 회전/리사이즈에도 재배치
		window.addEventListener('resize', placeFabs, {passive:true});
		window.addEventListener('orientationchange', placeFabs, {passive:true});

	}

	/* ====== collect markers & lock ====== */
	function collectMarkers(){
		if (Array.isArray(App.__markers) && App.__markers.length) return App.__markers;
		if (Array.isArray(App.__lastRows) && App.__lastRows.length){
			if (App.MAP?.provider==='kakao' && window.kakao){
				return App.__lastRows.map(r=>{
					const lat=r.lat??r.latitude??r.LAT??r.y, lng=r.lng??r.longitude??r.LNG??r.x;
					return (lat&&lng)?new kakao.maps.LatLng(+lat,+lng):null;
				}).filter(Boolean);
			}
			if (App.MAP?.provider==='google' && window.google){
				return App.__lastRows.map(r=>{
					const lat=r.lat??r.latitude??r.LAT??r.y, lng=r.lng??r.longitude??r.LNG??r.x;
					return (lat&&lng)?new google.maps.LatLng(+lat,+lng):null;
				}).filter(Boolean);
			}
		}
		return [];
	}
	App.__applyMapLock=function(force=false){
		if(!App.MAP||!App.MAP.map) return;
		const provider=App.MAP.provider, markers=collectMarkers(); if(!markers.length) return;
		if(provider==='google') lockGoogleMap(App.MAP.map, markers, App.MAP_LOCK.google);
		if(provider==='kakao'){ if(!App.MAP.__kakaoLockedInstalled||force){ lockKakaoMap(App.MAP.map, markers, App.MAP_LOCK.kakao); App.MAP.__kakaoLockedInstalled=true; } }

	};

	/* ====== wrap fitBoundsFor ====== */
	if(!App.__fitBoundsForWrapped){
		App.__fitBoundsForWrapped=true;
		const __orig=App.fitBoundsFor?.bind(App);
		App.fitBoundsFor=function(rows){
			if(typeof __orig==='function') __orig(rows);
			if(Array.isArray(rows)) App.__lastRows=rows;
			App.__applyMapLock();
		};
	}

	/* ====== relayout patches ====== */
	function patchKakaoRelayoutAndRefit(){ if(!App.MAP||App.MAP.provider!=='kakao') return;
		const fn=function(){ if(!App.MAP||!App.MAP.map) return; try{ if(App.MAP.map.relayout) App.MAP.map.relayout(); if(App.__lastRows&&App.__lastRows.length) App.fitBoundsFor(App.__lastRows); else App.__applyMapLock(); }catch(_){}};
		App.__relayoutAndRefitKakao=fn; return fn; }
	function patchGoogleRelayoutAndRefit(){ if(!App.MAP||App.MAP.provider!=='google') return;
		const fn=function(){ if(!App.MAP||!App.MAP.map) return; try{ if(window.google&&google.maps?.event) google.maps.event.trigger(App.MAP.map,'resize'); if(App.__lastRows&&App.__lastRows.length) App.fitBoundsFor(App.__lastRows); else App.__applyMapLock(); }catch(_){}};
		App.__relayoutAndRefitGoogle=fn; return fn;
	}

	/* ====== init flow ====== */
	function autoStart(){
		ensureControls();
		// 자동 시작: 위치
		App.GEO.start();
		// 자동 시작: 나침반 (안드로이드 등 권한 팝업 불필요 환경만)
		if (window.DeviceOrientationEvent && typeof DeviceOrientationEvent.requestPermission !== 'function'){
			App.GEO.enableCompass();
		}
	}

	if (App.IS_DOMESTIC){
		if(!window.__KAKAO_SDK_LOADING){ window.__KAKAO_SDK_LOADING=true;

			loadScript(
				'https://dapi.kakao.com/v2/maps/sdk.js?appkey='+encodeURIComponent(App.KAKAO_KEY)+'&autoload=false&libraries=services,clusterer,drawing',
				function(){
					if (!document.getElementById('map')) return;
					kakao.maps.load(function(){
						const map = new kakao.maps.Map(document.getElementById('map'), {center:new kakao.maps.LatLng(37.5665,126.9780), level:5});

						window.__MAP__ = App.MAP = { provider:'kakao', map };
						if (window.__MAP__ && __MAP__.map && __MAP__.provider==='kakao' && window.kakao){
							kakao.maps.event.addListener(__MAP__.map, 'click', ()=> LayerManager.hideAll());
						}

						/* ✅ 최초 1회 로드: 지도 생성 직후 */
						if (!App.__INITIAL_SMART_LOADED){
							App.__INITIAL_SMART_LOADED = true;
							App.reloadByCategorySmart?.('');
						}

						// idle: 캐시 재렌더만(재요청 금지)
						kakao.maps.event.addListener(App.MAP.map,'idle', function(){
							App.setMapCenterAsRef?.();
							if (App.mqDesktop.matches && App.__rowsCachePC?.length) App.renderListPC(App.__rowsCachePC);
							if (!App.mqDesktop.matches && App.__rowsCacheMO?.length && App.$panel.is(':visible')) App.renderListMobile(App.__rowsCacheMO);
						});

						App.trySetUserLocation?.(ok=>{
							if(!ok) App.setMapCenterAsRef?.();
							if (App.mqDesktop.matches && App.__rowsCachePC.length) App.renderListPC(App.__rowsCachePC);
							if (!App.mqDesktop.matches && App.__rowsCacheMO.length && App.$panel.is(':visible')) App.renderListMobile(App.__rowsCacheMO);
						});

						if (App.mqDesktop.matches){ App.ensurePcAllTile?.(); App.loadPcCategories?.(); }

						/* ADD: 지도 relayout + 최근 바운즈 재적용 */
						function relayoutAndRefit(){
							if (!App.MAP || !App.MAP.map) return;
							try{
								if (App.MAP.provider==='kakao' && App.MAP.map.relayout){
									App.MAP.map.relayout();								 // 컨테이너 폭 반영
								}
								if (App.__lastRows && App.__lastRows.length){
									App.fitBoundsFor(App.__lastRows);			 // 최근 rows 기준으로 다시 fitBounds
								}
								//console.log('a');
							}catch(_){}
						}

						/* ADD: 윈도우 리사이즈/회전 → 보정 */
						window.addEventListener('resize',					 ()=> setTimeout(relayoutAndRefit, 120));
						window.addEventListener('orientationchange',()=> setTimeout(relayoutAndRefit, 120));

						/* ADD: PC 좌측/우측 오프캔버스 토글 때 → 보정 */
						['pcMenuStore','pcPlaceDetail'].forEach(id=>{
							const el = document.getElementById(id);
							if(!el) return;
							const safeRefit = ()=> {
							if (!(window.App && App.canRefit && App.canRefit())) return;
							setTimeout(relayoutAndRefit, 150);
							};
							el.addEventListener('shown.bs.offcanvas',	safeRefit);
							el.addEventListener('hidden.bs.offcanvas', safeRefit);
						});

						App.__applyMapLock();
						ensureControls();
						['pcMenuStore','pcPlaceDetail','moPlaceDetail'].forEach(id=>{
							const el = document.getElementById(id);
							if(!el) return;
							const safeRefit = ()=> {
								if (window.App && (App.__suppressRefit || (App.__refitLock && App.__refitLock.count>0))) return;
								setTimeout(relayoutAndRefit, 150);
								App.__markers.forEach(m => {
									try{
										if (!m) return;
										if (App.MAP.provider === 'google' && m.setOpacity) m.setOpacity(1);
										else if (App.MAP.provider === 'kakao' && m.setOpacity) m.setOpacity(1);
										else if (m.setZIndex){ m.setZIndex(1); } // 대체(완벽한 딤은 아님)
									}catch(_){}
								});
							};
							el.addEventListener('shown.bs.offcanvas',	safeRefit);
							el.addEventListener('hidden.bs.offcanvas', safeRefit);

							// 상세 닫힘 → 포커스 복원 + 락 해제
							el.addEventListener('hidden.bs.offcanvas', ()=> {
							if (window.App && App.restoreMapView) App.restoreMapView();
							// restoreMapView 내부에서 unlockAll 해도 되지만, 안전하게 한 번 더
							if (window.App && App.unlockAllRefit) App.unlockAllRefit();
							});
						});
					});
				},
				function(){ console.error('[Map] Kakao SDK load failed'); }
			);


		}
	} else {
		if(!window.__GOOGLE_SDK_LOADING){ window.__GOOGLE_SDK_LOADING=true;

			window.initGMap=function(){
				if (!document.getElementById('map')) return;
				const map=new google.maps.Map(document.getElementById('map'),{center:{lat:37.5665,lng:126.9780},zoom:14});

				window.__MAP__=App.MAP={provider:'google', map};
				if (window.__MAP__ && __MAP__.map && __MAP__.provider==='google' && window.google){
					__MAP__.map.addListener('click', ()=> LayerManager.hideAll());
				}
				if (!App.__INITIAL_SMART_LOADED){ App.__INITIAL_SMART_LOADED=true; App.reloadByCategorySmart?.(''); }

				App.trySetUserLocation?.(ok=>{
					if(!ok) App.setMapCenterAsRef?.();
					if (App.mqDesktop.matches && App.__rowsCachePC.length) App.renderListPC(App.__rowsCachePC);
					if (!App.mqDesktop.matches && App.__rowsCacheMO.length && App.$panel.is(':visible')) App.renderListMobile(App.__rowsCacheMO);
				});

				map.addListener('idle', function(){
					App.setMapCenterAsRef?.();
					if (App.mqDesktop.matches && App.__rowsCachePC.length) App.renderListPC(App.__rowsCachePC);
					if (!App.mqDesktop.matches && App.__rowsCacheMO.length && App.$panel.is(':visible')) App.renderListMobile(App.__rowsCacheMO);
				});

				if (App.mqDesktop.matches){ App.ensurePcAllTile?.(); App.loadPcCategories?.(); }

				/* ADD: 구글용 보정 */
				function relayoutAndRefit(){
					if (!App.MAP || !App.MAP.map) return;
					try{
					if (window.google && google.maps?.event){
						google.maps.event.trigger(App.MAP.map, 'resize'); // 컨테이너 폭 반영
					}
					if (App.__lastRows && App.__lastRows.length){
						App.fitBoundsFor(App.__lastRows);								 // 다시 fitBounds
					}
					}catch(_){}
				}

				window.addEventListener('resize',					 ()=> setTimeout(relayoutAndRefit, 120));
				window.addEventListener('orientationchange',()=> setTimeout(relayoutAndRefit, 120));
				['pcMenuStore','pcPlaceDetail'].forEach(id=>{
					const el = document.getElementById(id);
					if(!el) return;
					const safeRefit = ()=> {
					if (!(window.App && App.canRefit && App.canRefit())) return;
					setTimeout(relayoutAndRefit, 150);
					};
					el.addEventListener('shown.bs.offcanvas',	safeRefit);
					el.addEventListener('hidden.bs.offcanvas', safeRefit);
				});
				App.__applyMapLock();
				ensureControls();
				['pcMenuStore','pcPlaceDetail','moPlaceDetail'].forEach(id=>{
					const el = document.getElementById(id);
					if(!el) return;
					const safeRefit = ()=> {
					if (window.App && (App.__suppressRefit || (App.__refitLock && App.__refitLock.count>0))) return;
					setTimeout(relayoutAndRefit, 150);
					App.__markers.forEach(m => {
						try{
							if (!m) return;
							if (App.MAP.provider === 'google' && m.setOpacity) m.setOpacity(1);
							else if (App.MAP.provider === 'kakao' && m.setOpacity) m.setOpacity(1);
							else if (m.setZIndex){ m.setZIndex(1); } // 대체(완벽한 딤은 아님)
						}catch(_){}
					});
					App.MapFocus.isDimmed = false;
					};
					el.addEventListener('shown.bs.offcanvas',	safeRefit);
					el.addEventListener('hidden.bs.offcanvas', safeRefit);

					// 상세 닫힘 → 포커스 복원 + 락 해제
					el.addEventListener('hidden.bs.offcanvas', ()=> {
					if (window.App && App.restoreMapView) App.restoreMapView();
					// restoreMapView 내부에서 unlockAll 해도 되지만, 안전하게 한 번 더
					if (window.App && App.unlockAllRefit) App.unlockAllRefit();
					});
				});

			};

			loadScript('https://maps.googleapis.com/maps/api/js?key='+encodeURIComponent(App.GOOGLE_KEY)+'&callback=initGMap', null, function(){ console.error('[Map] Google SDK load failed'); });
		}
	}

})(window.App||{});

(function(){
	'use strict';
	if (!window.App) window.App = {};

	App.__bindMapMobSort = function(){
		if (window.__SP_MO_SORT_BIND__) return;
		window.__SP_MO_SORT_BIND__ = true;

		var M = App && App.MAP, map = M && M.map;
		if (!map) return;

		(function(){
			if (M.provider === 'kakao' && window.kakao) {
				const c = map.getCenter();
				App.REF_POINT = { lat: c.getLat(), lng: c.getLng() };
			} else if (M.provider === 'google' && window.google) {
				const c = map.getCenter();
				App.REF_POINT = { lat: c.lat(), lng: c.lng() };
			}
		})();

		const rebake = function(){
			if (window.innerWidth >= 1200) return;
			if (!window.refreshMobileListSort) return;
			if (M.provider === 'kakao' && window.kakao) {
				const c = map.getCenter();
				App.REF_POINT = { lat: c.getLat(), lng: c.getLng() };
			} else if (M.provider === 'google' && window.google) {
				const c = map.getCenter();
				App.REF_POINT = { lat: c.lat(), lng: c.lng() };
			}
			window.refreshMobileListSort();
		};

		if (M.provider === 'kakao' && window.kakao) {
			kakao.maps.event.addListener(map, 'dragend', rebake);
			kakao.maps.event.addListener(map, 'idle', rebake);
		} else if (M.provider === 'google' && window.google) {
			map.addListener('dragend', rebake);
			map.addListener('idle', rebake);
		}
	};

	App.safeRelayoutAndRefit = function(){
		if (!(window.App && App.canRefit && App.canRefit())) return;
		if (typeof window.relayoutAndRefit === 'function') {
			setTimeout(window.relayoutAndRefit, 150);
		}
	};

	App.bindOffcanvasRefitGuards = function(){
		['pcMenuStore','pcPlaceDetail','moPlaceDetail'].forEach(function(id){
			var el = document.getElementById(id);
			if (!el) return;
			el.addEventListener('shown.bs.offcanvas', App.safeRelayoutAndRefit);
			el.addEventListener('hidden.bs.offcanvas', App.safeRelayoutAndRefit);
			el.addEventListener('hidden.bs.offcanvas', function(){
				if (App.restoreMapView) App.restoreMapView();
				if (App.unlockAllRefit) App.unlockAllRefit();
			});
		});
	};
})();


</script>