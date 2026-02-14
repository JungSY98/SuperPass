<script>
/* ==========================================================================
 * Mobile & PC bottom/top nav (map | stamp | store)
 * ========================================================================== */
(function(App){
	'use strict';

	function setActive(action){
		$('.mb-nav-item').removeClass('active').attr('aria-current','false');
		$(`.mb-nav-item[data-action="${action}"]`).addClass('active').attr('aria-current','page');

		$('.pc-nav-item').removeClass('active').attr('aria-current','false');
		$(`.pc-nav-item[data-action="${action}"]`).addClass('active').attr('aria-current','page');
	}
	function hideStampSheet(){
		try{ 
			bootstrap.Offcanvas.getInstance(document.getElementById('pcStampDetail'))?.hide();
			bootstrap.Offcanvas.getInstance(document.getElementById('stampSheet'))?.hide();
		}catch(_){}
	}
	function openSuperPass() {
		//const el = document.getElementById("superpassSheet");
		//bootstrap.Offcanvas.getOrCreateInstance(el, {backdrop:false, scroll:false}).show();
		$("#superpassSheet2").modal('show');
	}
	function openSuperPassPC() {
		const inst = bootstrap.Offcanvas.getOrCreateInstance('#pcSuperpassDetail', {backdrop:false, scroll:true});
		inst.show();
	}
	function openStampSheetHalf(){
		const el=document.getElementById('stampSheet'); if(!el) return;
		//el.classList.add('half');
		//el.style.height='50vh';
		bootstrap.Offcanvas.getOrCreateInstance(el,{backdrop:false,scroll:false}).show();
	}

	async function showAllShops(){
		setActive('map'); 
		//hideStampSheet();
		LayerManager.hideAll()
		App.VIEW_MODE='all';
		openResultPanel();
		$("#pcCatGrid").find("button.catCard").eq(0).click();
		$("#moCatRow").find("button.mochip").eq(0).click();
		LayerManager.showPanel();
		await App.reloadByCategorySmart('');
	}
	async function showStampShops(){ // 모바일 스탬프 
		setActive('stamp');
		App.VIEW_MODE='stamp';
		await App.reloadByCategorySmart('');
		//LayerManager.hideAll();
		//openResultPanel();
		$("#moCatRow").find("button.mochip").eq(0).click();
		$("#stampSheet").modal('show');
		/*
		const el = document.getElementById("stampSheet");
		if (!el) return;
		bootstrap.Offcanvas.getOrCreateInstance(el, {backdrop:true, scroll:false}).show();
		*/
	}
	async function showSuperpassPanel(){
		//setActive('store');
		//LayerManager.hideAll()
		openSuperPass();
	}
	async function showSuperpassPanelPC(){
		setActive('store');
		LayerManager.hideAll()
		openSuperPassPC();
	}
	/* REPLACE: PC에서 스탬프 버튼 누를 때 */
	async function showStampShopsPC(){
		setActive('stamp');
		App.VIEW_MODE = 'stamp';
		App.bumpViewRev();
		LayerManager.hideAll()
		$("#pcCatGrid").find("button.catCard").eq(0).click();
		await App.reloadByCategorySmart('');			// 스탬프 매장으로 리스트/마커 갱신
		openPcStampDetail();											// ← 별도 패널로 표시
	}
	async function showEventPC() {
		setActive('event');
		LayerManager.hideAll()
		const inst = bootstrap.Offcanvas.getOrCreateInstance('#pcEventDetail', {backdrop:false, scroll:true});
		inst.show();
	}
	async function showEventM() {
		setActive('event');
		LayerManager.hideAll()
		$('#eventSheet').modal('show');
	}
	// 모바일 하단 메뉴
	$(document).off('click.mbnav','.mb-nav-item').on('click.mbnav','.mb-nav-item', function(){
		const act=$(this).data('action');
		if (act==='map')	 return showAllShops();
		if (act==='stamp') return showStampShops();
		if (act==='event') return showEventM();
		if (act==='store') return showSuperpassPanel();
	});

	// PC 상단 메뉴
	$(document).off('click.pcnav','.pc-nav-item').on('click.pcnav','.pc-nav-item', function(){
		const act=$(this).data('action');
		if (act==='map')	 return showAllShops();
		if (act==='stamp') return showStampShopsPC();
		if (act==='event') return showEventPC();
		if (act==='store') return showSuperpassPanelPC();
	});

	$("#btnStampTourPC").on("click", function() {
		showStampShopsPC();
	});

	setActive('map'); // 초기 상태

})(window.App||{});


</script>

<script>

