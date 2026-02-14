<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<!DOCTYPE html>
<html lang="en" >
<head>
	<title>그린칩스 _ 지속가능한 디자인 제품·서비스 | Administrator Page</title>
	<meta property="og:description" name="description" content="지속가능한 디자인 우수 제품·서비스를 선정하고 국내외 다양한 판로개척 확장을 지원하며 디자인기업의 경쟁력 및 생존력 강화에 실질적 도움이 되도록 하고 있습니다.">
	<meta name="keywords" content="그린칩스페스티벌,그린칩스,지속가능한제품,지속가능한디자인,지속가능한디자인제품서비스판로개척지원사업">
	<meta name="description" content="지속가능한 디자인 우수 제품·서비스를 선정하고 국내외 다양한 판로개척 확장을 지원하며 디자인기업의 경쟁력 및 생존력 강화에 실질적 도움이 되도록 하고 있습니다.">
	<meta name="keywords" content="그린칩스페스티벌,그린칩스,지속가능한제품,지속가능한디자인,지속가능한디자인제품서비스판로개척지원사업
	<meta name="viewport" content="width=device-width,viewport-fit=cover,initial-scale=1.0,minimum-scale=1,maximum-scale=1,user-scalable=yes" />
	<meta property="og:title" content="2024 그린칩스 페스티벌" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.greenchipsseoul.com/" />
	<meta property="og:image" content="http://www.greenchipsseoul.com/assets/images/aboutPoster.jpg">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<!-- <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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

		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Page-->
</div>
<!--end::Main-->



            </body>
    <!--end::Body-->
</html>
