<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>중소기업 산업디자인 개발 지원사업 | Administrator Page</title>


<!-- <link rel="stylesheet" type="text/css" href="/assets/bootstrap-5.3.0/css/bootstrap.css" /> -->
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />

<link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.7.0/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="/assets/jqueryui/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo element('layout_skin_url', $layout); ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/siteStyle.css" />

<?php if (element('favicon', $layout)) { ?><link rel="shortcut icon" type="image/x-icon" href="<?php echo element('favicon', $layout); ?>" /><?php } ?>


<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script type="text/javascript" src="/assets/js/jquery-3.6.4.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery-migrate-1.4.1.min.js"></script> -->
<script type="text/javascript" src="/assets/jqueryui/jquery-ui.js"></script>
<!-- <script type="text/javascript" src="/assets/bootstrap-5.3.0/js/bootstrap.js"></script> -->
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>


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
<body>
<!-- start wrapper -->
<div class="wrapper">
	<!-- start nav -->
	<nav class="nav-default">
		<h1 class="nav-header"><a href="<?php echo admin_url(); ?>"><?php echo $this->cbconfig->item('admin_logo'); ?></a></h1>
		<ul class="nav">
			<?php
			foreach (element('admin_page_menu', $layout) as $__akey => $__aval) {
			?>
				<li class="nav-first-level nav_menuname_<?php echo $__akey; ?> <?php echo (element('menu_dir1', $layout) === $__akey) ? 'active' : ''; ?>">
					<a data-toggle="menu_collapse" href="#collapse<?php echo $__akey; ?>" aria-expanded="false" aria-controls="menu_collapse<?php echo $__akey; ?>" onClick="changemenu('<?php echo $__akey; ?>');" class="<?php echo (element('menu_dir1', $layout) === $__akey) ? '' : 'collapsed'; ?>">
						<i class="fa <?php echo element(1, element('__config', $__aval)); ?>"></i>
						<span class="nav-label"><?php echo element(0, element('__config', $__aval)); ?></span>
						<i class="fa <?php echo (element('menu_dir1', $layout) === $__akey) ? 'fa-angle-down' : 'fa-angle-left'; ?> menu-arrow-icon <?php echo $__akey; ?>"></i>
					</a>
					<ul class="nav nav-second-level menu_collapse collapse <?php echo (element('menu_dir1', $layout) === $__akey) ? 'in' : ''; ?>" id="menu_collapse<?php echo $__akey; ?>" <?php echo (element('menu_dir1', $layout) === $__akey) ? '' : 'style="height:0;"'; ?>>
						<?php
						foreach (element('menu', $__aval) as $menukey => $menuvalue) {
							if (element(2, $menuvalue) === 'hide') {
								continue;
							}
						?>
							<li <?php echo (element('menu_dir1', $layout) === $__akey && element('menu_dir2', $layout) === $menukey) ? 'class="active"' : ''; ?>><a href="<?php echo admin_url($__akey . '/' . $menukey); ?>" <?php echo element(1, $menuvalue); ?> ><?php echo element(0, $menuvalue); ?></a></li>
						<?php
						}
						?>
					</ul>
				</li>
			<?php
			}
			?>
		</ul>
	</nav>
	<script type="text/javascript">
	//<![CDATA[
	$(document).ready(function() {
		$('#menu_collapse<?php echo element('menu_dir1', $layout); ?>').collapse('show');
	});
	function changemenu( menukey) {
		if ($('#menu_collapse' + menukey).parent().hasClass('active')) {
			close_admin_menu();
		} else {
			open_admin_menu(menukey);
		}
	}
	function close_admin_menu() {
		$("#menu_collapsesite").find("li").removeClass('active');
		$('.menu_collapse').collapse('hide');
		$('.nav-first-level').removeClass('active');
		$('.menu-arrow-icon').removeClass('fa-angle-down').addClass('fa-angle-left');
	}
	function open_admin_menu(menukey) {
		close_admin_menu();
		$('.nav-first-level.nav_menuname_' + menukey).addClass('active');
		$('.menu-arrow-icon.' + menukey).removeClass('fa-angle-left').addClass('fa-angle-down');
		$('#menu_collapse' + menukey).collapse('toggle');
	}
	//]]>
	</script>
	<!-- end nav -->

	<!-- start content_wrapper -->
	<div class="content_wrapper">
		<!-- start header -->
		<div class="row header">
			<div class="navbar-minimalize"><a href="#" class="btn btn-primary btn-mini"><i class="fa fa-bars"></i></a></div>
			<script type="text/javascript">
			//<![CDATA[
			$(document).on('click', '.navbar-minimalize>a', function() {
				if ($('.nav-default').is(':visible') === true) {
					$('.nav-default').hide();
					$('.content_wrapper').css('margin-left', '0px');
				} else {
					$('.nav-default').show();
					$('.content_wrapper').css('margin-left', '220px');
				}
			});
			//]]>
			</script>
			<ul class="nav-top">
				<li>
					<a href="<?php echo site_url(); ?>" target="_blank">홈페이지로 이동</a>
				</li>
				<li><a href="<?php echo site_url('login/logout'); ?>"><i class="fa fa-sign-out"></i> Log out</a></li>
			</ul>
		</div>
		<!-- end header -->
		<div class="contents">
			<?php echo element('menu_title', $layout) ? '<h3>' . element('menu_title', $layout) . '</h3>' : ''; ?>

			<!-- 여기까지 레이아웃 상단입니다 -->

			<?php echo $yield; ?>

			<!-- 여기부터 레이아웃 하단입니다 -->

		</div>
	</div>
	<!-- end content_wrapper -->
