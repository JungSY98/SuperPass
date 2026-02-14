<script>
/* ==========================================================================
 * Utils (distance, cssVar, once carousel, bump)
 * ========================================================================== */



(function(App){
	'use strict';
	/** Google Directions URL 생성기 */
	App.buildDirectionsUrl = function(lat, lng, name, mode){
		if (!lat || !lng) return '';
		const travelmode = (mode || 'walking'); // walking|driving|transit|bicycling
		// place 이름은 옵션
		const params = new URLSearchParams({
			api: '1',
			destination: `${lat},${lng}`,
			travelmode: travelmode
		});
		if (name) params.set('destination_place_id', ''); // place_id 없으면 생략, 이름은 쿼리에만
		return `https://www.google.com/maps/dir/?${params.toString()}`;
	};

	/** 다양한 필드에서 lat/lng 추출 (row/상세 모두 대응) */
	App.extractLatLng = function(obj){
		if (!obj) return null;
		const lat = obj.mapLat ?? obj.lat ?? obj.latitude ?? obj.LAT ?? obj.y ?? obj.sMapLat ?? null;
		const lng = obj.mapLng ?? obj.lng ?? obj.longitude ?? obj.LNG ?? obj.x ?? obj.sMapLng ?? null;
		if (lat==null || lng==null) return null;
		const nlat = +lat, nlng = +lng;
		return (Number.isFinite(nlat) && Number.isFinite(nlng)) ? {lat:nlat, lng:nlng} : null;
	};
	App.cssVar = function(name){
		try { return getComputedStyle(document.documentElement).getPropertyValue(name).trim(); }
		catch(_) { return ''; }
	};

	App.distanceKm = function(aLat,aLng,bLat,bLng){
		const R=6371.0088, toRad=d=>d*Math.PI/180;
		const dLat=toRad(bLat-aLat), dLng=toRad(bLng-aLng);
		const s1=toRad(aLat), s2=toRad(bLat);
		const a=Math.sin(dLat/2)**2 + Math.sin(dLng/2)**2 * Math.cos(s1)*Math.cos(s2);
		return Math.round((R*2*Math.atan2(Math.sqrt(a),Math.sqrt(1-a)))*10)/10;
	};

	App.initCarouselOnce = function(id){
		const el = document.getElementById(id); if(!el) return null;
		const inst=bootstrap.Carousel.getInstance(el); if(inst) inst.dispose();
		return new bootstrap.Carousel(el,{interval:0, ride:false, touch:true, keyboard:true, pause:true, wrap:true});
	};

	App.bumpViewRev = function(){ App.VIEW_REV++; };

	// 위치/센터 유틸
	App.trySetUserLocation = function(cb){
		if(!navigator.geolocation){ cb&&cb(false); return; }
		navigator.geolocation.getCurrentPosition(
			pos=>{ App.REF_POINT={lat:pos.coords.latitude,lng:pos.coords.longitude}; cb&&cb(true); },
			_=>{ cb&&cb(false); }, {enableHighAccuracy:true, timeout:5000, maximumAge:60000}
		);
	};
	App.setMapCenterAsRef = function(){
		if(!App.MAP || !App.MAP.map) return;
		if(App.MAP.provider==='kakao'&&window.kakao){ const c=App.MAP.map.getCenter(); App.REF_POINT={lat:c.getLat(), lng:c.getLng()}; }
		else if(App.MAP.provider==='google'&&window.google){ const c=App.MAP.map.getCenter(); App.REF_POINT={lat:c.lat(), lng:c.lng()}; }
	};

})(window.App||{});

