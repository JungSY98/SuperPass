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

<div class="row g-5 " style="padding:12%;">
	<div class="col-sm-12">

		<h4 class="text-start mb-5" style="font-size:1.5vh;">[2024 중소기업 산업디자인 개발 지원사업 운영]<h4>

		<h3 class="text-center mb-5" style="font-size:2.5vh;">심사위원 위촉승낙서<h3>

		<p class="" style="font-size:1.75vh;">본인은 서울디자인재단에서 실시하는 <span class="text-blue">[2024 중소기업 산업디자인 개발 지원사업]</span> 참여기업 심사위원으로 위촉됨을 승낙합니다.</p>

		<table class="table table-bordered" style="font-size:1.6vh;margin-top:7%;">
			<tr>
				<th colspan=2 class="align-middle">성명</th>
				<td>
					<?=element("signName", element("signData", $signD))?>
				</td>
			</tr>
			<tr>
				<th colspan=2 class="align-middle">주민번호</th>
				<td>
					<?=element("signSNO", element("signData", $signD))?>
				</td>
			</tr>
			<tr>
				<th colspan=2 class="align-middle">주소지</th>
				<td>
					<?=element("signAddress", element("signData", $signD))?>
				</td>
			</tr>
			<tr>
				<th rowspan=3 class="align-middle">계좌정보</th>
				<th class="align-middle">은행명</th>
				<td>
					<?=element("bankName", element("signData", $signD))?>
				</td>
			</tr>
			<tr>
				<th class="align-middle">계좌번호</th>
				<td>
					<?=element("bankAccountNo", element("signData", $signD))?>
				</td>
			</tr>
			<tr>
				<th class="align-middle">예금주</th>
				<td>
					<?=element("bankAccountName", element("signData", $signD))?>
				</td>
			</tr>
			<tr>
				<th colspan=2 class="align-middle">심사비 소득 유형</th>
				<td>
					<?=element("income", element("signData", $signD))=='etc' ? '기타 소득':'사업 소득'?>
				</td>
			</tr>
		</table>

		<h4 class="text-center mt-4 mb-4" style="padding-top:30%; font-size:2vh;"><?=date("Y년 m월 d일", strtotime(element("regDate", $signD)))?></h4>

		<div class="row position-relative" style="font-size:2vh;margin-top:15%;">
			<div class="col-sm-6"></div>
			<div class="col-sm-6">평가위원 <?=element("memName", element("signData", $signD))?></div>
			<div  class="position-absolute top-0 start-50 w-50">
				<div class="w-100 mb-4" id="divPanelSign1" style="height:200px;"></div>
			</div>
		</div>
		<div  class="row" style="margin-top:150px;">
			<div  class="col-sm-12">
				<h4 class="text-center mt-5 mb-4"style="font-size:2.5vh;">(재)서울디자인재단 대표이사 귀하</h4>
			</div>
		</div>

	</div>


	<div class="col-sm-12" style="margin-top:20%;">

		<h4 class="text-start mb-5" style="font-size:1.5vh;">[2024 중소기업 산업디자인 개발 지원사업 운영]<h4>

		<h3 class="text-center mb-5" style="font-size:2.5vh;">보안 서약서<h3>


		<p style="font-size:1.5vh;"><strong>□ 사업명: 2024 중소기업 산업디자인 개발 지원사업 운영</strong></p>

		<p style="font-size:1.5vh;">2024 중소기업 산업디자인 개발 지원사업 심사위원으로 위촉받아 심사 업무를 수행 함에 있어 아래 사항을 준수하고 관계 절차에 따라 위원의 양심과 도리로 공정하게 수행할 것을 서약하며 이에 각서를 제출합니다.</p>

		<p style="font-size:1.5vh;text-indent:-2.5%;padding-left:2.5%;">1. 당해 심사 업무 수행과정에서 습득한 심사위원 정보 등 제반 내용을 외부에 누설하지 않겠습니다.</p>

		<p style="font-size:1.5vh;text-indent:-2.5%;padding-left:2.5%;">2. 이유 여하를 막론하고 이해관계자에게 어떤 부당한 요구를 하거나 금품, 향응 등을 제공 받지 않겠습니다.</p>

		<p style="font-size:1.5vh;text-indent:-2.5%;padding-left:2.5%;">3. 심사위원으로 수락한 시점부터 심사가 완료될 때까지 참여 업체의 관계자와는 어떠한 경우에도 직-간접적으로 개별 접촉하지 않겠습니다. </p>

		<p style="font-size:1.5vh;text-indent:-2.5%;padding-left:2.5%;">4. 평가과정에서 기피·제척사유(① 본인 또는 소속단체가 해당 평가 대상과 관련하여 용역, 자문, 연구 등을 수행한 경우, ② 해당 평가의 시행으로 인하여 이해당사자가 되는 경우, ③ 평가일 기준 최근 3년 이내 해당 평가대상업체에 재직한 경우, ④ 해당 안건의 당사자와 친족이거나 친족이었던 경우, ⑤ 기타 공정한 심사를 수행할 수 없다고 판단될 경우)에 해당하는 경우 이러한 사실을 서울디자인재단에 즉시 알리고, 해당 업체 평가에 대한 ‘회피신청서’를 제출하여야 합니다.</p>

		<p style="font-size:1.5vh;text-indent:-2.5%;padding-left:2.5%;">5. 위 내용을 위반할 시에는 관계법령에 따라 어떠한 처벌이라도 감수할 것이며, 위반사실이 확인된 날로부터 향후 3년간 서울디자인재단에서 주관하는 평가위원회에 참여할 수 없음을 확인합니다.</p>



		<h4 class="text-center mt-4 mb-4" style="padding-top:15%; font-size:2vh;"><?=date("Y년 m월 d일", strtotime(element("regDate", $signD)))?></h4>

		<div class="row position-relative" style="font-size:2vh;margin-top:15%;">
			<div class="col-sm-6"></div>
			<div class="col-sm-6">평가위원 <?=element("memName", element("signData", $signD))?></div>
			<div  class="position-absolute top-0 start-50 w-50">
				<div class="w-100 mb-4" id="divPanelSign2" style="height:200px;"></div>
			</div>
		</div>
		<div  class="row" style="margin-top:150px;">
			<div  class="col-sm-12">
				<h4 class="text-center mt-5 mb-4"style="font-size:2.5vh;">(재)서울디자인재단 대표이사 귀하</h4>
			</div>
		</div>



	</div>



	<div class="col-sm-12" style="margin-top:10%;">

		<h4 class="text-start mb-5" style="font-size:1.5vh;">[2024 중소기업 산업디자인 개발 지원사업 운영]<h4>

		<h3 class="text-center mb-5" style="font-size:2.5vh;">개인정보 수집-이용 및 제3자 제공 동의서<h3>


		<p style="font-size:1.5vh;">(재)서울디자인재단에서는 <strong>심사비 지급</strong>을 위하여 아래와 같이 개인정보를 수집‧이용 및 제3자 제공하고자 합니다. 내용을 자세히 읽으신 후 동의 여부를 결정하여 주십시오.</p>

		<p style="font-size:1.5vh;" class="mb-0"><strong>□ 개인정보 수집‧이용 내역</strong></p>

		<table class="table" style="font-size:1.5vh;">
			<tr>
				<th>수집‧이용 항목</th>
				<th>수집․이용 목적</th>
				<th>보유기간</th>
			</tr>
			<tr>
				<td>성명, 전화번호, 주소, <br>주민번호, 계좌번호</td>
				<td>심사비 지급</td>
				<td>6개월</td>
			</tr>
		</table>

		<p style="font-size:1.5vh;">※ 위의 개인정보 수집‧이용에 대한 동의를 거부할 권리가 있습니다. 그러나 동의를 거부할 경우 자문회의비 지급에 대한 제한을 받을 수 있습니다.</p>
		<div class="row" style="font-size:1.5vh;">
			<div class="col-sm-9 text-blue">☞ 위와 같이 개인정보를 수집·이용하는데 동의하십니까? </div>
			<div class="col-sm-3"><?=element("agree1", element("signData", $signD))=='Y' ? '예':'아니요'?></div>
			</div>
		</div>


		<h5 style="font-size:1.5vh;" class="mb-0 mt-5"><strong>□ 개인정보 3자 제공 내역</strong></h5>

		<table class="table" style="font-size:1.5vh;">
			<tr>
				<th>제공받는자</th>
				<th>제공 목적</th>
				<th>제공 항목</th>
				<th>보유기간</th>
			</tr>
			<tr>
				<td>서울디자인재단 재무팀</td>
				<td>심사비 지급</td>
				<td>성명, 전화번호, 주소, <br>주민번호, 계좌번호</td>
				<td>6개월</td>
			</tr>
		</table>

		<p style="font-size:1.5vh;">※ 위의 개인정보 수집‧이용에 대한 동의를 거부할 권리가 있습니다. 그러나 동의를 거부할 경우 자문회의비 지급에 대한 제한을 받을 수 있습니다.</p>

		<div class="row" style="font-size:1.5vh;">
			<div class="col-sm-9 text-blue">☞ 위와 같이 개인정보를 제3자에게 제공하는데 동의하십니까? </div>
			<div class="col-sm-3"><?=element("agree2", element("signData", $signD))=='Y' ? '예':'아니요'?></div>
			</div>
		</div>

		<h4 class="text-center" style="padding-top:0%; font-size:2vh;"><?=date("Y년 m월 d일", strtotime(element("regDate", $signD)))?></h4>

		<div class="row position-relative" style="font-size:2vh;margin-top:5%;">
			<div class="col-sm-6"></div>
			<div class="col-sm-6">평가위원 <?=element("memName", element("signData", $signD))?></div>
			<div  class="position-absolute top-0 start-50 w-50">
				<div class="w-100 mb-4" id="divPanelSign3" style="height:200px;"></div>
			</div>
		</div>
		<div  class="row" style="margin-top:100px;">
			<div  class="col-sm-12">
				<h4 class="text-center mt-5 mb-4"style="font-size:2.5vh;">(재)서울디자인재단 대표이사 귀하</h4>
			</div>
		</div>




	</div>

