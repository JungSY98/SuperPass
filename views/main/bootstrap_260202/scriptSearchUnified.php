<?php /* Unified search + bottom sheet + stamp sheet (v2) */ ?>
<script>
/* global bootstrap, App */
(function(){
	if (window.__SP_UNIFIED_SEARCH_BOUND_V2__) return;
	window.__SP_UNIFIED_SEARCH_BOUND_V2__ = true;

	// ---------- State ----------
	const State = { viewMode:'ALL', category:'ALL', keyword:'' };

	// ---------- DOM ----------
	const DOM = {
		moInput: document.querySelector('#searchInput'),
		moBtn: document.querySelector('#btnSearch'),
		pcInput: document.querySelector('#pcSearchInput'),
		pcBtn: document.querySelector('#pcBtnSearch'),
		panel: document.getElementById('resultPanel'),
		handle: document.getElementById('resultDragHandle'),
		stamp: document.getElementById('stampSheet'),
		stampClose: document.getElementById('btnCloseStamp'),
	};

	// ---------- Offcanvas (resultPanel) ----------
	let oc = null;
	function ensureOffcanvas(){
		if (!DOM.panel) return null;
		try{
			oc = bootstrap.Offcanvas.getOrCreateInstance(DOM.panel, {scroll:true, backdrop:false});
			return oc;
		}catch(e){ return null; }
	}
	function openResultPanel(){
		const inst = ensureOffcanvas();
		if (inst && !DOM.panel.classList.contains('show')) inst.show();
	}
	// 검색창 포커스가 닫기 버튼으로 튀지 않도록 포커스트랩 비활성
	if (DOM.panel){
		DOM.panel.addEventListener('shown.bs.offcanvas', function(){
			try{ oc && oc._focustrap && oc._focustrap.deactivate(); }catch(e){}
		});
	}

	// ---------- Utils ----------
	const isPC = ()=> !!(window.App && App.mqDesktop && App.mqDesktop.matches);
	const getRows = ()=> isPC() ? (App.__rowsCachePC||[]) : (App.__rowsCacheMO||[]);
	const norm = s => (s||'').toString().toLowerCase().trim();
	const contains = (a,b) => norm(a).includes(norm(b));

	function matchKeyword(r, kw){
		if(!kw) return true;
		const bag = [
			r.sNameKR, r.sNameEN, r.sAddr1KR, r.sAddr1EN, r.sAddress,
			r.dcTitle, r.tags, r.catNameKR, r.catNameEN, r.storeName, r.desc
		].map(norm).join(' ');
		return bag.indexOf(norm(kw)) !== -1;
	}
	function matchCategory(r, cat){
		if(!cat || cat==='ALL') return true;
		const pool = [r.catCode, r.catSlug, r.catNameKR, r.catNameEN, r.category];
		return pool.some(v => contains(v, cat) || (v && String(v)===String(cat)));
	}
	function matchViewMode(r, vm){
		if(!vm || vm==='ALL') return true;
		return contains(r.viewMode || r.category || '', vm);
	}

	function render(){
		const rows = (getRows()||[]).filter(r =>
			matchViewMode(r, State.viewMode) &&
			matchCategory(r, State.category) &&
			matchKeyword(r, State.keyword)
		);
		if (isPC()){
			App.renderListPC && App.renderListPC(rows);
		} else {
			App.renderListMobile && App.renderListMobile(rows);
			openResultPanel();
		}
	}

	// ---------- Stamp Sheet ----------
	function setStampSheetAbovePanel(){
		if(!DOM.stamp || !DOM.panel) return;
		const h = DOM.panel.getBoundingClientRect().height || (window.innerHeight*0.5);
		DOM.stamp.style.bottom = Math.max(120, Math.floor(h)) + 'px';
	}
	function openStampSheet(){
		if (!DOM.stamp) return;
		setStampSheetAbovePanel();
		DOM.stamp.classList.add('show');
	}
	function closeStampSheet(){
		if (!DOM.stamp) return;
		DOM.stamp.classList.remove('show');
	}
	DOM.stampClose && DOM.stampClose.addEventListener('click', closeStampSheet);

	// ---------- Public API ----------
	window.App = window.App || {};

	// 기존 호출과의 호환: 'map' / 'stamp'
	App.showAllShops = function(){
		State.viewMode = 'ALL';
		openResultPanel();
		closeStampSheet();
		render();
	};
	App.showStampShops = function(){
		State.viewMode = 'STAMP';
		openResultPanel();
		render();
		openStampSheet();
	};

	App.setViewMode = function(mode){
		if (mode === 'stamp') return App.showStampShops();
		if (mode === 'map')	 return App.showAllShops();
		State.viewMode = mode || 'ALL';
		// 주메뉴 전환시에만 초기화
		State.keyword = ''; State.category = 'ALL';
		if (DOM.moInput) DOM.moInput.value = '';
		if (DOM.pcInput) DOM.pcInput.value = '';
		openResultPanel();
		render();
	};
	App.setCategory = function(cat){ State.category = cat || 'ALL'; render(); };
	App.setKeyword = function(kw){
		State.keyword = (kw||'').trim();

		if (!(App.__rowsCachePC && App.__rowsCachePC.length) && !(App.__rowsCacheMO && App.__rowsCacheMO.length)) {
			if (App.reloadByCategorySmart){
				App.reloadByCategorySmart('');
			}
			setTimeout(render, 200);
			console.log('search'); 
			return;
		}
		render();
	};

	// ---------- Bindings (single) ----------
	function debounce(fn, wait){ 
		let t;
		return function(){ 
			clearTimeout(t);
			const a = arguments;
			t = setTimeout(()=>fn.apply(this,a), wait); 
		};
	}
	const doSearch = debounce(function(){
		const kw = (DOM.moInput && DOM.moInput.value) || (DOM.pcInput && DOM.pcInput.value) || '';
		App.setKeyword(kw);
	}, 150);

	// 기존 리스너 제거(중복 바인딩 방지) : 노드 클론 교체
	[DOM.moInput, DOM.moBtn, DOM.pcInput, DOM.pcBtn].forEach(function(el){
		if(!el || !el.parentNode) return;
		const clone = el.cloneNode(true);
		el.parentNode.replaceChild(clone, el);
	});
	// 레퍼시
	DOM.moInput = document.querySelector('#searchInput');
	DOM.moBtn	 = document.querySelector('#btnSearch');
	DOM.pcInput = document.querySelector('#pcSearchInput');
	DOM.pcBtn	 = document.querySelector('#pcBtnSearch');

	if (DOM.moInput){ DOM.moInput.addEventListener('keydown', function(e){ doSearch(); }); }
	if (DOM.pcInput){ DOM.pcInput.addEventListener('keydown', function(e){ doSearch(); }); }
	if (DOM.moBtn){ DOM.moBtn.addEventListener('click', doSearch); }
	if (DOM.pcBtn){ DOM.pcBtn.addEventListener('click', doSearch); }

	// data-attrs 위임(카테고리/뷰모드)
	document.addEventListener('click', function(e){
		const catBtn = e.target.closest('[data-category]');
		if (catBtn){ App.setCategory(catBtn.getAttribute('data-category')); }
		const vmBtn = e.target.closest('[data-view-mode]');
		if (vmBtn){
			const v = vmBtn.getAttribute('data-view-mode');
			if (v === 'stamp') return App.showStampShops();
			if (v === 'map')	 return App.showAllShops();
			return App.setViewMode(v);
		}
	});

	// resultPanel 높이 드래그 시 stampSheet 위치 동기화
	(function(){
		const panel = DOM.panel, handle = DOM.handle;
		if(!panel || !handle) return;
		let startY=null, startH=null;
		const vh = function(v){ return Math.round(window.innerHeight*(v/100)); };
		const minH = function(){ return vh(40); }, maxH = function(){ return vh(90); };
		panel.style.height = '50vh';
		handle.addEventListener('pointerdown', function(e){
			startY=e.clientY; startH=panel.getBoundingClientRect().height;
			handle.setPointerCapture(e.pointerId); document.body.style.userSelect='none';
		});
		handle.addEventListener('pointermove', function(e){
			if(startY==null) return;
			const nh = Math.max(minH(), Math.min(maxH(), startH + (startY - e.clientY)));
			panel.style.height = nh+'px';
			setStampSheetAbovePanel();
		});
		function end(){ startY=null; startH=null; document.body.style.userSelect=''; }
		handle.addEventListener('pointerup', end);
		handle.addEventListener('pointercancel', end);
	})();

	// 리사이즈 시 재정렬
	window.addEventListener('resize', setStampSheetAbovePanel);

	// ---------- Initial ----------
	if (!(window.App && ( (App.__rowsCachePC && App.__rowsCachePC.length) || (App.__rowsCacheMO && App.__rowsCacheMO.length) ))) {
		App && App.reloadByCategorySmart && App.reloadByCategorySmart('');
		setTimeout(render, 250);
	} else {
		render();
	}
})();
</script>
