<!-- ===== 모바일 영역 ===== -->
<div class="divMobile d-block d-xl-none">
	<header class="fixed-top" style="z-index:12010">
		<nav class="navbar navbar-expand-xxl navbar-main bg-faded max1920" id="navSite">
			<div class="container-fluid max1920">
				<a class="navbar-brand" href="/"><span>DDP</span> DONGDAEMUN <span>SUPERPASS</span></a>
				<ul class="navbar-nav w-100">
					<li>
						<div id="searchBar2" class="input-group w-100 pt-2">
							<div class="input-group searchBarWrap">
								<input id="searchInput" type="text" class="form-control form-control-lg border-0" placeholder="<?= $is_domestic ? '장소, 쿠폰 검색' : 'Place, Coupon Search' ?>">
								<button id="btnSearch"><i class="fa fa-search" aria-hidden="true"></i></button>
							</div>
						</div>
					</li>
<!--
			<li class="btnTopInsta"><a href="https://www.instagram.com/ddp_seoul/" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<li class="btnTopFoundation"><a href="https://www.seouldesign.or.kr" target="_blank"><img src="/assets/images/logoFoundation.png" class="topLogo2" alt="서울디자인재단"></a></li>
-->
				</ul>
			</div>
		</nav>
	</header>

	<!-- Mobile Bottom Nav (모바일 전용) -->
	<nav id="mbNav" class="mobile-bottom-nav d-xl-none fixed-bottom" aria-label="Mobile bottom menu">
		<button type="button" class="mb-nav-item active" data-action="map" aria-current="page">
			<img src="/assets/images/mobileMenu1.png" alt="Map">
			<span class="">Map</span>
		</button>
		<button type="button" class="mb-nav-item" data-action="event">
			<span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger"><?=count($eventD)?></span>
			<img src="/assets/images/mobileMenu2.png" alt="Event">
			<span class="">Event</span>
		</button>
		<button type="button" class="mb-nav-item" data-action="store">
			<img src="/assets/images/mobileMenu3.png" alt="Stores">
			<span class="">SuperPass</span>
		</button>
	</nav>

</div>

<!-- PC 전용 좌측 오프캔버스 -->
<div class="divPC d-none d-xl-block">
	<div class="offcanvas offcanvas-left show" id="pcMenuStore" data-bs-backdrop="false" data-bs-scroll="true" tabindex="-1" aria-labelledby="pcMenuStoreLabel">
		<div class="offcanvas-header flex-column align-items-center">
			<a class="navbar-brand" href="/"><span>DDP</span> DONGDAEMUN <span>SUPERPASS</span></a>

			<!-- 검색 -->
			<div class="searchWrapPC w-100">
				<div class="input-group searchBarWrap">
					<input id="pcSearchInput" type="text" class="form-control form-control-lg" placeholder="<?=$is_domestic ? '장소, 쿠폰 검색' : 'Place, Coupon Search' ?>">
					<button id="pcBtnSearch"><i class="fa fa-search" aria-hidden="true"></i></button>
				</div>
				<!-- PC Nav -->
				<nav id="pcNav" class="pc-nav" aria-label="PC menu">
					<button type="button" class="pc-nav-item active" data-action="map" aria-current="page">
						<img src="/assets/images/mobileMenu1.png" alt="Map">
						<span class="">Map</span>
					</button>
					<button type="button" class="pc-nav-item" data-action="event">
						<span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger"><?=count($eventD)?></span>
						<img src="/assets/images/mobileMenu2.png" alt="Event">
						<span class="">Event</span>
					</button>
					<button type="button" class="pc-nav-item" data-action="store">
						<img src="/assets/images/mobileMenu3.png" alt="Stores">
						<span class="">SuperPass</span>
					</button>
				</nav>
			</div>
		</div>
		<div class="offcanvas-body p-0">
			<!-- 카테고리(줄바꿈) -->
			<div class="pcCatSection bg-white sticky-top">
				<div class="pcCatTitle">EXPLORING THE PERIPHERAL</div>
				<div id="pcCatGrid" class="pcCatGrid" aria-label="categories grid">
				<!-- JS로 동적 채움 -->
				</div>
				<hr>
				<img src="/assets/images/stampTourBanner.png" class="w-100" id="btnStampTourPC">
			</div>

			<div id="pcListToolbar" class="place-toolbar d-xl-flex">
				<div class="ttl">PLACE <small id="pcPlaceCount">0</small></div>
				<div class="place-sort d-none" role="tablist" aria-label="Sort">
					<button id="btnSortDistance" class="active" type="button">지도중심</button>
					<span class="sep">|</span>
					<button id="btnSortRelevance" type="button">관련도순</button>
				</div>
			</div>
			
			<!-- 검색 결과 / 기본 리스트 -->
			<div class="listWrapPC">
				<ul id="pcResultList" class="list-group list-group-flush"></ul>
			</div>
		</div>
	</div>
