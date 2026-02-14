<?php /* scriptListRender.php */ ?>
<script>
/* ==========================================================================
 * List renderers (PC / Mobile)
 * ========================================================================== */
(function(App){
	'use strict';

	App.__rowsCachePC = App.__rowsCachePC || [];
	App.__rowsCacheMO = App.__rowsCacheMO || [];

	App.renderListMobile = function(rows){
		if (rows) App.__rowsCacheMO = rows || [];
		var list = Array.isArray(App.__rowsCacheMO) ? [...App.__rowsCacheMO] : [];

		var needSort = (App.SORT_MODE_MO || 'distance') === 'distance' && !!App.REF_POINT;
		var data = needSort ? list.map(function(r){
			r.__distKm = (r.mapLat && r.mapLng)
				? App.distanceKm(App.REF_POINT.lat, App.REF_POINT.lng, +r.mapLat, +r.mapLng)
				: null;
			return r;
		}).sort(function(a,b){
			return (a.__distKm==null)-(b.__distKm==null) || (a.__distKm-b.__distKm);
		}) : list;

		var $ul = App.$list ? App.$list.empty() : (window.jQuery ? jQuery('#resultList').empty() : null);
		if (!$ul) return;
		if (data.length === 0){
			$ul.append('<li class="liEmpty p-3 text-center">There is no data</li>');
			return;
		}
		data.forEach(function(r){
			var name = App.IS_DOMESTIC ? (r.sNameKR||r.sNameEN) : (r.sNameEN||r.sNameKR);
			var dc	 = r.dcType==='%' ? (r.dcAmount+'% OFF') : (App.IS_DOMESTIC?(r.dcAmount+'\uc6d0 \ud560\uc778'):(r.dcAmount+' won OFF'));
			var dist = (typeof r.__distKm==='number') ? '<span class="dist">'+r.__distKm+'km</span><span class="sep">·</span>' : '';
			var stampMark = (r.has_stamp==='Y') ? '<div class="divStampMark"><img src="/assets/images/stamp'+r.usage_stamp+'_m.png"></div>' : '';
			var imgSrc = '/uploads/store/' + (r.sMainIMG_Source||'noimg.jpg');
		var ll = App.extractLatLng(r);
		var gdir = ll ? App.buildDirectionsUrl(ll.lat, ll.lng, name, 'walking') : '';
		var gdir_html = gdir ? '<div class="mt-1"><a class="btn btn-sm btn-outline-dark btnRoute" href="'+gdir+'" target="_blank" rel="noopener"><i class="fa fa-reply-all" aria-hidden="true"></i></a></div>' : '';

			$ul.append(
				'<li class="list-group-item list-group-item-action d-flex align-items-center gap-3" data-no="'+r.no+'">					 <img src="'+imgSrc+'" alt="" style="width:56px;height:56px;object-fit:cover;border-radius:.5rem;">					 <div class="flex-grow-1">						 <div class="fw-semibold">'+(name||'-')+'</div>						 <div class="small text-muted mobileDesc">'+dist+dc+' '+stampMark+ '</div>					 </div>				 </li>'
			);
		});
	};

	App.renderListPC = function(rows){
		App.__rowsCachePC = rows||[];
		var data = (App.SORT_MODE_PC==='distance' && App.REF_POINT)
			? ([...App.__rowsCachePC].map(function(r){
					r.__distKm=(r.mapLat&&r.mapLng)?App.distanceKm(App.REF_POINT.lat,App.REF_POINT.lng,+r.mapLat,+r.mapLng):null; return r;
				}).sort(function(a,b){ return (a.__distKm==null)-(b.__distKm==null) || (a.__distKm-b.__distKm); }))
			: [...App.__rowsCachePC];

		if (window.jQuery) jQuery('#pcPlaceCount').text(data.length.toLocaleString());
		var $ul = App.$pcList ? App.$pcList.empty() : (window.jQuery ? jQuery('#pcResultList').empty() : null);
		if (!$ul) return;

		if (data.length==0) {
			$ul.append('<li class="liEmpty">There is no data</li>');
			return;
		}

		data.forEach(function(r){
			var name = App.IS_DOMESTIC ? (r.sNameKR||r.sNameEN) : (r.sNameEN||r.sNameKR);
			var img	= r.sMainIMG_Source ? ('/uploads/store/'+r.sMainIMG_Source) : '/uploads/store/noimg.jpg';
			var time = r.sOpenTime||'';
			var addr = App.IS_DOMESTIC ? (r.sAddr1KR||'') : (r.sAddr1EN||'');
			var dcTxt= r.dcType==='%' ? (r.dcAmount+'%') : (App.IS_DOMESTIC?(r.dcAmount+'\uc6d0'):(r.dcAmount+' won'));
			var distKm=(typeof r.__distKm==='number')?r.__distKm:(App.REF_POINT&&r.mapLat&&r.mapLng?App.distanceKm(App.REF_POINT.lat,App.REF_POINT.lng,+r.mapLat,+r.mapLng):null);
			var dist	= (distKm!=null)?'<span class="dist"><strong>'+distKm+'km</strong></span><span class="sep"> · </span>':'';
			var stampMark = (r.has_stamp==='Y') ? '<div class="divStampMark"><img src="/assets/images/stamp'+r.usage_stamp+'.png"></div>' : '';
			var ll = App.extractLatLng(r);
			var gdir = ll ? App.buildDirectionsUrl(ll.lat, ll.lng, name, 'walking') : '';
		var gdir_html = gdir ? '<div class="mt-2"><a class="btn btn-sm btn-outline-dark btnRoute" href="'+gdir+'" target="_blank" rel="noopener">길찾기</a></div>' : '';

			$ul.append(
				'<li class="place-card" data-no="'+r.no+'">					<div class="place-thumb"><img src="'+img+'" alt=""></div>					<div class="place-body">						<div class="place-title">'+(name||'-')+'</div>						<div class="place-meta">							'+(time?'<span class="ok">'+(App.IS_DOMESTIC?'\uc6b4\uc601 \uc911':'')+'</span><span class="sep"> · </span><span class="time">'+time+'</span>':'')+							dist+(addr?'<span class="addr">'+addr+'</span>':'')+'						</div>						<div class="chipline">							'+(r.dcAmount?'<span class="chip dc"><i class="fa fa-arrow-down" aria-hidden="true"></i> DC '+dcTxt+'</span>':'')+							stampMark+				'</div>					</div>				</li>'
			);
		});
	};

	// Export
	window.renderListPC = App.renderListPC;
	window.renderListMobile = App.renderListMobile;
	window.refreshMobileListSort = function(){ App.renderListMobile(); };
})(window.App||{});
</script>