(function(){
	const panel = document.getElementById('resultPanel');
	const stamp = document.getElementById('stampSheet');
	const btnClose = document.getElementById('btnCloseStamp');

	function setStampSheetAbovePanel(){
		if(!stamp || !panel) return;
		const h = panel.getBoundingClientRect().height || (window.innerHeight*0.5);
		stamp.style.bottom = Math.max(120, Math.floor(h)) + 'px';
	}

	// 외부에서 호출할 공개 함수
	window.openStampSheet = function(){
		setStampSheetAbovePanel();
		stamp.classList.add('show');
	};
	window.closeStampSheet = function(){
		stamp.classList.remove('show');
	};

	// resultPanel 높이를 드래그로 바꿀 때 stamp 위치도 따라가게
	const handle = document.getElementById('resultDragHandle');
	if(handle){
		let dragging=false, startY=0, startH=0;
		const vh = v=> Math.round(window.innerHeight*(v/100));
		const minH = ()=> vh(40), maxH = ()=> vh(90);

		handle.addEventListener('pointerdown', e=>{
			dragging=true; startY=e.clientY; startH=panel.getBoundingClientRect().height;
			handle.setPointerCapture(e.pointerId); document.body.style.userSelect='none';
		});
		handle.addEventListener('pointermove', e=>{
			if(!dragging) return;
			const nh = Math.max(minH(), Math.min(maxH(), startH + (startY - e.clientY)));
			panel.style.height = nh+'px';
			setStampSheetAbovePanel();
		});
		const end=()=>{ dragging=false; document.body.style.userSelect=''; };
		handle.addEventListener('pointerup', end);
		handle.addEventListener('pointercancel', end);
	}

	btnClose && btnClose.addEventListener('click', closeStampSheet);

	// 창 크기 변경시 재정렬
	window.addEventListener('resize', setStampSheetAbovePanel);
})();


// 이미 바인딩했다면 재바인딩 금지
if (!window.__SP_LIST_CLICK_BOUND__) {
	window.__SP_LIST_CLICK_BOUND__ = true;

	document.addEventListener('click', function(e){
		const li = e.target.closest('#pcResultList li, #resultList li, .place-card');
		if (!li) return;

		// 내부 a 태그 기본 동작 막기(#, javascript:void, 또는 빈 href일 수 있음)
		const a = e.target.closest('a[href]');
		if (a) e.preventDefault();

		const id = li.getAttribute('data-no') || li.getAttribute('data-id');
		if (!id) return;

		const mark = (App.__markers||[]).find(m => (m.__id == id) || (m.__row && (m.__row.no == id || m.__row.id == id)));
		if (mark){
			App.handleMarkerClick(id, mark);
		} else {
			const row = (App.__lastRows||[]).find(r => (r.no==id || r.id==id));
			if (row && row.mapLat && row.mapLng){
				const map = App.MAP && App.MAP.map; if (!map) return;
				const token = App.lockRefit ? App.lockRefit() : null;
				App.MapFocus = App.MapFocus || {};
				App.MapFocus.lockToken = token;

				if (!App.MapFocus.isFocused) {
				App.MapFocus.prev = (App.MAP.provider === 'kakao')
					? { center: map.getCenter(), level: map.getLevel() }
					: { center: map.getCenter(), zoom: map.getZoom() };
				}
				App.MapFocus.isFocused = true;
				const sameTarget = (App.MapFocus.isFocused && App.MapFocus.focusedId === id);

				if (App.MAP.provider === 'kakao'){
				map.panTo(new kakao.maps.LatLng(row.mapLat, row.mapLng));
				setTimeout(()=> {
					map.setLevel(Math.max(3, map.getLevel()-2));
					map.setCenter(new kakao.maps.LatLng(row.mapLat, row.mapLng));
				}, 220);
				} else {
					const focusZm = App.FOCUS_ZOOM?.google ?? 18;
					const maxZm   = App.MAP_LOCK?.google?.maxZoom ?? 20;
					map.panTo(new google.maps.LatLng(row.mapLat, row.mapLng));
					setTimeout(()=> {
					  map.setZoom(Math.min(focusZm, maxZm));
					  map.setCenter(new google.maps.LatLng(row.mapLat, row.mapLng));
					}, 220);
				}

				// 락은 상세 열림/닫힘 루틴에서 풀리지만, 안전 타임아웃도 유지
				setTimeout(()=> { if (App.unlockRefit && App.MapFocus.lockToken){ App.unlockRefit(App.MapFocus.lockToken); } }, 1000);
			}
		}
	}, {passive:false}); // preventDefault를 쓸 수 있도록 passive:false
}

</script>