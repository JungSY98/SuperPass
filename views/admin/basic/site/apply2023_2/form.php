<div class="box">
	<div class="box-table">

	<h3><?=element('category', $applyD)?> _ 신청</h3>

<style>
	div.divForm div.col-sm-6,
	div.divForm div.col-sm-12 {
		margin-bottom:20px;
	}
	table.cateTable th {
		background-color:#ccc;

	}
</style>


	<div class="divForm">
<?//=form_open_multipart("/admin/site/apply/process/", array("method"=>"POST", "id"=>"applyForm", "onsubmit"=>"return fnChkForm()"), array("page_ip"=>$_SERVER['REMOTE_ADDR'], "keyNo"=>$keyNo, "category"=>element('category', $applyD)))?>
		<div class="row">
			<div class="col-sm-6">
				<label for="comName" class="form-label">업체명</label>
				<input type="text" class="form-control" id="comName" name="comName" placeholder="업체명을 입력하세요" value="<?=element('comName', $applyD)?>">
			</div>
			<div class="col-sm-6">
				<label for="ceoName" class="form-label">대표자</label>
				<input type="text" class="form-control" id="ceoName" name="ceoName" placeholder="대표자 명을 입력하세요" value="<?=element('ceoName', $applyD)?>">
			</div>
			<div class="col-sm-6">
				<label for="comNo1" class="form-label">사업자번호</label>
				<div class="input-group">
					<input type="text" class="form-control" id="comNo1" name="comNo1" placeholder="000" inputmode="numeric" pattern="[0-9]*" value="<?=element(0, $comNo)?>">
					<span class="input-group-addon">-</span>
					<input type="text" class="form-control" id="comNo2" name="comNo2" placeholder="00" inputmode="numeric" pattern="[0-9]*"  value="<?=element(1, $comNo)?>">
					<span class="input-group-addon">-</span>
					<input type="text" class="form-control" id="comNo3" name="comNo3" placeholder="00000" inputmode="numeric" pattern="[0-9]*"  value="<?=element(2, $comNo)?>">
				</div>
			</div>
			<div class="col-sm-6">
				<label for="comType1" class="form-label">업태/업종</label>
				<div class="input-group">
					<input type="text" class="form-control" id="comType1" name="comType1" placeholder="업태" value="<?=element('comType1', $applyD)?>">
					<span class="input-group-addon">/</span>
					<input type="text" class="form-control" id="comType2" name="comType2" placeholder="업종" value="<?=element('comType2', $applyD)?>">
				</div>
			</div>
			<div class="col-sm-12">
				<label for="comZip" class="form-label">소재지</label>
				<div class="input-group">
					<span class="input-group-addon">우편번호</span>
					<input type="text" class="form-control d-none d-sm-block" id="comZip" name="comZip"  placeholder="우편번호" readonly size=6 onclick="return execDaumPostcode()" value="<?=element('comZip', $applyD)?>">
				</div>
				<input type="text" class="form-control" id="comAddr1" name="comAddr1" placeholder="주소를 입력하세요" readonly onclick="return execDaumPostcode()" value="<?=element('comAddr1', $applyD)?>">

				<input type="text" class="form-control" id="comAddr2" name="comAddr2" placeholder="상세 주소를 입력하세요"  value="<?=element('comAddr2', $applyD)?>">
				<input type="hidden" id="comAddr3" name="comAddr3" value="<?=element('comAddr3', $applyD)?>">

			</div>
		</div>
		<div class="row">
			<div class="row">
			<div id="wrap" class="" style="width:calc(100% - 30px);display:none;border:0px solid;height:200px;margin:5px 15px;">
			<img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
			</div>
			</div>



			<div class="col-sm-6">
				<label for="comEmployee" class="form-label">상시근로자수</label>
				<input type="text" class="form-control" id="comEmployee" name="comEmployee" placeholder="상시근로자수를 입력하세요" inputmode="numeric" pattern="[0-9]*" value="<?=element('comEmployee', $applyD)?>">
			</div>
			<div class="col-sm-6">
				<label for="comTel" class="form-label">전화번호</label>
				<div class="input-group">
				<input type="text" class="form-control" id="comTel1" name="comTel1" placeholder="000" inputmode="numeric" pattern="[0-9]*"  value="<?=element(0, $comTel)?>">
					<span class="input-group-addon">-</span>
					<input type="text" class="form-control" id="comTel2" name="comTel2" placeholder="0000" inputmode="numeric" pattern="[0-9]*" value="<?=element(1, $comTel)?>">
					<span class="input-group-addon">-</span>
					<input type="text" class="form-control" id="comTel3" name="comTel3" placeholder="0000" inputmode="numeric" pattern="[0-9]*" value="<?=element(2, $comTel)?>">
				</div>
			</div>


			<div class="col-sm-6">
				<label for="comPhone" class="form-label">휴대전화</label>
				<div class="input-group">
					<input type="text" class="form-control" id="comPhone1" name="comPhone1" placeholder="010" inputmode="numeric" pattern="[0-9]*" value="<?=element(0, $comPhone) ? element(0, $comPhone) : '010'?>">
					<span class="input-group-addon">-</span>
					<input type="text" class="form-control" id="comPhone2" name="comPhone2" placeholder="0000" inputmode="numeric" pattern="[0-9]*" value="<?=element(1, $comPhone)?>">
					<span class="input-group-addon">-</span>
					<input type="text" class="form-control" id="comPhone3" name="comPhone3" placeholder="0000" inputmode="numeric" pattern="[0-9]*" value="<?=element(2, $comPhone)?>">
				</div>
			</div>


			<div class="col-sm-6">
				<label for="comEmail1" class="form-label">이메일</label>
				<div class="input-group">
				<input type="text" class="form-control" id="comEmail1" name="comEmail1" value="<?=element(0, $comEmail)?>">
					<span class="input-group-addon">@</span>
					<input type="text" class="form-control" id="comEmail2" name="comEmail2" value="<?=element(1, $comEmail)?>">
				</div>
			</div>

			<div class="col-sm-6">
				<label for="comFile1" class="form-label" style="font-size:16px;">사업자 등록증</label>
				<input type="file" class="form-control" id="comFile1" name="comFile1">
				<p class="text-danger" style="font-size:14px;">※ 첨부 파일의 용량은 최대 10M까지 업로드 가능합니다.</p>