</div>



<!-- Splash -->
<div id="splashOverlay" aria-hidden="true">
	<div class="splash-inner">
		<img class="splash-img landscape" src="/assets/images/superpass_splash_pc.jpg" alt="Splash PC">
		<img class="splash-img portrait" src="/assets/images/superpass_splash_mobile.jpg" alt="Splash Mobile">
	</div>
</div>

<!-- Map -->
<div id="mapWrap" class="">
	<div id="map"></div>
	<div id="moCatBar" class="d-xl-none">
		<div id="moCatRow" aria-label="categories scroller">
			<!-- JS로 동적 채움 -->
		</div>
	</div>
</div>


<?php if ($is_store_member) : ?>
<!-- 모바일 전용 토글 버튼 -->
<button id="btnAdminToggle" class="admin-toggle-btn d-xl-none">
	<i class="fa fa-cogs"></i>
</button>

<div class="admin-overlay-group" id="adminOverlayGroup">
	<div class="d-flex align-items-center justify-content-between mb-2 d-xl-none">
		<span class="fw-bold small">Admin Settings</span>
		<button type="button" class="btn-close btn-sm" id="btnAdminClose" aria-label="Close"></button>
	</div>
	<div class="d-flex gap-2">
		<a href="/admin/" target="_blank" class="btn btn-sm btn-dark">관리자 링크</a>
		<a href="/?langSet=kr" class="btn btn-sm btn-outline-dark">KO</a>
		<a href="/?langSet=en" class="btn btn-sm btn-outline-dark">EN</a>
	</div>
</div>


<script>
$(function(){
	$('#btnAdminToggle').on('click', function(){
		$(this).fadeOut(200);
		$('#adminOverlayGroup').fadeIn(200).css('display', 'flex');
	});
	$('#btnAdminClose').on('click', function(){
		$('#adminOverlayGroup').fadeOut(200);
		$('#btnAdminToggle').fadeIn(200);
	});
});
</script>
<?php endif; ?>


<!-- PC 전용 상세 패널(우측 오프캔버스) -->
<div class="offcanvas offcanvas-start d-none d-xl-flex" tabindex="-1" id="pcPlaceDetail" aria-labelledby="pcPlaceDetailLabel" style="width:520px;">
	<div class="sheet-grip" aria-hidden="true"></div> <!-- 드래그 핸들 -->
	<div class="offcanvas-header">
		<h5 class="offcanvas-title fw-bold" id="pcDetName"></h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body p-0 d-flex flex-column">
		<!-- 1) 사진 슬라이드 -->
		<div id="pcPhotoCarouselWrap" class="border-bottom">
			<div id="pcPhotoCarousel" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner" id="pcPhotoSlides"></div>
				<button class="carousel-control-prev" type="button" data-bs-target="#pcPhotoCarousel" data-bs-slide="prev">
					<span class="carousel-control-prev-icon"></span>
					<span class="visually-hidden">Prev</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#pcPhotoCarousel" data-bs-slide="next">
					<span class="carousel-control-next-icon"></span>
					<span class="visually-hidden">Next</span>
				</button>
				</div>
			</div>

			<!-- 2~5) 텍스트 정보 -->
			<div class="p-3 border-bottom">

				<div class="fw-bold mb-2"><?= $is_domestic?'쿠폰 리스트':'Coupons' ?></div>

				<div id="pcCouponCarousel" class="carousel slide" data-bs-touch="true" data-bs-interval="0">
					<div class="carousel-inner" id="pcCouponSlides"><!-- JS로 슬라이드 채움 --></div>
					<div class="carousel-indicators" id="pcCouponDots"><!-- JS로 dots 채움 --></div>

					<button class="carousel-control-prev" type="button" data-bs-target="#pcCouponCarousel" data-bs-slide="prev" style="filter:drop-shadow(0 0 2px #0003);">
						<span class="carousel-control-prev-icon"></span><span class="visually-hidden">Prev</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#pcCouponCarousel" data-bs-slide="next" style="filter:drop-shadow(0 0 2px #0003);">
						<span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span>
					</button>
				</div>

				<hr>

				<!-- <div class="h5 fw-bold mb-2" id="pcDetName2">-</div> -->
				<div class="text-body mb-3" id="pcDetDesc"></div>

				<div class="mb-2">
					<div class="small text-muted mb-1"><?= $is_domestic?'운영시간':'Hours' ?></div>
					<div id="pcDetHours" class="fw-semibold">-</div>
				</div>

				<div class="mb-2">
					<div class="small text-muted mb-1"><?= $is_domestic?'주소':'Address' ?></div>
					<div id="pcDetAddr" class="fw-semibold">-</div>
				</div>
			</div>


		</div>

	</div>
