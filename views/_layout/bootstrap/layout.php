<!DOCTYPE html>
<html lang="ko">
<head>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-M42ZSF7R');</script>
	<!-- End Google Tag Manager -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,viewport-fit=cover,initial-scale=1.0,minimum-scale=1,maximum-scale=1,user-scalable=yes" />
	<meta property="og:title" content="<?php echo html_escape(element('page_title', $layout)); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://superpass.sfw.kr/" />
	<meta property="og:image" content="https://superpass.sfw.kr/assets/images/ddpSuperPass.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<title><?php echo html_escape(element('page_title', $layout)); ?></title>
<?php if (element('meta_description', $layout)) { ?>
	<meta property="og:description" name="description" content="<?php echo html_escape(element('meta_description', $layout)); ?>">
<?php } ?>
<?php if (element('meta_keywords', $layout)) { ?>
	<meta name="keywords" content="<?php echo html_escape(element('meta_keywords', $layout)); ?>">
<?php } ?>
<?php if (element('meta_author', $layout)) { ?>
	<meta name="author" content="<?php echo html_escape(element('meta_author', $layout)); ?>">
<?php } ?>
<?php if (element('favicon', $layout)) { ?>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo element('favicon', $layout); ?>" />
<?php } ?>
<?php if (element('canonical', $view)) { ?>
	<link rel="canonical" href="<?php echo element('canonical', $view); ?>" />
<?php } ?>
	<link href="https://hangeul.pstatic.net/hangeul_static/css/nanum-square-neo.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/assets/bootstrap-5.3.0/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.7.0/css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="/assets/jqueryui/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/siteAnimationDefine.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/siteStyle.css" />
	<?php echo $this->managelayout->display_css(); ?>

	<script type="text/javascript" src="/assets/js/jquery-3.6.4.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery-migrate-1.4.1.min.js"></script>
	<script type="text/javascript" src="/assets/jqueryui/jquery-ui.js"></script>
	<script type="text/javascript" src="/assets/js/popper.min.js"></script>
	<script type="text/javascript" src="/assets/bootstrap-5.3.0/js/bootstrap.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@fingerprintjs/fingerprintjs@3/dist/fp.min.js"></script>

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
<body class="" <?php echo isset($view) ? element('body_script', $view) : ''; ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M42ZSF7R"	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

<div class="container-fluid p-0">
	<div class="div<?=(defined("isMain")==true) ? "Main" : "Sub"?>Contents">
<!-- contents start -->
<?php if (isset($yield))echo $yield; ?>
<!-- contents end -->
	</div>
</div>



<?php echo element('popup', $layout); ?>
<?php echo $this->cbconfig->item('footer_script'); ?>


</div>
</div>

<script>

$(document).ready(function() {
	// 사용자 정보 수집
		function getUserInfo(callback) {
			const userAgent = navigator.userAgent;
			let clientUUID = localStorage.getItem('clientUUID');
			if (clientUUID) {
				callback({ userAgent: userAgent, clientUUID: clientUUID });
			} else {
				FingerprintJS.load().then(fp => {
					fp.get().then(result => {
						clientUUID = result.visitorId;
						localStorage.setItem('clientUUID', clientUUID);
						callback({ userAgent: userAgent, clientUUID: clientUUID });
					});
				});
			}
		}

// UUID 요청 및 표시
    function fetchAndDisplayUUID() {

		$('#uuid-display').text('');
		$('#user-info').text('');

        getUserInfo(function(userInfo) {
            // 세션 스토리지에서 UUID 확인
            let uuid = sessionStorage.getItem('userUUID');

            // 서버로 사용자 정보 전송
            $.ajax({
				url: '/main/generate_uuid/',
				type: 'POST',
				dataType: 'json',
				data: {
					userAgent: userInfo.userAgent,
					clientUUID: userInfo.clientUUID,
					'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
				},
                success: function(response) {
                    if (response.status === 'success') {
                        const uuid = response.uuid;
                        sessionStorage.setItem('userUUID', uuid);
                        $('#uuid-display').text(`UUID: ${uuid}`);
                        $('#user-info').text(`User-Agent: ${userInfo.userAgent}`);
                    } else {
                        $('#uuid-display').text('오류: UUID 생성 실패');
                        console.error('서버 응답 오류:', response.message);
                    }
                },
                error: function(error) {
                    $('#uuid-display').text('오류: 서버 연결 실패');
                    console.error('AJAX 오류:', error);
                }
            });
        });
    }

    // 페이지 로드 시 UUID 요청
    fetchAndDisplayUUID();

    // 새로고침 버튼 클릭 시 캐시 지우고 새 UUID 요청
    $('#refresh-uuid').click(function() {
        sessionStorage.removeItem('userUUID');
        fetchAndDisplayUUID();
    });

});

</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GQD52Z899H"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GQD52Z899H');
</script>



</body>
</html>