<? if (element("comFile1Source", $applyD)) { ?>
				<input type="hidden" name="comFile1Name" value="<?=element("comFile1Name", $applyD)?>">
				<input type="hidden" name="comFile1Source" value="<?=element("comFile1Source", $applyD)?>">
				<a class="btn btn-default w-100" href="/files/<?=element("comFile1Source", $applyD)?>/apply/down/<?=element("comFile1Name", $applyD)?>/"><?=element("comFile1Name", $applyD)?></a>
<? } ?>
			</div>


			<div class="col-sm-6">
				<label for="comFile2" class="form-label" style="font-size:16px;">소상공인확인서</label>
				<input type="file" class="form-control" id="comFile2" name="comFile2">
				<p class="text-danger" style="font-size:14px;">※ 첨부 파일의 용량은 최대 10M까지 업로드 가능합니다.</p>
<? if (element("comFile2Source", $applyD)) { ?>
				<input type="hidden" name="comFile2Name" value="<?=element("comFile2Name", $applyD)?>">
				<input type="hidden" name="comFile2Source" value="<?=element("comFile2Source", $applyD)?>">
				<a class="btn btn-default w-100" href="/files/<?=element("comFile2Source", $applyD)?>/apply/down/<?=element("comFile2Name", $applyD)?>/"><?=element("comFile2Name", $applyD)?></a>
<? } ?>
			</div>


			<div class="col-sm-6">
				<label for="comFile3" class="form-label" style="font-size:16px;">국세납세증명서</label>
				<input type="file" class="form-control" id="comFile3" name="comFile3">
				<p class="text-danger" style="font-size:14px;">※ 첨부 파일의 용량은 최대 10M까지 업로드 가능합니다.</p>