</div>


<!-- PC 전용: Stamp Tour 패널(우측 오프캔버스) -->
<div class="offcanvas offcanvas-start d-none d-xl-flex" tabindex="-1" id="pcStampDetail" aria-labelledby="pcStampDetailLabel" style="width:520px;">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title fw-bold" id="pcStampDetailLabel">Stamp Tour Event</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body p-0 d-flex flex-column">
		<!-- JS가 모바일 #stampSheet 본문을 그대로 채움 -->
		<div id="pcStampBody" class="p-0" style="height:100%; overflow:hidden;overflow-y:auto;">
<?=$stampExplain?>
		</div>
	</div>
</div>

<!-- PC 전용: SuperPass 패널(우측 오프캔버스) -->
<div class="offcanvas offcanvas-start d-none d-xl-flex" tabindex="-1" id="pcSuperpassDetail" aria-labelledby="pcSuperpassDetailLabel" style="width:520px;">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title fw-bold" id="pcSuperpassDetailLabel">About</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body p-0 d-flex flex-column">
		<!-- JS가 모바일 #stampSheet 본문을 그대로 채움 -->
		<div id="pcStampBody" class="p-0" style="height:100%; overflow:hidden;overflow-y:auto;">
<?=$superpassExplain?>
		</div>
	</div>
</div>


<!-- PC 전용: Event 패널(우측 오프캔버스) -->
<div class="offcanvas offcanvas-start d-none d-xl-flex" tabindex="-1" id="pcEventDetail" aria-labelledby="pcEventDetailLabel" style="width:520px;">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title fw-bold" id="pcEventDetailLabel">Dongdaemun Event</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body p-0 d-flex flex-column">
		<!-- JS가 모바일 #stampSheet 본문을 그대로 채움 -->
		<div id="pcEventBody" class="p-0" style="height:100%; overflow:hidden;overflow-y:auto;">
<?=$eventExplain?>
		</div>
	</div>
</div>







<!-- Mobile - Search Result Panel -->
<div class="offcanvas offcanvas-bottom d-xl-none" tabindex="-1" id="resultPanel" data-bs-scroll="true" data-bs-backdrop="true" aria-labelledby="resultPanelLabel">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title fw-bold w-100" id="resultPanelLabel">
		<nav class="nav nav-pills nav-justified w-100">
			<button type="button" class="mb-nav-item nav-link active fw-bold" data-action="map">Shop List</button>
			<button type="button" class="mb-nav-item nav-link fw-bold" data-action="stamp">Stamp Tour</button>
		</nav>
		</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body p-0 d-flex flex-column">
		<div class="resultListWrap card border-0 rounded-0 h-100">
			<ul id="resultList" class="list-group list-group-flush mb-4"></ul>
		</div>
	</div>
</div>






