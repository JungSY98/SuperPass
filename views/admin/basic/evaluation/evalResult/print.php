	<link rel="stylesheet" type="text/css" href="/assets/bootstrap-5.3.0/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.7.0/css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="/assets/jqueryui/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/siteStyle.css" />
	
	<script type="text/javascript" src="/assets/js/jquery-3.6.4.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery-migrate-1.4.1.min.js"></script>
	<script type="text/javascript" src="/assets/jqueryui/jquery-ui.js"></script>
	<script type="text/javascript" src="/assets/js/popper.min.js"></script>
	<script type="text/javascript" src="/assets/bootstrap-5.3.0/js/bootstrap.js"></script>

	<script type="text/javascript">
		// 자바스크립트에서 사용하는 전역변수 선언
		var cb_url = "https://www.seoulindustrydesign.com";
		var cb_cookie_domain = "";
		var cb_charset = "UTF-8";
		var cb_time_ymd = "<?=date('Y-m-d')?>";
		var cb_time_ymdhis = "<?=date('Y-m-d H:i:s')?>";
		var layout_skin_path = "_layout/bootstrap";
		var view_skin_path = "evaluation/bootstrap";
		var is_member = "1";
		var is_admin = "";
		var cb_admin_url = "";
		var cb_board = "";
		var cb_board_url = "";
		var cb_device_type = "desktop";
		var cb_csrf_hash = "<?php echo $this->security->get_csrf_hash(); ?>";
		var cookie_prefix = "";
	</script>
	<!--[if lt IE 9]>
	<script type="text/javascript" src="/assets/js/html5shiv.min.js"></script>
	<script type="text/javascript" src="/assets/js/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="/assets/js/common.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.validate.extension.js"></script>
	<script type="text/javascript" src="/assets/js/sideview.js"></script>
	<script type="text/javascript" src="/assets/js/js.cookie.js"></script>


<div class="table-responsive" style="padding:5%;">

<h4 class="text-start mb-5" style="font-size:1.5vh;">[2024 중소기업 산업디자인 개발 지원사업  / <?=element("name", $signD)?> 결과]<h4>

<table class="table table-hover table-striped " style="font-size:1.1vh;">
	<thead>
	<tr>
		<th class='text-center col-xs-2'>프로젝트명</th>
		<th class='text-center col-xs-2'>기업역량 & 사업화의지(10)		</th>
		<th class='text-center col-xs-2'>상품성(20)</th>
		<th class='text-center col-xs-2'>사업화 가능성 & 활용성 (20)</th>
		<th class='text-center col-xs-2'>기업역량 & 전문성 (20)</th>
		<th class='text-center col-xs-2'>디자인개발 수행계획 적절성 (30)</th>
		<th class='text-center'>Comments</th>
	</tr>
	</thead>
	<tbody>
<?
$canSign = true;
$sSign = "";
if (!empty($data)) {
foreach ($data as $result) {
?>
	<tr>
		<td class='text-center'><?=$result['projectName']?></td>
		<td class='text-center'><?=number_format($result['ee_field1'])?></td>
		<td class='text-center'><?=number_format($result['ee_field2'])?></td>
		<td class='text-center'><?=number_format($result['ee_field3'])?></td>
		<td class='text-center'><?=number_format($result['ee_field4'])?></td>
		<td class='text-center'><?=number_format($result['ee_field5'])?></td>
		<td><?=nl2br($result['comments'])?></td>
	</tr>
<? } } ?>
	</tbody>
	<tfoot>
<? if (isset($signD)) { ?>
	<tr>
		<th colspan=7>
			<div class="row mt-5">
				<div class="col-sm-2">평가위원 <hr> <?=element("name", $signD)?></div>
				<div class="col-sm-2">Date <hr> <?=date("Y년 m월 d일", strtotime(element("regDate", $signD)))?></div>
				<div class="col-sm-8">Sign <hr> <div id="signPlace" class="aSign" style="width:600px;height:330px;"></div></div>
				<textarea id="dbSign" style="display:none"><?=element("sign2", $signD)?></textarea>
			</div>
		</th>
	</tr>
<? } ?>
	</tfoot>
</table>
</div>

<!-- contents start -->
<!--[if IE]>
<script type="text/javascript" src="/assets/signature/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="/assets/signature/jquery.ui.touch-punch.min.js"></script>
<script src="/assets/signature/jquery.signature.js"></script>

<script>
$('#signPlace').signature().signature('enable').signature('draw', $("#dbSign").val());
$(document).ready(function() {
	//
	if ($('#dbSign').val() != '') {
		$('#signPlace').signature().signature('enable').signature('draw', $("#dbSign").val());
	}
	setTimeout(function() { window.print(); }, 1000);
});
</script>