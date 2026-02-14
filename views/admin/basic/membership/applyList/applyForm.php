<div class="box p-3">

<div class="divMembershipWrap">
	<button type="button" class="btn btn-success w-100" onclick="return fnSave('applySign')">저장하기</button>
	<h2 class="h2MembershipGuide">멤버십라운지 신청서</h2>
	<hr class="mt-0">
<?=form_open_multipart("/admin/membership/applyList/saveApply/", array("METHOD"=>"POST", "id"=>"membershipForm"), array("ip"=>$_SERVER['REMOTE_ADDR'], "mKeyNo"=>$applyD['membershipNo'], "applyNo"=>$applyD['no']))?>
	<div class="row mb-3 align-middle">
		<div class="col-sm-2 pt-2 formTitle">이름</div>
		<div class="col-sm-4 form-floating">
			<input type="text" name="aName" class="form-control" id="aName" placeholder="이름을 입력하세요" value="<?=element('aName', $applyD)?>" required>
			<label for="aName">이름을 입력하세요</label>
		</div>
		<div class="col-sm-2 pt-2 formTitle">멤버십 아이디</div>
		<div class="col-sm-4 form-floating">
			<input type="text" name="applyID" class="form-control" id="applyID" placeholder="멤버십 아이디를 입력하세요" value="<?=element('applyID', $applyD)?>" required readonly>
			<label for="applyID">멤버십 아이디를 입력하세요</label>
		</div>
	</div>


	<div class="row mb-3 align-middle">
		<div class="col-sm-2 pt-2 formTitle">생년월일</div>
		<div class="col-sm-4 form-floating">
			<input type="date" name="aBirth" class="form-control datepicker" id="aBirth" placeholder="생년월일을 입력하세요" value="<?=element('aBirth', $applyD)?>" required>
			<label for="aBirth">생년월일을 입력하세요</label>
		</div>
		<div class="col-sm-2 pt-2 formTitle">연락처</div>
		<div class="col-sm-4 form-floating">
			<input type="tel" name="aPhone" class="form-control" id="aPhone" placeholder="연락처를 입력하세요" value="<?=element('aPhone', $applyD)?>" required readonly>
			<label for="aPhone">연락처를 입력하세요</label>
		</div>
	</div>

	<div class="row mb-3 align-middle">
		<div class="col-sm-2 pt-2 formTitle">이메일</div>
		<div class="col-sm-10 form-floating">
			<input type="email" name="aEmail" class="form-control" id="aEmail" placeholder="이메일을 입력하세요" value="<?=element('aEmail', $applyD)?>" required>
			<label for="aEmail">이메일을 입력하세요</label>
		</div>
	</div>

	<div class="row mb-3 align-middle">
		<div class="col-sm-2 pt-2 formTitle">홈페이지</div>
		<div class="col-sm-10 form-floating">
			<input type="text" name="aWebsite" class="form-control" id="aWebsite" placeholder="홈페이지를 입력하세요" value="<?=element('aWebsite', $applyD)?>" required>
			<label for="aEmail">홈페이지를 입력하세요</label>
		</div>
	</div>

	<div class="row pt-3">
		<div class="col-sm-2 pt-2 formTitle"><h4>구분</h4></div>
		<div class="col-sm-10 pt-2 text-danger">※ 해당되는 항목을 입력하여 주세요</div>
	</div>


	<div class="row mb-3 align-middle">
		<div class="col-sm-2 pt-2 formTitle">구분 </div>
		<div class="col-sm-4 ps-0 form-floating">
			<select name="aType" class="form-control" required>
				<option value="">구분을 선택하세요</option>
				<option value="major"  <?=element("aType", $applyD)=="major"?"selected":""?>>디자인 전공</option>
				<option value="freelancer" <?=element("aType", $applyD)=="freelancer"?"selected":""?>>프리랜서</option>
				<option value="designcompany" <?=element("aType", $applyD)=="designcompany"?"selected":""?>>디자인 회사</option>
				<option value="onemancompany" <?=element("aType", $applyD)=="onemancompany"?"selected":""?>>1인기업(예비)</option>
				<option value="etc" <?=element("aType", $applyD)=="etc"?"selected":""?>>기타</option>
			</select>
			<label for="aFreelancer">구분을 선택하세요</label>
		</div>
		<div class="col-sm-2 pt-2 formTitle">구분 설명</div>
		<div class="col-sm-4 form-floating">
			<input type="text" name="aTypeExp" class="form-control" id="aTypeExp" placeholder="구분 설명을 입력하세요" value="<?=element("aTypeExp", $applyD)?>">
			<label for="aFreelancer">구분 설명을 입력하세요</label>
		</div>
	</div>


	<div class="row mb-3 align-middle">
		<div class="col-sm-2 pt-2 formTitle">증빙자료</div>
		<div class="col-sm-10 formData">
			<input type="file" name="aProveFile" class="form-control p-3" id="aProveFile" >
