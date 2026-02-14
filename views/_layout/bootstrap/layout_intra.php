<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,viewport-fit=cover,initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=yes" />
	<meta property="og:title" content="<?php echo html_escape(element('page_title', $layout)); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.greenchipsseoul.com/" />
	<meta property="og:image" content="http://www.greenchipsseoul.com/assets/images/aboutPoster.jpg">
	<title><?php echo html_escape(element('page_title', $layout)); ?></title>
<?php if (element('meta_description', $layout)) { ?>	<meta property="og:description" name="description" content="<?php echo html_escape(element('meta_description', $layout)); ?>">
<?php } ?>
<?php if (element('meta_keywords', $layout)) { ?>	<meta name="keywords" content="<?php echo html_escape(element('meta_keywords', $layout)); ?>">
<?php } ?>
<?php if (element('meta_author', $layout)) { ?>	<meta name="author" content="<?php echo html_escape(element('meta_author', $layout)); ?>">
<?php } ?>
<?php if (element('favicon', $layout)) { ?>	<link rel="shortcut icon" type="image/x-icon" href="<?php echo element('favicon', $layout); ?>" /><?php } ?>
<?php if (element('canonical', $view)) { ?>	<link rel="canonical" href="<?php echo element('canonical', $view); ?>" /><?php } ?>
	<link href="https://hangeul.pstatic.net/hangeul_static/css/nanum-square-neo.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/assets/bootstrap-5.3.0/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.7.0/css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="/assets/jqueryui/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/siteStyle.css" />
	<?php echo $this->managelayout->display_css(); ?>

	<script type="text/javascript" src="/assets/js/jquery-3.6.4.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery-migrate-1.4.1.min.js"></script>
	<script type="text/javascript" src="/assets/jqueryui/jquery-ui.js"></script>
	<script type="text/javascript" src="/assets/js/popper.min.js"></script>
	<script type="text/javascript" src="/assets/bootstrap-5.3.0/js/bootstrap.js"></script>

	<script type="text/javascript">
		// 자바스크립트에서 사용하는 전역변수 선언
		var cb_url = "<?php echo trim(site_url(), '/'); ?>";
		var cb_cookie_domain = "<?php echo config_item('cookie_domain'); ?>";
		var cb_charset = "<?php echo config_item('charset'); ?>";
		var cb_time_ymd = "<?php echo cdate('Y-m-d'); ?>";
		var cb_time_ymdhis = "<?php echo cdate('Y-m-d H:i:s'); ?>";
		var layout_skin_path = "<?php echo element('layout_skin_path', $layout); ?>";
		var view_skin_path = "<?php echo element('view_skin_path', $layout); ?>";
		var is_member = "<?php echo $this->member->is_member() ? '1' : ''; ?>";
		var is_admin = "<?php echo $this->member->is_admin(); ?>";
		var cb_admin_url = <?php echo $this->member->is_admin() === 'super' ? 'cb_url + "/' . config_item('uri_segment_admin') . '"' : '""'; ?>;
		var cb_board = "<?php echo isset($view) ? element('board_key', $view) : ''; ?>";
		var cb_board_url = <?php echo ( isset($view) && element('board_key', $view)) ? 'cb_url + "/' . config_item('uri_segment_board') . '/' . element('board_key', $view) . '"' : '""'; ?>;
		var cb_device_type = "<?php echo $this->cbconfig->get_device_type() === 'mobile' ? 'mobile' : 'desktop' ?>";
		var cb_csrf_hash = "<?php echo $this->security->get_csrf_hash(); ?>";
		var cookie_prefix = "<?php echo config_item('cookie_prefix'); ?>";
	</script>
	<!--[if lt IE 9]>
	<script type="text/javascript" src="<?php echo base_url('assets/js/html5shiv.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/respond.min.js'); ?>"></script>
	<![endif]-->
	<script type="text/javascript" src="<?php echo base_url('assets/js/common.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.extension.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/sideview.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/js.cookie.js'); ?>"></script>
<?php echo $this->managelayout->display_js(); ?>

</head>
<body <?php echo isset($view) ? element('body_script', $view) : ''; ?>>



<header class="sticky-top">
	<nav class="navbar navbar-expand-lg" aria-label="IntraNet" id="navSite2">
		<div class="container-fluid">
			<a class="navbar-brand" href="/manage/">중소기업 산업디자인 개발 지원사업</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#intraMenu" aria-controls="intraMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="intraMenu">
				<ul class="navbar-nav ms-md-auto mb-2 mb-lg-0">
<? if (element("mem_id", $_SESSION)==138) { ?>
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="/manage/all/">전체 업무 리스트</a>
					</li>
<? } ?>
<? if (isset($applyNo)) { ?>
					<li class="nav-item">
						<a class="nav-link" href="/manage/cowork/<?=$applyNo?>/">업무 요청</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/manage/view/<?=$applyNo?>/">신청서 수정</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="javascript:;" id="btnManager">담당자 관리</a>
					</li>
<? } ?>
					<li class="nav-item">
						<a class="nav-link" href="/login/logout/"><?=element('userName', $_SESSION) ? element('userName', $_SESSION)." 님 _ " : ""?> 로그아웃</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

</header>



<div class="wrapper <? if (defined("isMain")) { ?>divMain<?}?> position-relative">

<!-- contents start -->
<?php if (isset($yield))echo $yield; ?>
<!-- contents end -->

</div>


<? if (!defined("isMain")) { ?>

<!-- footer start -->
<footer class="mt-3">

	<div class="divCopyRight container-fluid pt-4 pb-1">
		<div class="row">
			<div class="col-sm-3 text-center">
				<h5>서울시 중소기업 산업디자인 개발 지원사업</h5>
			</div>
			<div class="col-sm-6 text-center">
				<p>Copyright ⓒ 2023 서울시 중소기업 산업디자인개발 지원사업 <br class="d-block d-sm-none">All rights reserved.</p>
			</div>
			<div class="col"><img src="/assets/images/logoSeoul.png" class="bottomLogo1" alt="서울특별시"></div>
			<div class="col"><img src="/assets/images/logoFoundation.png" class="bottomLogo2" alt="서울디자인재단"></div>
		</div>
	</div>

</footer>
<!-- footer end -->

<? } ?>


<?php echo element('popup', $layout); ?>
<?php echo $this->cbconfig->item('footer_script'); ?>

<script>
$(document).ready(function() {
<? if (!defined("isMain")) { ?>
	$("#navSite2").css("background-color", "rgba(255, 243, 82, 1)");
<? }?>
	$("#siteNav li a").on("mouseover", function() {
		$(this).css({"border-bottom": "2px solid black", "padding-bottom": "10px"});
	});
	$("#siteNav li a").on("mouseleave",function() {
		$(this).css({"border-bottom": "0px", "padding-bottom": "12px"});
	});
	$("#intraMenu a").css("font-weight", "800");
});


</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-G0CCSKPT2D"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-G0CCSKPT2D');
</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-8H6TZXVSP5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-8H6TZXVSP5');
</script>

</body>
</html>