<? if (element("comFile3Source", $applyD)) { ?>
				<input type="hidden" name="comFile3Name" value="<?=element("comFile3Name", $applyD)?>">
				<input type="hidden" name="comFile3Source" value="<?=element("comFile3Source", $applyD)?>">
				<a class="btn btn-default w-100" href="/files/<?=element("comFile3Source", $applyD)?>/apply/down/<?=element("comFile3Name", $applyD)?>/"><?=element("comFile3Name", $applyD)?></a>
<? } ?>
			</div>


			<div class="col-sm-6">
				<label for="comFile4" class="form-label" style="font-size:16px;">지방세납세증명서</label>
				<input type="file" class="form-control" id="comFile4" name="comFile4">
				<p class="text-danger" style="font-size:14px;">※ 첨부 파일의 용량은 최대 10M까지 업로드 가능합니다.</p>
<? if (element("comFile4Source", $applyD)) { ?>
				<input type="hidden" name="comFile4Name" value="<?=element("comFile4Name", $applyD)?>">
				<input type="hidden" name="comFile4Source" value="<?=element("comFile4Source", $applyD)?>">
				<a class="btn btn-default w-100" href="/files/<?=element("comFile4Source", $applyD)?>/apply/down/<?=element("comFile4Name", $applyD)?>/"><?=element("comFile4Name", $applyD)?></a>
<? } ?>
			</div>




			<div class="col-sm-6">
				<label for="comFile5" class="form-label" style="font-size:16px;">주업종 코드 확인서</label>
				<input type="file" class="form-control" id="comFile5" name="comFile5">
				<p class="text-danger" style="font-size:14px;">※ 첨부 파일의 용량은 최대 10M까지 업로드 가능합니다.</p>
<? if (element("comFile5Source", $applyD)) { ?>
				<input type="hidden" name="comFile5Name" value="<?=element("comFile5Name", $applyD)?>">
				<input type="hidden" name="comFile5Source" value="<?=element("comFile5Source", $applyD)?>">
				<a class="btn btn-default w-100" href="/files/<?=element("comFile5Source", $applyD)?>/apply/down/<?=element("comFile5Name", $applyD)?>/"><?=element("comFile5Name", $applyD)?></a>
<? } ?>
			</div>





			<div class="col-md-12">
				<label for="comEmail1" class="form-label">희망사업비</label>
				<div class="row">
					<div class="col-sm-12">
						<label for="totalFund">총 사업비 선택</label>
						<div class="input-group">
							<select class="form-control" id="totalFund" name="totalFund">
								<option value="">선택하세요</option>
<? for($a=10;$a>=1;$a--) { ?>
								<option value="<?=$a*1000000?>" <?=element('totalFund', $applyD)==$a*1000000?"selected":""?>><?=number_format($a*1000000)?></option>
<? } ?>
							</select>
							<span class="input-group-addon">원</span>
						</div>
					</div>
					<div class="col-sm-3">
						<label for="supportFund">지원금</label>
						<div class="input-group">
							<input type="text" class="form-control" id="supportFund" placeholder="지원금" readonly>
							<input type="hidden" class="form-control" name="supportFund" readonly>
							<span class="input-group-addon">원</span>
						</div>
					</div>
					<div class="col-sm-3">
						<label for="selfFund">자부담</label>
						<div class="input-group">
							<input type="text" class="form-control" id="selfFund" placeholder="자부담" readonly>
							<input type="hidden" class="form-control" name="selfFund" readonly>
							<span class="input-group-addon">원</span>
						</div>
					</div>
					<div class="col-sm-3">
						<label for="vatFund">부가세</label>
						<div class="input-group">
							<input type="text" class="form-control" id="vatFund" placeholder="부가세" readonly>
							<input type="hidden" class="form-control" name="vatFund" readonly>
							<span class="input-group-addon">원</span>
						</div>
					</div>
					<div class="col-sm-3">
						<label for="totalSelfFund">총 자부담</label>
						<div class="input-group">
							<input type="text" class="form-control" id="totalSelfFund" placeholder="총 자부담" readonly>
							<input type="hidden" class="form-control" name="totalSelfFund" readonly>
							<span class="input-group-addon">원</span>
						</div>
					</div>
				</div>
				<br>
				<p class="cateTableGuide text-danger">※ 자부담 금액은 공급가액의 10%이며, <br class="d-block d-sm-none">부가세는 별도 소공인의 자부담입니다. </p>
			</div>


			<div class="col-md-12">
				<label for="applyType" class="form-label">희망신청 분야 선택</label>

						<table class="table cateTable">
							<tr>
								<th class="col-sm-1">분야</th>
								<th class="col-sm-5">개선 품목</th>
								<th class="col-sm-6">용도 및 효과</th>
							</tr>
