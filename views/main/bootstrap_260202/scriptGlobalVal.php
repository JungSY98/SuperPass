<script>
/* ==========================================================================
 * Global namespace & server-injected values
 * ========================================================================== */
(function(){
	'use strict';

	// ---- Namespace -----------------------------------------------------------
	window.App = window.App || {};
	App.__suppressRefit = false;

	// ---- Server injected values ---------------------------------------------
	App.SHOULD_SHOW	 = <?= $should_show_splash ? 'true' : 'false'; ?>;
	App.SPLASH_TTL		= <?= (int)$splash_ttl; ?>;
	App.IS_LOGGED_IN	= <?= $is_logged_in ? 'true' : 'false'; ?>;
	App.IS_DOMESTIC	 = <?= $is_domestic ? 'true' : 'false'; ?>;
	App.KAKAO_KEY		 = <?= json_encode($kakao_key); ?>;
	App.GOOGLE_KEY		= <?= json_encode($google_key); ?>;
	App.LOGIN_URL		 = <?= json_encode($login_url); ?>;
	App.CSRF_NAME		 = <?= json_encode($csrf_name); ?>;
	App.CSRF_HASH		 = <?= json_encode($csrf_hash); ?>;
	App.__lastRows = [];

	// ---- View state ----------------------------------------------------------
	App.VIEW_MODE		 = window.VIEW_MODE || 'all';	// 'all' | 'stamp'
	App.VIEW_REV			= window.VIEW_REV	|| 0;			// bump되면 이전 요청은 stale

	// ---- Media/DOM cache -----------------------------------------------------
	App.mqDesktop		 = window.matchMedia('(min-width:1200px)');
	App.$panel				= $('#resultPanel');
	App.$list				 = $('#resultList');
	App.$pcList			 = $('#pcResultList');
	App.$pcCatGrid		= $('#pcCatGrid');
	App.$moCatRow		 = $('#moCatRow');

	// ---- Ajax CSRF -----------------------------------------------------------
	$.ajaxSetup({
		headers: { 'X-Requested-With': 'XMLHttpRequest' },
		beforeSend: function(_, s){
			if (s.type && s.type.toUpperCase()==='POST'){
				const pair = encodeURIComponent(App.CSRF_NAME)+'='+encodeURIComponent(App.CSRF_HASH);
				s.data = s.data ? (s.data+'&'+pair) : pair;
			}
		}
	});

	// ---- Login guard ---------------------------------------------------------
	App.requireLogin = function(next){
		if (App.IS_LOGGED_IN){ next && next(); return; }
		alert(App.IS_DOMESTIC ? '로그인이 필요합니다.' : 'Please log in first.');
		location.href = App.LOGIN_URL + '?redirect=' + encodeURIComponent(location.href);
	};

	// ---- Export (호환용) -----------------------------------------------------
	window.CSRF_NAME = App.CSRF_NAME;
	window.CSRF_HASH = App.CSRF_HASH;

	// Splash
	(function(){
		const now=Math.floor(Date.now()/1000);
		const last=parseInt((document.cookie.match('(^|;)\\s*sp_last_seen_ts\\s*=\\s*([^;]+)')||[])[2]||'0',10);
		if (!App.SHOULD_SHOW || (now-last)<App.SPLASH_TTL) return;
		$('#splashOverlay').fadeIn(120);
		setTimeout(function(){
			$('#splashOverlay').fadeOut(200);
			document.cookie='sp_last_seen_ts='+now+';path=/;SameSite=Lax';
			$.post('/ajax/splash-seen', {}, resp=>{ if(resp && resp[App.CSRF_NAME]) App.CSRF_HASH=resp[App.CSRF_NAME]; }, 'json');
		}, 3000);
	})();
})();

(function(){
  'use strict';
  window.App = window.App || {};

  /* =====================
   * Global state
   * ===================== */
  // Map holder: { provider: 'kakao'|'google', map: <map instance> }
  App.MAP = App.MAP || null;

  // DOM caches (should be assigned by page init)
  App.$list   = App.$list   || (window.jQuery ? jQuery('#resultList') : null);
  App.$pcList = App.$pcList || (window.jQuery ? jQuery('#pcResultList') : null);

  // Flags
  App.IS_DOMESTIC   = (typeof App.IS_DOMESTIC === 'boolean') ? App.IS_DOMESTIC : true;
  App.SORT_MODE_PC  = App.SORT_MODE_PC || 'distance';
  App.SORT_MODE_MO  = App.SORT_MODE_MO || 'distance';

  // Distance reference point (center of map or user location)
  App.REF_POINT = App.REF_POINT || null;

  // Utilities
  App.toRad = function(d){ return d * Math.PI / 180; };
  App.distanceKm = function(aLat,aLng,bLat,bLng){
    const R = 6371.0088;
    const dLat = App.toRad(bLat - aLat);
    const dLng = App.toRad(bLng - aLng);
    const s1 = App.toRad(aLat), s2 = App.toRad(bLat);
    const a = Math.sin(dLat/2)**2 + Math.sin(dLng/2)**2 * Math.cos(s1) * Math.cos(s2);
    return Math.round((R*2*Math.atan2(Math.sqrt(a),Math.sqrt(1-a)))*10)/10;
  };

  /* =====================
   * Central refit/relayout gate with tokens
   * ===================== */
  App.__suppressRefit = false;
  App.__refitLock = { count: 0, seq: 0, tokens: new Set() };

  App.lockRefit = function(){
    const t = 'L' + (++App.__refitLock.seq);
    App.__refitLock.count++;
    App.__refitLock.tokens.add(t);
    App.__suppressRefit = true;
    return t;
  };
  App.unlockRefit = function(token){
    if (!token || !App.__refitLock.tokens.has(token)) return;
    App.__refitLock.tokens.delete(token);
    App.__refitLock.count = Math.max(0, App.__refitLock.count - 1);
    if (App.__refitLock.count === 0) App.__suppressRefit = false;
  };
  App.unlockAllRefit = function(){
    App.__refitLock.tokens.clear();
    App.__refitLock.count = 0;
    App.__suppressRefit = false;
  };
  App.canRefit = function(){
    return !(App.__suppressRefit || (App.__refitLock && App.__refitLock.count>0) || App.__bootLockActive===true);
  };

  /* =====================
   * Boot lock: prevent auto-fit on first paint collisions
   * ===================== */
  App.__bootLockActive = true;
  App.__bootToken = App.lockRefit();
})();

</script>