/* ==========================================================================
 * Search (PC/Mobile) + Offcanvas drag sheet
 * ========================================================================== 
document.addEventListener('DOMContentLoaded', function(){
	const $moInput = $('#searchInput'), $moBtn = $('#btnSearch');
	const $pcInput = $('#pcSearchInput'), $pcBtn = $('#pcBtnSearch');
	const $panel = $('#resultPanel');

	function normalize(s){ return (s||'').toString().toLowerCase(); }

	function filterRows(q){
		const source = (App.mqDesktop && App.mqDesktop.matches) ? (App.__rowsCachePC||[]) : (App.__rowsCacheMO||[]);
		if(!q) return source;
		const key = normalize(q);
		return (source||[]).filter(r=>{
			const bag = [
				r.sNameKR, r.sNameEN,
				r.sAddr1KR, r.sAddr1EN, r.sAddress,
				r.dcTitle, r.tags, r.catNameKR, r.catNameEN
			].map(normalize).join(' ');
			return bag.indexOf(key) !== -1;
		});
	}

	function runSearch(q){
		q=(q||'').trim();
		if(!App.__rowsCachePC?.length && !App.__rowsCacheMO?.length){
			// 최초 로드시 데이터 없으면 불러오고 500ms 후 재시도
			App.reloadByCategorySmart?.('');
			setTimeout(()=>runSearch(q), 500);
			return;
		}
		const rows = filterRows(q);
		if (App.mqDesktop && App.mqDesktop.matches){
			App.renderListPC?.(rows);
			try{ $('html,body').animate({scrollTop: $('.listWrapPC').offset().top-80}, 200); }catch(_){}
		} else {
			App.renderListMobile?.(rows);
			// 모바일: 오프캔버스 오픈
			try {
				const oc = bootstrap.Offcanvas.getOrCreateInstance('#resultPanel', {scroll:true, backdrop:true});
				oc.show();
			} catch(_){}
		}
	}

	// 바인딩
	$moBtn?.on('click', ()=>runSearch($moInput.val()));
	$pcBtn?.on('click', ()=>runSearch($pcInput.val()));
	$moInput?.on('keydown', e=>{ if(e.key==='Enter') runSearch($moInput.val()); });
	$pcInput?.on('keydown', e=>{ if(e.key==='Enter') runSearch($pcInput.val()); });


});

// 드래그 핸들 (모바일 바텀시트)
(function(){
	const panel = document.querySelector('.offcanvas-bottom'); //document.getElementById('resultPanel');
	const handle = document.querySelector('.offcanvas-header');
	if(!panel || !handle) return;
	let startY=null, startH=null;
	const vhpx = v=> Math.round(window.innerHeight * (v/100));
	const minH = ()=> vhpx(40), maxH = ()=> vhpx(90);

	// 초기 높이
	panel.style.height = '50vh';

	handle.addEventListener('pointerdown', (e)=>{
		startY = e.clientY;
		startH = panel.getBoundingClientRect().height;
		handle.setPointerCapture(e.pointerId);
		document.body.style.userSelect='none';
	});
	handle.addEventListener('pointermove', (e)=>{
		if(startY==null) return;
		const dy = startY - e.clientY;
		let nh = Math.max(minH(), Math.min(maxH(), startH + dy));
		panel.style.height = nh + 'px';
	});
	function endDrag(){
		startY=null; startH=null; document.body.style.userSelect='';
	}
	handle.addEventListener('pointerup', endDrag);
	handle.addEventListener('pointercancel', endDrag);
})();
*/
</script>
<script>
/* ==========================================================================
 * Global: Mobile offcanvas-bottom drag (down=close, up=resize)
 * - 모든 .offcanvas-bottom 적용 (data-drag-dismiss="false" 로 제외 가능)
 * - 위로 드래그 시 height 실시간 확장(기본 40~90vh, half 50vh)
 * - 아래로 강하게 드래그 시 닫힘
 * - X 버튼 클릭은 드래그 시작 차단
 * - hide 시 인라인 스타일/피드백 정리
 * - 시트별 커스텀: data-vh-min / data-vh-half / data-vh-full 로 조정
 * ========================================================================== */