<?
	$isChecked = "";
	foreach($cate[1] as $k => $itemD) { 
		if ($itemD[2]) $isChecked = "checked onclick='return false;'";
		else if (element($itemD[0], element(1, $applyTypeD))) $isChecked = "checked";
		else $isChecked = "";
?>
							<tr>
<? if ($k==0) { ?>
								<td rowspan="<?=count($cate[1])?>"><?=$cateName[1]?></td>
<? } ?>
								<td>
									<label>
										<input type="checkbox" name="apply[1][<?=$k?>]" value="<?=$itemD[0]?>" <?=$isChecked?>><?=$itemD[0]?><?=$itemD[2]?"(필수)":""?>
									</label>
								</td>
								<td><?=$itemD[1]?></td>
							</tr>
<? } ?>

							<tr>
								<th class="col-sm-1">분야</th>
								<th class="col-sm-5">개선 품목</th>
								<th class="col-sm-6">용도 및 효과</th>
							</tr>
<?
	$isChecked = "";
	foreach($cate[2] as $k => $itemD) { 
		if ($itemD[2]) $isChecked = "checked onclick='return false;'";
		else if (element($itemD[0], element(2, $applyTypeD))) $isChecked = "checked";
		else $isChecked = "";
?>
							<tr>
<? if ($k==0) { ?>
								<td rowspan="<?=count($cate[2])?>"><?=$cateName[2]?></td>
<? } ?>
								<td>
									<label>
										<input type="checkbox" name="apply[2][<?=$k?>]" value="<?=$itemD[0]?>" <?=$isChecked?>><?=$itemD[0]?><?=$itemD[2]?"(필수)":""?>
									</label>
								</td>
								<td><?=$itemD[1]?></td>
							</tr>
<? } ?>

							<tr>
								<th class="col-sm-1">분야</th>
								<th class="col-sm-5">개선 품목</th>
								<th class="col-sm-6">용도 및 효과</th>
							</tr>
<?
	$isChecked = "";
	foreach($cate[3] as $k => $itemD) { 
		if ($itemD[2]) $isChecked = "checked onclick='return false;'";
		else if (element($itemD[0], element(3, $applyTypeD))) $isChecked = "checked";
		else $isChecked = "";
?>
							<tr>
<? if ($k==0) { ?>
								<td rowspan="<?=count($cate[3])?>"><?=$cateName[3]?></td>
<? } ?>
								<td>
									<label>
										<input type="checkbox" name="apply[3][<?=$k?>]" value="<?=$itemD[0]?>"  <?=$isChecked?>><?=$itemD[0]?><?=$itemD[2]?"(필수)":""?>
									</label>
								</td>
								<td><?=$itemD[1]?></td>
							</tr>
<? } ?>

							<tr>
								<th class="col-sm-1">분야</th>
								<th class="col-sm-5">개선 품목</th>
								<th class="col-sm-6">용도 및 효과</th>
							</tr>
<?
	$isChecked = "";
	foreach($cate[4] as $k => $itemD) { 
		if ($itemD[2]) $isChecked = "checked onclick='return false;'";
		else if (element($itemD[0], element(4, $applyTypeD))) $isChecked = "checked";
		else $isChecked = "";
?>
							<tr>
<? if ($k==0) { ?>
								<td rowspan="<?=count($cate[4])?>"><?=$cateName[4]?></td>
<? } ?>
								<td>
									<label>
										<input type="checkbox" name="apply[4][<?=$k?>]" value="<?=$itemD[0]?>" <?=$isChecked?>><?=$itemD[0]?><?=$itemD[2]?"(필수)":""?>
									</label>
								</td>
								<td><?=$itemD[1]?></td>
							</tr>
<? } ?>
<? if (element($itemD[0], element(4, $applyTypeD)) && $itemD[0]=='기타') { ?>
							<tr id="etcField">
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><textarea name="etcType" class="form-control" rows="3" placeholder="기타 희망 품목을 입력하세요" required><?=element('aEtc', element('기타', element(4, $applyEtcD)))?></textarea></td>
							</tr>
<? } ?>
						</table>

					</div>
				</div>

				<h5 class="cateTableGuide">※ 지원 품목 안내 사항</h5>
				<h5 class="cateTableGuide text-danger">- 기본환경(위해요소, 근무환경) 개선 품목 우선 지원</h5>
				<h5 class="cateTableGuide text-danger">- 필수설비(소화기, 화재감지기, 누전차단기, 배선함) 우선 지원</h5>


				<!-- <button type="submit" id="btnSubmit" accesskey="s" class="btn btn-success per100">지원 신청 <?=$keyNo? "수정" : "등록"?></button> -->
				<button type="button" class="btn btn-success per100" onclick="history.go(-1)">뒤로 가기</button>
			</div>


		</div>