</div>
<!-- end wrapper -->
<footer class="footer">
	Powered by <a href="https://codeigniter.com" target="_blank">Codeigniter Framework</a>.

	<span class="btn_top"><a href="#">Top <i class="fa fa-arrow-circle-o-up fa-lg"></i></a></span>
</footer>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
	$(function() {
		$('#fsearch').validate({
			rules: {
				skeyword: { required:true, minlength:2}
			}
		});
	});

});
/*
$('.datepicker').datepicker({
	format: 'yyyy-mm-dd',
	language: 'kr',
	autoclose: true,
	todayHighlight: true
});
*/
//]]>
</script>


<div class="modal fade" id="viewPhotoModal" tabindex="-1" role="dialog" aria-labelledby="viewPhotoModalLabel">
	<div class="modal-dialog dialog-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="viewPhotoModalLabel">사진 보기</h4>
			</div>
			<div class="modal-body" id="divViewPhoto">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">창닫기</button>
			</div>
		</div>
	</div>
</div>






<div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">조사원 정보 수정</h4>
      </div>
      <div class="modal-body">

		<div class="row">
			<div class="col-sm-3">조사원 이름</div>
			<div class="col-sm-9"><input type="text" class="form-control" name="rName"></div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-3">비번 설정</div>
			<div class="col-sm-9"><input type="text" class="form-control" name="rPW"></div>
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">창닫기</button>
        <button type="button" class="btn btn-primary" onclick="return fnChangeResearcher()">저장하기</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h3 class="modal-title" id="photoModalLabel">사진 추가 & 업로드</h3>
      </div>
      <div class="modal-body">
		<div class="photoAddFile" id="photoAddFile">
			<div id="uploader" style="display:block;height:300px;">
				<p>Your browser doesn't have HTML5 support.</p>
			</div>
		</div>
		<div class="photoAddExplain hidden" id="photoAddExplain" style="max-height:70vh;overflow-y:auto;">
			<p class="text-center"><img src="/assets/images/loading.gif"></p>
			<h3>업로드중입니다.</h3>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-danger w-40" onclick="return fnPhotoSave()">저장하기</button>
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="viewMemoModal" tabindex="-1" role="dialog" aria-labelledby="viewMemoModalLabel">
	<div class="modal-dialog dialog-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="viewMemoModalLabel">합격/불합격 사유 / 업체 관련 메모</h4>
			</div>
			<div class="modal-body">
				<textarea id="comMemo" class="form-control per100" rows="10"></textarea>
				<input type="hidden" id="viewNoComMemo" name="viewNoComMemo" value="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">창닫기</button>
				<button type="button" class="btn btn-primary" onclick="return fnSaveMemo()">저장하기</button>
			</div>
		</div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="photo2Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="photoModalLabel">준공완료 사진 추가 & 업로드</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="photoAddFile" id="photoAddFile2">
			<div id="uploader2" style="display:block;height:300px;">
				<p>Your browser doesn't have HTML5 support.</p>
			</div>
		</div>
		<div class="photoAddExplain hidden" id="photoAddExplain2" style="max-height:70vh;overflow-y:auto;">
			<p class="text-center"><img src="/assets/images/loading.gif"></p>
			<h3>업로드중입니다.</h3>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">창닫기</button>
		<button type="button" class="btn btn-danger w-40" onclick="return fnPhotoSave2()">저장하기</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="viewPrintModal" tabindex="-1" role="dialog" aria-labelledby="viewPrintModalLabel">
	<div class="modal-dialog" role="document" style="width:80vw;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="viewPrintModalLabel">출력하기</h4>
			</div>
			<div class="modal-body">
				※ 1. 설정 더보기 > 용지크기 A2로 설정<br>
				2. 인쇄 대상 > PDF로 저장 하신 후 [저장] 클릭하시면 PDF 로 저장 됩니다.
				<iframe src="" id="downPDFframe" frameborder="0" style="width:100%;height:70vh;"></iframe>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">창닫기</button>
			</div>
		</div>
	</div>
</div>



</body>
</html>