<!-- Mobile - Bottom Detail Sheet (50%) -->
<div class="offcanvas offcanvas-bottom d-xl-none" tabindex="-1" id="mPlaceSheet" aria-labelledby="mPlaceSheetLabel" data-bs-scroll="true" data-bs-backdrop="false">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title fw-bold" id="mDetName">-</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
	</div>
	<div class="offcanvas-body p-0 d-flex flex-column">
		<div id="mPlaceBody" class="p-0" style="height:100%; overflow:hidden;overflow-y:auto;">
			<!-- 1) 사진 -->
			<div id="mPhotoCarouselWrap" class="border-bottom">
				<div id="mPhotoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="0">
					<div class="carousel-inner" id="mPhotoSlides"></div>
					<button class="carousel-control-prev" type="button" data-bs-target="#mPhotoCarousel" data-bs-slide="prev">
						<span class="carousel-control-prev-icon"></span><span class="visually-hidden">Prev</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#mPhotoCarousel" data-bs-slide="next">
						<span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span>
					</button>
				</div>
			</div>
			<div class="p-3">
				<div class="fw-bold mb-2">Coupons</div>
				<div id="mCouponCarousel" class="carousel slide" data-bs-touch="true" data-bs-interval="0">
					<div class="carousel-inner" id="mCouponSlides"></div>
					<div class="carousel-indicators" id="mCouponDots"></div>
					<button class="carousel-control-prev" type="button" data-bs-target="#mCouponCarousel" data-bs-slide="prev">
						<span class="carousel-control-prev-icon"></span><span class="visually-hidden">Prev</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#mCouponCarousel" data-bs-slide="next">
						<span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span>
					</button>
				</div>
			</div>
			<!-- 2~5) 텍스트 -->
			<div class="p-3 border-bottom">
				<div class="text-body mb-3" id="mDetDesc" style="white-space:pre-line;"></div>

				<div class="mb-2">
					<div class="small text-muted mb-1"><?= $is_domestic?'운영시간':'Hours' ?></div>
					<div id="mDetHours" class="fw-semibold">-</div>
				</div>
				<div class="mb-2">
					<div class="small text-muted mb-1"><?= $is_domestic?'주소':'Address' ?></div>
					<div id="mDetAddr" class="fw-semibold">-</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Mobile: Stamp 이벤트 Modal -->
<div class="modal fade modal-rounded d-xl-none" id="stampSheet" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content" style="position:relative; overflow:visible; ">
			<div class="modal-header">
				<h5 class="modal-title fw-bold" id="resultStoreName">Stamp Tour Event</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body text-start p-0" style="position:relative; z-index:0;">
				<div id="mStampBody" class="p-0" style="height:76vh; overflow:hidden;overflow-y:auto;">
<?=$stampExplain?>
				</div>
			</div>
		</div>
	</div>
</div>

<? /*
<!-- Mobile : Superpass Desc -->
<div class="offcanvas offcanvas-bottom d-xl-none" tabindex="-1" id="superpassSheet" aria-labelledby="superpassSheetLabel" data-bs-scroll="true" data-bs-backdrop="false">
	<div class="sheet-grip" aria-hidden="true"></div> <!-- 드래그 핸들 -->
	<div class="offcanvas-header pt-2 pb-1">
		<h5 class="offcanvas-title fw-bold p-3" id="superpassSheetLabel">About Super Pass</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
	</div>
	<div class="offcanvas-body pt-1 px-2">
		<div id="superpassBody" class="p-0" style="height:100%; overflow:hidden;overflow-y:auto;">
<?=$superpassExplain?>
		</div>
	</div>
</div>
*/ ?>
<!-- Mobile: Stamp 이벤트 Modal -->
<div class="modal fade modal-rounded d-xl-none" id="superpassSheet2" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content" style="position:relative; overflow:visible; ">
			<div class="modal-header">
				<h5 class="modal-title fw-bold" id="resultStoreName">About Super Pass</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body text-start p-0" style="position:relative; z-index:0;">
				<div id="superpassBody" class="p-0" style="height:76vh; overflow:hidden;overflow-y:auto;">