<? if (element("aProveFileSource", $applyD)) { ?>
			<a href="/files/<?=element('aProveFileSource', $applyD)?>/membership/down/<?=element('aProveFileName', $applyD)?>/" class="btn btn-dark btn-sm w-100"><?=element('aProveFileName', $applyD)?></a>
			<input type="hidden" name="aProveFileName" value="<?=element("aProveFileName", $applyD)?>">
			<input type="hidden" name="aProveFileSource" value="<?=element("aProveFileSource", $applyD)?>">
<? } ?>
		</div>
	</div>

	<div class="row mb-3 align-middle">
		<div class="col-sm-2 pt-2 formTitle">증빙자료 설명</div>
		<div class="col-sm-10 formData">
			<textarea name="aProveExp" class="form-control" id="aProveExp" rows="7" placeholder="증빙자료 설명을 입력하세요" required><?=element("aProveExp", $applyD)?></textarea>
		</div>
	</div>

	<div class="row mb-3 align-middle">
		<div class="col-sm-2 pt-2 formTitle">신청 사유</div>
		<div class="col-sm-10 formData">
			<textarea name="aReason" class="form-control" id="aReason" rows="7" placeholder="신청 사유를 입력하세요" required><?=element("aReason", $applyD)?></textarea>
		</div>
	</div>

	<div class="row mb-3 align-middle">
		<div class="col-sm-2 pt-2 formTitle">락커 이용신청</div>
		<div class="col-sm-10 formData">
			<label>
				<input type="checkbox" name="isUseLocker" value="Y" <?=element("isUseLocker", $applyD)=="Y"?"checked":""?>>
				락커 이용신청
			</label>
			<p>※ 신청서 제출 시 11개 선착순으로 배정되며, 승인 후 멤버십 라운지 방문 시 배정 여부를 안내합니다.</p>
		</div>
	</div>

	<div class="row mb-3 align-middle">
		<div class="col-sm-2 pt-2 formTitle"></div>
		<div class="col-sm-10">
			<p class="text-danger ">※ 위의 항목은 필수 작성 항목입니다. 미 작성 시 신청이 취소될 수 있습니다. (해당없을 시 ‘해당사항 없음’으료 작성 요망)</p>
		</div>
	</div>

	<h4 class="text-center">상기 본인은 위와 같이 멤버십 라운지 이용을 신청하고,<br>아래 사항과 서울디자인창업센터 운영규칙에 따라 이용 할 것을 서약합니다</h4>


	<h4 class="text-center p-5"><?=date("Y년 m월 d일", strtotime(element("regDate", $applyD)))?></h4>

	<div class="col-sm-8 offset-sm-4">

		<div class="row">
			<div class="col">

				<div class="input-group">
					<span class="input-group-text">신청자</span>
					<input type="text" name="aName2" class="form-control" id="aName2" placeholder="이름을 입력하세요" value="<?=element('aName', $applyD)?>" required>
				</div>


				<div id="applySign" class="w-100" style="height:200px;border:1px solid #eee; border-radius:10px;"></div>
				<textarea name="applySignData1" id="applySignData1" class="d-none"><?=element('applySignData1', $applyD)?></textarea>
				<textarea name="applySignData2" id="applySignData2" class="d-none"><?=element('applySignData2', $applyD)?></textarea>
			</div>
		</div>
	</div>
<button type="button" class="btn btn-success w-100" onclick="return fnSave('applySign')">저장하기</button>
<?=form_close()?>

<!--[if IE]>
<script type="text/javascript" src="/assets/signature/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="/assets/signature/jquery.ui.touch-punch.min.js"></script>
<script src="/assets/signature/jquery.signature.js"></script>



<script>
function fnSignSave(type) {
	if ($("#"+type).signature('toSVG').length<700) {
		alert("서명이 작습니다. 다시 서명하여 주세요");
		return false;
	}
	$("#"+type+"Data1").val($("#"+type).signature('toSVG'));
	$("#"+type+"Data2").val($("#"+type).signature('toJSON'));
}
function fnSignClear(type) {
	$("#"+type).signature('clear'); 
	$("#"+type+"Data1").val('');
	$("#"+type+"Data2").val('');
}
function fnSave(type) {

	if ($("#aName").val()=="") {
		alert("이름을 입력하여 주세요");
		$("#aName").focus();
		return false;
	}
	if ($("#applyID").val()=="") {
		alert("멤버십 아이디를 입력하여 주세요");
		$("#applyID").focus();
		return false;
	}
	if ($("#aBirth").val()=="") {
		alert("생년월일을 선택하여 주세요");
		$("#aBirth").focus();
		return false;
	}
	if ($("#aPhone").val()=="") {
		alert("연락처를 입력하여 주세요");
		$("#aPhone").focus();
		return false;
	}
	if ($("#aEmail").val()=="") {
		alert("이메일을 입력하여 주세요");
		$("#aEmail").focus();
		return false;
	}
/*
	if ($("#aWebsite").val()=="") {
		alert("홈페이지를 입력하여 주세요");
		$("#aWebsite").focus();
		return false;
	}

	if ($("#aMajor").val()=="" && $("#aFreelancer").val()=="" && $("#aDesignCompany").val()=="" && $("#aEtc").val()=="") {
		alert("디자인전공 / 프리랜서 / 디자인회사 / 기타 중 하나를 입력하여 주세요");
		$("#aMajor").focus();
		return false;
	}
*/
	if ($("select[name=aType]").val()=="") {
		alert("구분을 선택 하여 주세요");
		$("select[name=aType]").focus();
		return false;
	}
	if ($("#aTypeExp").val()=="") {
		alert("구분에 대한 설명을 입력하여 주세요");
		$("#aTypeExp").focus();
		return false;
	}

	if ($("#aProveFile").val()=="" && $("input[name=aProveFileSource]").val()=="") {
		alert("증빙자료를 업로드 하여 주세요");
		$("#aProveFile").focus();
		return false;
	}
	if ($("#aProveExp").val()=="") {
		alert("증빙자료 설명을 입력하여 주세요");
		$("#aProveExp").focus();
		return false;
	}
	if ($("#aReason").val()=="") {
		alert("신청사유를 입력하여 주세요");
		$("#aReason").focus();
		return false;
	}
	if (fnSignSave(type)==false) {
		return false;
	}
	$("#membershipForm").submit();
}
$('#applySign').signature(); 
$('#applySign').signature('draw', $('#applySignData2').val()); 
</script>

</div>


</div>