(function(){
	'use strict';
	const mqMobile = window.matchMedia('(max-width: 991.98px)');

	const CONF = {
		SLOP: 10,						// 데드존(px)
		CLOSE_DIST: 100,		 // 닫기 거리(px)
		CLOSE_SPEED: 1.0,		// 닫기 속도(px/ms)
		FEEDBACK_MAX: 140,	 // 피드백 최대 거리(px)
		FEEDBACK_OPACITY_DROP: 0.2 // 최대 20% 투명화
	};

	const vhpx = v => Math.round(window.innerHeight * (v/100));

	function bindOneSheet(sheet){
		if (!sheet || sheet.dataset.dragBinder === '1') return;
		if (sheet.getAttribute('data-drag-dismiss') === 'false') return;

		// 시트별 높이 한계값 (기본 40/50/90vh)
		const MIN_VH	= parseFloat(sheet.dataset.vhMin	|| '30');
		const HALF_VH = parseFloat(sheet.dataset.vhHalf || '50');
		const FULL_VH = parseFloat(sheet.dataset.vhFull || '90');

		const H_MIN	= () => vhpx(MIN_VH);
		const H_HALF = () => vhpx(HALF_VH);
		const H_FULL = () => vhpx(FULL_VH);

		const clampH = h => Math.max(H_MIN(), Math.min(H_FULL(), h));

		// 그립 > 없으면 헤더
		const handle = sheet.querySelector('.offcanvas-header');
		if (!handle) return;

		let dragging=false, startY=0, lastY=0, startT=0, lastT=0, pointerId=null, raf=0;
		let startH=0;

		/** 피드백(아래로만) */
		function setFeedback(dy){
			const dyClamped = Math.max(0, Math.min(CONF.FEEDBACK_MAX, dy||0));
			const ratio = dyClamped / CONF.FEEDBACK_MAX;
			const opacity = 1 - (ratio * CONF.FEEDBACK_OPACITY_DROP);
			sheet.style.setProperty('--drag-dy', dyClamped + 'px');
			sheet.style.setProperty('--drag-opacity', opacity.toFixed(3));
			sheet.classList.add('dragging-down');
		}
		function clearFeedback(){
			sheet.classList.remove('dragging-down');
			sheet.style.removeProperty('--drag-dy');
			sheet.style.removeProperty('--drag-opacity');
		}

		function onStart(e){
			if (!mqMobile.matches) return;
			// 닫기(X) 버튼에서는 드래그 시작 금지
			if (e.target?.closest?.('.btn-close')) return;

			const y = (e.touches?.[0]?.clientY) ?? e.clientY;
			if (y == null) return;

			dragging = true;
			startY = lastY = y;
			startT = lastT = performance.now();
			startH = sheet.getBoundingClientRect().height;

			pointerId = e.pointerId;
			sheet.classList.add('no-transition');
			document.body.style.userSelect = 'none';
			try { handle.setPointerCapture?.(pointerId); } catch(_) {}
			//console.log('aaa');
		}

		function onMove(e){
			if (!dragging) return;
			console.log(e)
			const y = (e.touches?.[0]?.clientY) ?? e.clientY;
			if (y == null) return;
			const now = performance.now();

			const dy = y - startY; // 아래로 +, 위로 -
			lastY = y; lastT = now;

			// 제스처 충돌 방지
			if (Math.abs(dy) > CONF.SLOP && e.cancelable) e.preventDefault();

			// 방향에 따라 처리
			if (dy > 0){
				// 아래로: 닫기 후보 → 피드백만 (height는 건드리지 않음)
				cancelAnimationFrame(raf);
				raf = requestAnimationFrame(()=> setFeedback(dy));
			} else if (dy < 0){
				// 위로: 영역 확장(높이 증가)
				const nh = clampH(startH + (-dy)); // 위로 올리면 높이 커짐
				cancelAnimationFrame(raf);
				raf = requestAnimationFrame(()=> { 
					sheet.style.height = nh + 'px'; 
				});
				// 위로 끄는 동안엔 피드백 제거
				clearFeedback();
			}
		}

		function onEnd(){
			if (!dragging) return;
			dragging = false;
			sheet.classList.remove('no-transition');
			document.body.style.userSelect = '';

			const totalDy = lastY - startY;			// 아래로 +, 위로 -
			const dt = Math.max(1, lastT - startT);
			const speed = totalDy / dt;

			// 아래로 강하게: 닫기
			if (totalDy > CONF.CLOSE_DIST || speed > CONF.CLOSE_SPEED){
				clearFeedback();
				const inst = bootstrap.Offcanvas.getOrCreateInstance(sheet, {backdrop:true, scroll:true});
				inst.hide();
				return;
			}

			// 스냅(위/아래 모두): 현재 높이 기준 half/full로 스냅
			const curH = sheet.getBoundingClientRect().height;
			const snap = (curH > (H_HALF() + (H_FULL()-H_HALF())/3)) ? H_FULL() : H_HALF();
			sheet.style.height = snap + 'px';
			clearFeedback();
		}

		// 바인딩
		handle.addEventListener('pointerdown', onStart);
		handle.addEventListener('pointermove',	onMove, {passive:false});
		handle.addEventListener('pointerup',		onEnd);
		handle.addEventListener('pointercancel',onEnd);

		// 터치 보조
		handle.addEventListener('touchstart', ()=>{}, {passive:true});
		handle.addEventListener('touchmove',	e=>{ if (dragging && e.cancelable) e.preventDefault(); }, {passive:false});

		// 열릴 때 기본 half로 시작 (시트별 커스텀 가능)
		sheet.addEventListener('shown.bs.offcanvas', ()=>{
			// 이미 특정 높이로 열고 싶으면 data-open="half|full" 등으로 분기해도 됨
			sheet.style.height = H_HALF() + 'px';
			sheet.classList.add('half'); sheet.classList.remove('full');
		});

		// 닫힐 때 인라인 흔적 정리(스탬프 시트 재열림 50vh 문제 방지)
		sheet.addEventListener('hide.bs.offcanvas', ()=>{
			clearFeedback();
			sheet.classList.remove('half','full','no-transition');
			sheet.style.removeProperty('height');
			sheet.style.removeProperty('bottom');
			sheet.style.removeProperty('transform');
			sheet.style.removeProperty('opacity');
		});

		sheet.dataset.dragBinder = '1';
	}

	function bindAll(){ document.querySelectorAll('.offcanvas-bottom').forEach(bindOneSheet); }

	document.addEventListener('shown.bs.offcanvas', e=>{
		//if (e.target?.classList?.contains('offcanvas-bottom')) bindOneSheet(e.target);
	});
	window.addEventListener('resize', bindAll, {passive:true});
	document.addEventListener('DOMContentLoaded', bindAll);
})();






</script>