</div>



<textarea class="d-none" name="dataPanelSign1" id="dataPanelSign1"><?=element("sign1", $signD)?></textarea>
<textarea class="d-none" name="dataPanelSign2" id="dataPanelSign2"><?=element("sign2", $signD)?></textarea>


<script>
$(document).ready(function() {
	
});
</script>

<!-- contents start -->
<!--[if IE]>
<script type="text/javascript" src="/assets/signature/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="/assets/signature/jquery.ui.touch-punch.min.js"></script>
<script src="/assets/signature/jquery.signature.js"></script>

<script>
$('#divPanelSign1').signature().signature('enable').signature('draw', $("#dataPanelSign2").val());
$('#divPanelSign2').signature().signature('enable').signature('draw', $("#dataPanelSign2").val());
$('#divPanelSign3').signature().signature('enable').signature('draw', $("#dataPanelSign2").val());
$(document).ready(function() {
	//
	if ($('#dataPanelSign2').val() != '') {
		$('#divPanelSign1').signature().signature('enable').signature('draw', $("#dataPanelSign2").val());
		$('#divPanelSign2').signature().signature('enable').signature('draw', $("#dataPanelSign2").val());
		$('#divPanelSign3').signature().signature('enable').signature('draw', $("#dataPanelSign2").val());
	}
	setTimeout(function() { window.print(); }, 1000);
});
</script>