<?=form_close()?>
	</div>

</div>



<script>
function fnChkForm() {
	// 필수 사항 체크
	if (fnChkField("comName", "업체명을 입력하세요")==false) { return false; }
	if (fnChkField("ceoName", "대표자명을 입력하세요")==false) { return false; }
	if (fnChkField("comNo1", "사업자등록번호를 입력하세요")==false) { return false; }
	if (fnChkField("comNo2", "사업자등록번호를 입력하세요")==false) { return false; }
	if (fnChkField("comNo3", "사업자등록번호를 입력하세요")==false) { return false; }
	if (fnChkField("comType1", "사업자 업태를 입력하세요")==false) { return false; }
	if (fnChkField("comType2", "사업자 업종을 입력하세요")==false) { return false; }
	if (fnChkField("comAddr1", "사업자 소재지를 입력하세요")==false) { execDaumPostcode();  return false; }
	if (fnChkField("comAddr2", "사업자 소재지 상세주소를 입력하세요")==false) { return false; }
	if (fnChkField("comEmployee", "사업자 소재지 상세주소를 입력하세요")==false) { return false; }
	if (fnChkField("comEmployee", "사업자 소재지 상세주소를 입력하세요")==false) { return false; }
	//if (fnChkField("comTel1", "전화번호를 입력하세요")==false) { return false; }
	//if (fnChkField("comTel2", "전화번호를 입력하세요")==false) { return false; }
	//if (fnChkField("comTel3", "전화번호를 입력하세요")==false) { return false; }
	if (fnChkField("comPhone1", "휴대전화번호를 입력하세요")==false) { return false; }
	if (fnChkField("comPhone2", "휴대전화번호를 입력하세요")==false) { return false; }
	if (fnChkField("comPhone3", "휴대전화번호를 입력하세요")==false) { return false; }
	if (fnChkField("comEmail1", "이메일주소를 입력하세요")==false) { return false; }
	if (fnChkField("comEmail12", "이메일주소를 입력하세요")==false) { return false; }
	if (fnChkField("totalFund", "희망 사업비를 선택하세요")==false) { return false; }
}
function fnChkField(id, msg) {
	if ($("#"+id).val()=="") {
		$('html, body').stop().animate({scrollTop: $("#"+id).position().top}, 500);
		alert(msg);
		$("#"+id).focus();
		return false;
	} else {
		return true;
	}
}
function fnViewPolicy() {
	if ($(".contPrivacyPolicy").css('display')=='none') {
		$("#iconArrow").attr("src", "/assets/images/icon_arrow_up.png");
		$(".contPrivacyPolicy").slideDown();
	} else {
		$("#iconArrow").attr("src", "/assets/images/icon_arrow_down.png");
		$(".contPrivacyPolicy").slideUp();
	}
}
function fnViewTab(cate) {
	$("#tabApplyCategory li").find("a").removeClass("active");
	$("#tabApplyCategory li").each(function() {
		if ($(this).find("a").attr("aria-controls")==cate) $(this).find("a").addClass("active");
	});
	$(".tab-pane").removeClass("active");
	$("#"+cate).addClass("active");
}
$(document).ready(function() {
	$("input[name='apply[4][6]']").on("click", function() {
		if ($(this).is(":checked")==true) {
			$("div#efficientTab table.cateTable").append('<tr id="etcField"><td></td><td><textarea name="etcType" class="form-control" rows="3" placeholder="기타 희망 품목을 입력하세요" required></textarea></td></tr>');
		} else {
			$("#etcField").remove();
		}
	});
	fnViewTab('fireTab');
	$("#totalFund").on("change", function() {
		if ($(this).val()=="") {
			$("#supportFund").val("");
			$("#selfFund").val("");
			$("#vatFund").val("");
			$("#totalSelfFund").val("");
			$("input[name=supportFund]").val("");
			$("input[name=selfFund]").val("");
			$("input[name=vatFund]").val("");
			$("input[name=totalSelfFund]").val("");
		} else {
			s1Fund = parseInt($(this).val() * 0.9);
			s2Fund = parseInt($(this).val() * 0.1);
			vFund = parseInt($(this).val() * 0.1);
			tsFund = parseInt(s2Fund) + parseInt(vFund);
			$("#supportFund").val( number_format( String(s1Fund) ) );
			$("#selfFund").val( number_format( String(s2Fund) ) );
			$("#vatFund").val( number_format( String(vFund) ) );
			$("#totalSelfFund").val( number_format( String(tsFund) ) );
			$("input[name=supportFund]").val( s1Fund );
			$("input[name=selfFund]").val( s2Fund );
			$("input[name=vatFund]").val( vFund );
			$("input[name=totalSelfFund]").val( tsFund );
		}
	});
<? if (element('totalFund', $applyD)){ ?>
	$("#totalFund").val("<?=element('totalFund', $applyD)?>").prop("selected", true);
	var selectFund = <?=element('totalFund', $applyD)?>;
	s1Fund = parseInt(selectFund * 0.9);
	s2Fund = parseInt(selectFund * 0.1);
	vFund = parseInt(selectFund * 0.1);
	tsFund = parseInt(s2Fund) + parseInt(vFund);
	$("#supportFund").val( number_format( String(s1Fund) ) );
	$("#selfFund").val( number_format( String(s2Fund) ) );
	$("#vatFund").val( number_format( String(vFund) ) );
	$("#totalSelfFund").val( number_format( String(tsFund) ) );
	$("input[name=supportFund]").val( s1Fund );
	$("input[name=selfFund]").val( s2Fund );
	$("input[name=vatFund]").val( vFund );
	$("input[name=totalSelfFund]").val( tsFund );

<? } ?>
});
</script>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
    // 우편번호 찾기 찾기 화면을 넣을 element
    var element_wrap = document.getElementById('wrap');

    function foldDaumPostcode() {
        // iframe을 넣은 element를 안보이게 한다.
        element_wrap.style.display = 'none';
    }

    function execDaumPostcode() {
        // 현재 scroll 위치를 저장해놓는다.
        var currentScroll = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
        new daum.Postcode({
            oncomplete: function(data) {
                // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var addr = ''; // 주소 변수
                var extraAddr = ''; // 참고항목 변수

                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                addr = data.roadAddress;

                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                if(data.userSelectedType === 'R'){
                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if(data.buildingName !== '' && data.apartment === 'Y'){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                    if(extraAddr !== ''){
                        extraAddr = ' (' + extraAddr + ')';
                    }
                    // 조합된 참고항목을 해당 필드에 넣는다.
                    document.getElementById("comAddr3").value = extraAddr;
                
                } else {
                    document.getElementById("comAddr3").value = '';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('comZip').value = data.zonecode;
                document.getElementById("comAddr1").value = addr;
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById("comAddr2").focus();

                // iframe을 넣은 element를 안보이게 한다.
                // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
                element_wrap.style.display = 'none';

                // 우편번호 찾기 화면이 보이기 이전으로 scroll 위치를 되돌린다.
                document.body.scrollTop = currentScroll;
            },
            // 우편번호 찾기 화면 크기가 조정되었을때 실행할 코드를 작성하는 부분. iframe을 넣은 element의 높이값을 조정한다.
            onresize : function(size) {
                element_wrap.style.height = size.height+'px';
            },
            width : '100%',
            height : '100%'
        }).embed(element_wrap);

        // iframe을 넣은 element를 보이게 한다.
        //element_wrap.style.display = 'block';
		$(element_wrap).slideDown();

    }
</script>


</div>
</div>