<!DOCTYPE html>
<html lang="en" >
<head>
	<title>동대문 슈퍼패스 | Administrator Page</title>
	<meta property="og:image" content="https://superpass.sfw.kr/assets/images/ddpSuperPass.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://hangeul.pstatic.net/hangeul_static/css/nanum-square-neo.css" rel="stylesheet">
	<!-- <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> -->
	<!--begin::Global Theme Styles(used by all pages)-->
<!-- 	<link href="/assets/css/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
	<link href="/assets/css/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/> -->

<!--
	<link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/css/bootstrap-4.5.0.css" rel="stylesheet" type="text/css"/>
-->
<link rel="stylesheet" type="text/css" href="/assets/bootstrap-5.3.0/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.7.0/css/font-awesome.css" />
<!-- 
<link href="/assets/css/adminStyle.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/> -->
<link rel="stylesheet" type="text/css" href="/assets/jqueryui/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/siteStyle.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/adminStyle.css" />

	<!--end::Global Theme Styles-->
	<!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

	<script type="text/javascript" src="/assets/js/jquery-3.6.4.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery-migrate-3.4.0.js"></script>
	<script src="/assets/jqueryui/jquery-ui.js"></script>


	<script type="text/javascript" src="/assets/bootstrap-5.3.0/js/bootstrap.js"></script>
	<script type="text/javascript" src="/assets/bootstrap-5.3.0/js/bootstrap.bundle.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.extension.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/common.js'); ?>"></script>
	<!--[if lt IE 9]>
	<script type="text/javascript" src="<?php echo base_url('assets/js/html5shiv.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/respond.min.js'); ?>"></script>
	<![endif]-->
	<script type="text/javascript">
	// 자바스크립트에서 사용하는 전역변수 선언
	var cb_url = "<?php echo trim(site_url(), '/'); ?>";
	var cb_admin_url = "<?php echo admin_url(); ?>";
	var cb_charset = "<?php echo config_item('charset'); ?>";
	var cb_time_ymd = "<?php echo cdate('Y-m-d'); ?>";
	var cb_time_ymdhis = "<?php echo cdate('Y-m-d H:i:s'); ?>";
	var admin_skin_path = "<?php echo element('layout_skin_path', $layout); ?>";
	var admin_skin_url = "<?php echo element('layout_skin_url', $layout); ?>";
	var is_member = "<?php echo $this->member->is_member() ? '1' : ''; ?>";
	var is_admin = "<?php echo $this->member->is_admin(); ?>";
	var cb_admin_url = <?php echo $this->member->is_admin() === 'super' ? 'cb_url + "/' . config_item('uri_segment_admin') . '"' : '""'; ?>;
	var cb_board = "";
	var cb_csrf_hash = "<?php echo $this->security->get_csrf_hash(); ?>";
	var cookie_prefix = "<?php echo config_item('cookie_prefix'); ?>";
	</script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/sideview.js'); ?>"></script>

</head>
<!--end::Head-->

<nav class="navbar navbar-expand-xl navbar-light p-3 sticky-top" aria-label="Admin Navbar" style="background-color:rgba(255,255,255,0.95);border-bottom:2px solid #333;">
	<div class="container">
		<a class="navbar-brand" href="/admin/">Admin</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbars">
			<ul class="navbar-nav me-auto mb-2 mb-xl-0">
<?php
foreach (element('admin_page_menu', $layout) as $__akey => $__aval) {
	$hasAuth = false;
	foreach (element('menu', $__aval) as $menukey => $menuvalue) {
		if (element($menukey, element('admin_auth', $layout))) $hasAuth = true;
	}
	if ($this->member->is_admin()=='super' || $hasAuth) {
	//  <?php echo (element('menu_dir1', $layout) === $__akey) ? 'active' : ''; ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"><?php echo element(0, element('__config', $__aval)); ?></a>
					<ul class="dropdown-menu">
<?php
foreach (element('menu', $__aval) as $menukey => $menuvalue) {
	if (element(0, $menuvalue)=="Seperator") {
			echo '<li><hr class="dropdown-divider"></li>';
			continue;
	} else if ($this->member->is_admin() !='super') {
		if (element(2, $menuvalue) === 'hide' || element($menukey, element('admin_auth', $layout))==false) {
			continue;
		}
	} else {
		if (element(2, $menuvalue) === 'hide' ) {
			continue;
		}
	}
?>
						<li><a class="dropdown-item" href="<?=admin_url($__akey . '/' . $menukey)?>"><?=element(0, $menuvalue)?></a></li>
<? } ?>
					</ul>
				</li>
<? } ?>
<? } ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i></a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="javascript:;"><?=$this->member->item("mem_userid")?> / <?=$this->member->item("mem_username")?></a></li>
						<li><hr></li>
						<li><a class="dropdown-item" href="/login/logout/">로그아웃</a></li>
					</ul>
				</li>
				<li class="nav-item pt-2"><a class="nav-item p-4 mt-3" href="/" target="_blank">사이트 홈 <i class="fa fa-link"></i></a></li>
			</ul>
		</div>
	</div>
</nav>


<!--begin::Body-->
<body>

<!--begin::Content-->
<div class="adminContent d-flex flex-column flex-column-fluid">

	<!--begin::Entry-->
	<div class="container pt-4">
		<?php echo element('menu_title', $layout) ? '<h4 style="clear:both;" id="menuTitle">' . element('menu_title', $layout) . '</h4>' : ''; ?>

		<br style="clear:both;">
		<!-- 여기까지 레이아웃 상단입니다 -->

		<?php echo $yield; ?>

		<!-- 여기부터 레이아웃 하단입니다 -->
		<br><br>

	<!--end::Entry-->
	</div>

				<!--end::Content-->

	<!--begin::Footer-->
	<div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
		<!--begin::Container-->
		<div class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
			<!--begin::Copyright-->
			<div class="text-dark order-2 order-md-1">
				<span class="text-muted font-weight-bold mr-2">2025 ~ &copy; </span>
				<a href="http://seoulindustrydesign.com/" target="_blank" class="text-dark-75 text-hover-primary">동대문 슈퍼패스</a>
			</div>
			<!--end::Copyright-->

			<!--begin::Nav-->
			<div class="nav nav-dark order-1 order-md-2">
				<a href="http://seoul.go.kr/" target="_blank" class="nav-link px-3">서울특별시</a>
				<a href="http://seouldesign.or.kr/" target="_blank" class="nav-link pr-3 pl-0">Seoul Design Foundation</a>
			</div>
			<!--end::Nav-->
		</div>
		<!--end::Container-->
	</div>
<!--end::Footer-->
		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Page-->
</div>
<!--end::Main-->



            </body>
    <!--end::Body-->
</html>
<script>
$("ul.pagination li").addClass("page-item").find("a").addClass("page-link");
$(".datepicker").datepicker({
	dateFormat:"yy-mm-dd"
});
</script>