<?=$superpassExplain?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade modal-rounded d-xl-none" id="eventSheet" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content" style="position:relative; overflow:visible; ">
			<div class="modal-header">
				<h5 class="modal-title fw-bold" id="resultStoreName">Dongdaemun Event</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body text-start p-0" style="position:relative; z-index:0;">
				<div id="mEventBody" class="p-0" style="height:76vh; overflow:hidden;overflow-y:auto;">
<?=$eventExplain?>
				</div>
			</div>
		</div>
	</div>
</div>




<!-- 쿠폰 상세 모달 -->
<div class="modal fade modal-rounded" id="couponModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" style="max-width:560px;">
		<div class="modal-content">
			<div class="modal-header">
				<input type="hidden" id="modalCouponTitle">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body pt-0">
				<!-- <h3 class="modal-title fw-bold text-center p-3" id="modalStoreName">Store</h3> -->
				<div class="ticketTop">
					<img src="/assets/images/couponTopLogo.jpg">
					<h4 id="ticketTopInfo"></h4>
				</div>
				
				<div class="ticket">
					<p class="stars">✦ ✦ ✦ ✦</p>

					<div class="kv">
					<div class="label">Desc.</div>
					<div id="modalCouponDesc">-</div>

					<div class="label">Valid until</div>
					<div id="modalBadgeValid">-</div>

					<div class="label">Location</div>
					<div id="couponLocation">-</div>

					<div class="label">Hours</div>
					<div id="couponOpenTime">-</div>
					</div>

					<p class="note">· You can use only 1 coupon per person.</p>
				</div>

				<div class="divCouponPriceSet">
					<div class="mt-3 mb-1">
						<div class="input-group couponInputPrice">
							<div class="input-group-text">Price</div>
							<input type="number" class="form-control form-control-lg" id="modalPrice" placeholder="Total Price" pattern="[0-9]*" autocomplete="off">
							<span class="input-group-text">KRW</span>
						</div>
							</div>
							<div class="mb-2">
						<div class="input-group couponInputPrice">
							<div class="input-group-text">Code</div>
							<input type="text" class="form-control form-control-lg" id="modalCode" placeholder="Coupon Code" autocomplete="off">
						</div>
					</div>
				</div>
				<div class="divCouponLinkSet">
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-warning btn-lg w-100 fw-bold p-3" id="btnModalUse">Coupon USE</button>
			</div>
		</div>
	</div>
</div>

<!-- 쿠폰 사용 결과 모달 -->
<div class="modal fade modal-rounded" id="resultModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" style="max-width:560px;">
		<div class="modal-content" style="position:relative; overflow:visible; ">
			<div class="modal-header">
				<h5 class="modal-title fw-bold" id="resultStoreName">Store</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body text-center" style="position:relative; z-index:0;">
		
				<div class="slot" aria-hidden="true"></div>
					<!-- 티켓 본문 -->
					<article class="receipt" role="region" aria-label="DDP Coupon Result">
						<div class="row">
							<div class="logo">
								<img src="/assets/images/couponTopLogo.png">
							</div>
						</div>

						<h1 id="resultCouponTitle">-</h1>
						<div class="divider"></div>
						<p class="lead">Coupon usage has been completed.</p>
						<div class="divider"></div>
						<p class="lead" id="resultLine2">-</p>
						<div class="paypill" id="resultPay">-</div>
						<div class="divider"></div>
						<p class="thanks">Thank you.</p>
					</article>

					<button class="btn btn-dark btn-lg w-100 p-3 rounded-5 mt-3" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?=$scriptGlobalVal ?>
<?=$scriptUtils ?>
<?=$scriptApiGuard ?>
<?=$scriptSmartLoader ?>
<?=$scriptLists ?>
<?=$scriptSearchUnified?>
<?=$scriptMarkers ?>
<?=$scriptMapInit ?>
<?=$scriptCategories ?>
<?=$scriptDetailPC ?>
<?=$scriptStampPC?>
<?=$scriptDetailMobile ?>
<?=$scriptStampSheet?>
<?=$scriptCoupons ?>
<?=$scriptMobileBottomNav ?>
<?//=$scriptRelayoutHardUnlock?>

