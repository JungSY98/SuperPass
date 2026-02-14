<script>
/* ==========================================================================
 * Markers (buildMarkerIcon + renderMarkers + fitBounds/clear + focus/dim + restore)
 * ========================================================================== */
(function(App){
	'use strict';

	App.MAP = window.__MAP__ || {};
	App.REF_POINT = App.REF_POINT || null;
	App.SORT_MODE_PC = App.SORT_MODE_PC || 'distance';
	App.__markers = App.__markers || [];	 // 모든 마커 캐시
	App.__catIconMap = App.__catIconMap || null; // code -> icon URL
	App.__catColorMap = App.__catColorMap || null; // code -> color HEX

	/* ========== Focus 상태 보관 (이전 뷰/강조 마커/딤 여부) ========== */
	App.MapFocus = App.MapFocus || {
		prevView: null,		 // {center, zoom|level}
		focused: null,			// kakao.maps.Marker | google.maps.Marker
		isDimmed: false,
		isFocused: false,
		prev: null,	 // {center, zoom/level}
		focusedId: null
	};

	/* ========== 내부 유틸 ========== */
	const iconCache = new Map();
	const loadImage = src => new Promise((res,rej)=>{ const img=new Image(); img.crossOrigin='anonymous'; img.onload=()=>res(img); img.onerror=rej; img.src=src; });
	/* 내부 유틸: 센터/줌 읽기·설정 */
	function escapeRegExp(str){ return String(str).replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); }

	function getView(map){
		if (App.MAP.provider === 'kakao' && window.kakao) {
		return { center: map.getCenter(), level: map.getLevel() };
		} else if (App.MAP.provider === 'google' && window.google) {
		return { center: map.getCenter(), zoom: map.getZoom() };
		}
		return null;
	}
	function setView(map, lat, lng, zoomOrLevel){
		if (App.MAP.provider === 'kakao' && window.kakao) {
		map.setLevel(zoomOrLevel ?? Math.max(4, map.getLevel()-2));
		map.setCenter(new kakao.maps.LatLng(lat, lng));
		} else if (App.MAP.provider === 'google' && window.google) {
		map.setZoom(zoomOrLevel ?? Math.max(16, map.getZoom()+2));
		map.setCenter(new google.maps.LatLng(lat, lng));
		}
	}
	function readView(){
		if (!App.MAP || !App.MAP.map) return null;
		if (App.MAP.provider === 'google'){
			const c = App.MAP.map.getCenter();
			return { center:{lat:c.lat(), lng:c.lng()}, zoom:App.MAP.map.getZoom() };
		} else {
			const c = App.MAP.map.getCenter();
			return { center:new kakao.maps.LatLng(c.getLat(), c.getLng()), level:App.MAP.map.getLevel() };
		}
	}

	function moveViewTo(lat, lng, plus=2){
		if (!App.MAP || !App.MAP.map) return;
		if (App.MAP.provider === 'google'){
			const cur = App.MAP.map.getZoom() ?? 14;
			const maxZ = App.MAP_LOCK?.google?.maxZoom ?? 20;
			App.MAP.map.panTo({lat, lng});
			App.MAP.map.setZoom(Math.min(cur + plus, maxZ));
		} else {
			const cur = App.MAP.map.getLevel() ?? 5;
			const minLv = App.MAP_LOCK?.kakao?.minLevel ?? 1;
			App.MAP.map.setLevel(Math.max(cur - plus, minLv)); // kakao는 숫자 작을수록 확대
			App.MAP.map.setCenter(new kakao.maps.LatLng(lat, lng));
		}
	}

	function setMarkerOpacity(m, val){
		try{
			if (!m) return;
			if (App.MAP.provider === 'google' && m.setOpacity) m.setOpacity(val);
			else if (App.MAP.provider === 'kakao' && m.setOpacity) m.setOpacity(val);
			else if (m.setZIndex){ m.setZIndex(val < 1 ? 1 : 10); } // 대체(완벽한 딤은 아님)
		}catch(_){}
	}

	function dimOtherMarkers(except){
		if (!Array.isArray(App.__markers)) return;
		App.__markers.forEach(m => setMarkerOpacity(m, (m === except) ? 1 : 0.5));
		App.MapFocus.isDimmed = true;
	}

	function restoreMarkerOpacity(){
		if (!Array.isArray(App.__markers)) return;
		App.__markers.forEach(m => setMarkerOpacity(m, 1));
		App.MapFocus.isDimmed = false;
	}

	/* ========== 공개 API: 특정 매장 포커스 / 이전 뷰 복원 ========== */
	App.focusStore = function({ marker=null, lat=null, lng=null, plus=2 }={}){
		if (!App.MAP || !App.MAP.map) return;

		// 이전 뷰 저장(처음 포커스시에만)
		if (!App.MapFocus.prevView) App.MapFocus.prevView = readView();

		// 좌표 확보
		if (!lat || !lng){
			if (marker){
				if (App.MAP.provider === 'google'){ const p=marker.getPosition(); lat=p.lat(); lng=p.lng(); }
				else { const p=marker.getPosition(); lat=p.getLat(); lng=p.getLng(); }
			} else return;
		}

		// 이동 + 확대 + 나머지 딤
		moveViewTo(lat, lng, plus);
		if (Array.isArray(App.__markers) && App.__markers.length) dimOtherMarkers(marker || null);
		App.MapFocus.focused = marker || null;
	};

	App.restoreMapView = function(){

		const map = App.MAP && App.MAP.map; if (!map) return;

		// 마커 원복
		(App.__markers||[]).forEach(m=>{
		try { m.setZIndex && m.setZIndex(1); } catch(e){}
		if (m.__restoreIcon) try { m.__restoreIcon(); } catch(e){}
		});

		// 뷰 복원
		const p = App.MapFocus.prev;
		if (p){
			if (App.MAP.provider === 'kakao'){
				if (p.level != null) map.setLevel(p.level);
				if (p.center) map.setCenter(p.center);
			} else if (App.MAP.provider === 'google'){
				if (p.zoom != null) map.setZoom(p.zoom);
				if (p.center) map.setCenter(p.center);
			}
		}

		// 상태 초기화
		App.MapFocus.isFocused = false;
		App.MapFocus.prev = null;
		App.MapFocus.focusedId = null;

		// refit 잠금 해제
		if (App.unlockAllRefit) App.unlockAllRefit();

	};


	/* ========== 카테고리 메타/아이콘 ========== */
	App.buildMarkerIcon = async function(iconUrl, opt={}){
		const key = JSON.stringify({iconUrl, ...opt}); if(iconCache.has(key)) return iconCache.get(key);
		const size= +opt.size || 48, pinH=Math.round(size*1.35);
		const keyColor = App.cssVar?.('--key-green') || '#10A07E';
		const ringColor= opt.ringColor || keyColor;
		const pinColor = opt.pinColor || keyColor;
		const circle	 = opt.circleColor || '#fff';
		const ringThk	= (opt.ringThickness ?? 3);
		const gap			= (opt.gap ?? 6);
		const tailGap	= (opt.tailGap ?? 4);
		const tailW		= (opt.tailWidth ?? Math.round(size*0.28));

		const iconImg	= iconUrl ? await loadImage(iconUrl) : null;

		const canvas=document.createElement('canvas'); canvas.width=size; canvas.height=pinH;
		const ctx=canvas.getContext('2d');
		const cx=size/2, cy=size/2+2;
		const rOuter=size/2-1, rRingIn=rOuter-ringThk, rInner=Math.max(6,rRingIn-gap);

		// ring
		ctx.beginPath(); ctx.arc(cx,cy,rOuter,0,Math.PI*2); ctx.closePath(); ctx.fillStyle=ringColor; ctx.fill();
		// inner
		ctx.beginPath(); ctx.arc(cx,cy,rRingIn,0,Math.PI*2); ctx.closePath(); ctx.fillStyle=circle; ctx.fill();
		// tail
		const tailTopY=cy+rRingIn-tailGap, half=tailW/2, apexY=pinH-5;
		ctx.beginPath(); ctx.moveTo(cx-half, tailTopY); ctx.quadraticCurveTo(cx,apexY, cx+half,tailTopY); ctx.closePath(); ctx.fillStyle=pinColor; ctx.fill();

		// icon
		if(iconImg){
			const innerR=rInner-4, side=innerR*2;
			ctx.save(); ctx.beginPath(); ctx.arc(cx,cy,innerR,0,Math.PI*2); ctx.closePath(); ctx.clip();
			ctx.drawImage(iconImg, 0,0, iconImg.width,iconImg.height, cx-innerR, cy-innerR, side, side);
			ctx.restore();
		}
		const dataURL=canvas.toDataURL('image/png');

		const kakaoImg = (window.kakao && window.kakao.maps)
			? new kakao.maps.MarkerImage(dataURL, new kakao.maps.Size(size,pinH), {offset:new kakao.maps.Point(Math.round(size/2), pinH-6)})
			: null;

		const out={ dataURL, w:size, h:pinH, kakao:kakaoImg };
		iconCache.set(key,out); return out;
	};

	App.clearMarkers = function(){
		const list = App.__markers || [];
		if (!list.length) return;

		try{
			if (App.MAP && App.MAP.provider==='kakao' && window.kakao){
				list.forEach(m=> m && m.setMap && m.setMap(null));
			} else if (App.MAP && App.MAP.provider==='google' && window.google){
				list.forEach(m=> m && m.setMap && m.setMap(null));
			}
		}catch(_){}

		App.__markers = [];
	};

	App.fitBoundsFor = function(rows){
		if(!rows || !rows.length || !App.MAP || !App.MAP.map) return;

		if (App.MAP.provider==='kakao' && window.kakao){
			const b = new kakao.maps.LatLngBounds();
			rows.forEach(r=> b.extend(new kakao.maps.LatLng(+r.mapLat, +r.mapLng)));
			App.MAP.map.setBounds(b);
		} else if (App.MAP.provider==='google' && window.google){
			const b = new google.maps.LatLngBounds();
			rows.forEach(r=> b.extend(new google.maps.LatLng(+r.mapLat, +r.mapLng)));
			App.MAP.map.fitBounds(b);
		}
	};

	// 행→코드/색/아이콘
	App.codeForRow = function(row){
		// 1) 정확 코드 우선
		const rawCode = (row.cat_code || row.catCode || row.cat || '').toLowerCase().trim();
		if (rawCode && App.__catIconMap && App.__catIconMap[rawCode]) return rawCode;

		// 2) category 기반 매칭
		const s = (row.category || row.catNameKR || row.catNameEN || '').toLowerCase().trim();
		if (!s || !App.__catIconMap) return '';

		const keys = Object.keys(App.__catIconMap);

		// 2-1) 정확 일치
		const exact = keys.find(k => k && k.toLowerCase() === s);
		if (exact) return exact;

		// 2-2) 단어 경계 일치(알파뉴메릭 경계)
		const byLengthDesc = [...keys].sort((a,b)=> b.length - a.length); // 긴 키 우선
		for (const k of byLengthDesc){
		if (!k) continue;
		const re = new RegExp(`(^|[^a-z0-9])${escapeRegExp(k.toLowerCase())}([^a-z0-9]|$)`);
		if (re.test(s)) return k;
		}

		// 2-3) 최후의 수단: 부분 포함(긴 키 우선)
		for (const k of byLengthDesc){
		if (k && s.includes(k.toLowerCase())) return k;
		}

		return '';
	};

	App.colorForRow = function(row){
		const code = App.codeForRow(row);
		return (code && App.__catColorMap && App.__catColorMap[code]) || null;
	};
	App.iconForRow = function(row){
		if (!App.__catIconMap) return null;

		// 1) codeForRow 결과가 있으면 그 아이콘
		const code = App.codeForRow(row);
		if (code && App.__catIconMap[code]) return App.__catIconMap[code];

		// 2) 그래도 없으면 category 텍스트로 재시도 (정확 → 경계 → 부분)
		const s = (row.category || row.catNameKR || row.catNameEN || '').toLowerCase().trim();
		if (!s) return null;

		const keys = Object.keys(App.__catIconMap);
		const exact = keys.find(k => k && k.toLowerCase() === s);
		if (exact) return App.__catIconMap[exact];

		const byLengthDesc = [...keys].sort((a,b)=> b.length - a.length);
		for (const k of byLengthDesc){
		const re = new RegExp(`(^|[^a-z0-9])${escapeRegExp(k.toLowerCase())}([^a-z0-9]|$)`);
		if (re.test(s)) return App.__catIconMap[k];
		}
		for (const k of byLengthDesc){
		if (s.includes(k.toLowerCase())) return App.__catIconMap[k];
		}
		return null;
	};


	App.loadCategoryIconMap = async function(){
		if (App.__catIconMap && App.__catColorMap) return App.__catIconMap;
		try{
			const rows = await (App.ApiGuard
				? App.ApiGuard.getJSON('cat:list','/api/category/list',{}, {retry:2, base:300})
				: $.getJSON('/api/category/list'));
			App.__catIconMap = {};
			App.__catColorMap = {};
			(rows || []).forEach(c=>{
				const code = String(c.code||'').toLowerCase();
				if (!code) return;
				App.__catIconMap[code] = c.icon || null;
				const raw = c.color || c.color_hex || c.hex || c.colorCode || c.color_code || '';
				if (typeof raw === 'string'){
					const m = raw.trim().match(/^#?[0-9a-fA-F]{6}$/);
					if (m) App.__catColorMap[code] = raw.startsWith('#') ? raw : ('#'+raw);
				}
			});
		}catch(_){
			App.__catIconMap = {}; App.__catColorMap = {};
		}
		return App.__catIconMap;
	};

	/* 상세 오픈 + 지도 포커스 (마커 전달 시 중심/확대/딤) */
	App.handleMarkerClick = function(id, marker){
		const map = App.MAP && App.MAP.map; if (!map || !marker) return;

		// refit 잠금 (토큰)
		const token = App.lockRefit ? App.lockRefit() : null;
		App.MapFocus.lockToken = token;

		// 이전 뷰 저장 (처음 포커스일 때만)
		if (!App.MapFocus.isFocused) {
			App.MapFocus.prev = getView(map);
		}
		App.MapFocus.isFocused = true;
		App.MapFocus.focusedId = id;
		const sameTarget = (App.MapFocus.isFocused && App.MapFocus.focusedId === id);

		// 마커 강조
		try { marker.setZIndex && marker.setZIndex(9999); } catch(e){}
		if (Array.isArray(App.__markers) && App.__markers.length) dimOtherMarkers(marker);

		// 안전한 좌표 구하기
		const pos = marker.getPosition ? marker.getPosition() : null;
		const lat = marker.__lat || (pos?.getLat ? pos.getLat() : pos?.lat?.());
		const lng = marker.__lng || (pos?.getLng ? pos.getLng() : pos?.lng?.());

		// 부드럽게 이동 → 확대 (플랫폼별)
		if (App.MAP.provider === 'kakao'){
			map.panTo(new kakao.maps.LatLng(lat, lng));
			setTimeout(()=> {
				const lv = Math.max(3, map.getLevel()-2); // 한두 단계 확대
				setView(map, lat, lng, lv);
				// 락 해제는 상세 오프캔버스 열린 뒤/닫힘에서 수행
			}, 220);
		} else {
			const focusZm = App.FOCUS_ZOOM?.google ?? 18;
			const maxZm	 = App.MAP_LOCK?.google?.maxZoom ?? 20;
			map.panTo(new google.maps.LatLng(lat, lng));
			setTimeout(()=> {
				// 같은 마커 재클릭이면 현재 줌 유지 + 센터만 보정
				if (sameTarget) {
					setView(map, lat, lng, map.getZoom());
				} else {
					setView(map, lat, lng, Math.min(focusZm, maxZm));
				}
			}, 220);
		}

		// 상세 열기 트리거(있으면)
		if (window.openMobileDetail && window.innerWidth < 1200) window.openMobileDetail(id);
		else if (window.openPcDetail) window.openPcDetail(id);

		// 혹시 상세가 없는 흐름에서도 1초 뒤 자동 해제 (안전장치)
		setTimeout(()=> { if (App.unlockRefit && App.MapFocus.lockToken){ App.unlockRefit(App.MapFocus.lockToken); } }, 1000);
	};


	/* ========== 렌더 + 클릭 바인딩 (마커 준비 후 자동 연결) ========== */
	App.renderMarkers = async function(rows){
		await App.loadCategoryIconMap?.();
		App.clearMarkers();

		if(!rows || !rows.length) return;

		if (App.MAP.provider==='kakao' && window.kakao){
			for (const r of rows){
				const col = App.colorForRow(r) || 'var(--key-green)';
				const ic	= await App.buildMarkerIcon(App.iconForRow(r), {
					size:48, ringThickness:4, gap:0, tailGap:0, tailWidth:14,
					ringColor:col, pinColor:col
				});
				const pos = new kakao.maps.LatLng(+r.mapLat, +r.mapLng);
				const m	 = new kakao.maps.Marker({
					map:App.MAP.map, position:pos, image:ic.kakao,
					title:(App.IS_DOMESTIC? r.sNameKR:r.sNameEN)
				});
				m.__row = r; m.__id = r.no;
				kakao.maps.event.addListener(m,'click',()=> App.handleMarkerClick(r.no, m));
				App.__markers.push(m);
			}
		} else if (App.MAP.provider==='google' && window.google){
			for (const r of rows){
				const col = App.colorForRow(r) || 'var(--key-green)';
				const ic	= await App.buildMarkerIcon(App.iconForRow(r), {
					size:48, ringThickness:3, gap:0, tailGap:0, tailWidth:14,
					ringColor:col, pinColor:col
				});
				const gIcon = { url:ic.dataURL, scaledSize:new google.maps.Size(ic.w,ic.h),
												anchor:new google.maps.Point(Math.round(ic.w/2), ic.h-6) };
				const m	 = new google.maps.Marker({
					map:App.MAP.map,
					position:{lat:+r.mapLat, lng:+r.mapLng},
					icon:gIcon,
					title:(App.IS_DOMESTIC? r.sNameKR:r.sNameEN)
				});
				m.__row = r; m.__id = r.no;
				m.addListener('click',()=> App.handleMarkerClick(r.no, m));
				App.__markers.push(m);
			}
		}

		// 최초 뷰 보정
		App.fitBoundsFor(rows);
		App.__lastRows = rows;

		// 패널/리사이즈 후 재보정
		setTimeout(()=>{ 
			try{
				if (App.MAP.provider==='kakao' && App.MAP.map.relayout){
					App.MAP.map.relayout(); App.fitBoundsFor(App.__lastRows);
				}else if(App.MAP.provider==='google' && window.google){
					google.maps.event.trigger(App.MAP.map,'resize'); App.fitBoundsFor(App.__lastRows);
				}
			}catch(_){}
		}, 120);
	};

	// 리스트 클릭 → 포커스 (선택자와 id 속성은 프로젝트에 맞게 바꾸세요)
	// 예시: <li class="place-item" data-no="123"> … </li>
	App.bindListFocus = function(itemSelector='.place-item', idAttr='data-no'){
		document.addEventListener('click', function(e){
			const li = e.target.closest(itemSelector);
			if (!li) return;
			const id = li.getAttribute(idAttr);
			if (!id) return;

			// 마커 찾기
			const mark = (App.__markers||[]).find(m => (m.__id == id) || (m.__row && (m.__row.no == id)));
			if (mark){
				// 포커스 + 상세 오픈
				App.handleMarkerClick(id, mark);
			}else{
				// 마커가 아직 없으면 행에서 강제 이동만
				const row = (App.__lastRows||[]).find(r => (r.no==id || r.id==id));
				if (row && (row.mapLat && row.mapLng)) App.focusStore({ lat:+row.mapLat, lng:+row.mapLng, plus:2 });
			}
		});
	};

	// 오프캔버스 닫으면 이전 뷰로 복원 (PC/모바일 시트를 배열로 넘기세요)
	App.bindRestoreOnOffcanvasClose = function(selectors=['#pcPlaceDetail', '#mPlaceSheet']){
		selectors.forEach(sel=>{
			const el = document.querySelector(sel);
			if (!el) return;
			el.addEventListener('hidden.bs.offcanvas', ()=> App.restoreMapView());
		});
	};
	/* 초기 바인딩 (중복 바인딩 방지) */
	if (!window.__SP_RESTORE_BOUND__) {
		window.__SP_RESTORE_BOUND__ = true;
		//App.bindRestoreOnOffcanvasClose();
	}
	// ===== 외부에서 바로 쓸 수 있도록 export (필요 시 한 번만 호출) =====
	window.renderMarkers = App.renderMarkers;

})(window.App||{});

</script>
