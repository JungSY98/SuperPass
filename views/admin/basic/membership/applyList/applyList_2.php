<style>
.divViewAttr { display:none; border:3px dotted #eee;padding:10px;}
.btnAttr { padding:3px 10px; }
ul#divApplyForm {
	padding-left:0px;
}
a.text-danger i {
	color:#F64E60 !important;
}
</style>
<div class="box">
	<div class="box-header">
		<div class="row">
			<div class="col-sm-8">
				<div class="input-group">

					<select name="membershipNo" class="form-control" onchange="location = '/admin/membership/applyList/lists/'+this.value+'/'; ">
<? foreach($mList as $kk => $mD) { ?>
						<option value="<?=$mD['no']?>" <?=$viewNo==$mD['no'] ? "selected" : ""?>><?=$mD['title']?></option>
<? } ?>
					</select>

					<select name="isAllow" class="form-control" onchange="location = '/admin/membership/applyList/lists/<?=$viewNo?>/?viewCate=<?=$viewCate?>&viewType=<?=$viewType?>&viewStatus='+this.value">
						<option value="">상태 _ 전체보기</option>
						<option value="W" <?=$viewStatus=='W'?"selected":""?>>대기</option>
						<option value="Y" <?=$viewStatus=='Y'?"selected":""?>>승인</option>
						<option value="D" <?=$viewStatus=='D'?"selected":""?>>미 승인</option>
					</select>

					<select name="applyType" class="form-control" onchange="location = '/admin/membership/applyList/lists/<?=$viewNo?>/?viewStatus=<?=$viewStatus?>&viewCate=<?=$viewCate?>&viewType='+this.value">
						<option value="">구분 _ 전체보기</option>
<? foreach($applyType as $kkk => $tD) { $tD=trim($tD); ?>
						<option value="<?=$tD?>" <?=$viewType==$tD?"selected":""?>><?=$tD?></option>
<? } ?>
					</select>

					<select name="applyCate" class="form-control" onchange="location = '/admin/membership/applyList/lists/<?=$viewNo?>/?viewStatus=<?=$viewStatus?>&viewType=<?=$viewType?>&viewCate='+this.value">
						<option value="">분류 _ 전체보기</option>
<? foreach($applyCate as $kkkk => $cD) { $cD=trim($cD);  ?>
						<option value="<?=$cD?>" <?=$viewCate==$cD?"selected":""?>><?=$cD?></option>
<? } ?>
					</select>
					<a href="/admin/membership/applyList/dnExcel/<?=$viewNo?>/?viewCate=<?=$viewCate?>&viewType=<?=$viewType?>&viewStatus=<?=$viewStatus?>" class="btn btn-success">엑셀 다운</a>
				</div>
			</div>
			<div class="col-sm-4 text-end">
				<a onclick="fnGetType('Type')" class="btn btn-info mr-2">구분 설정</a>
				<a onclick="fnGetType('Cate')" class="btn btn-info mr-2">분류 설정</a>
				<a href="/admin/membership/cardinal/" class="btn btn-outline-secondary">리스트 가기</a>
			</div>
		</div>

		<hr>

		<div class="table-responsive2">
			<table class="table" id="sdfTable">
				<thead class="sticky-top">
					<tr class="bg-white">
						<th class="text-center">No</th>
						<th class="text-center col-sm-2">구분<br>분류</th>
						<th class="text-center col-sm-3">개인정보</th>
						<th class="text-center col-sm-3">디자인 관여정보</th>
						<th class="text-center">첨부파일</th>
						<th class="text-center">상태</th>
						<th class="text-center">관리</th>
					</tr>
				</thead>
				<tbody>
<?
	foreach($applyD as $k => $pD) { 
		$arrCom = array("디자인전공"=>"aMajor", "프리랜서"=>"aFreelancer", "디자인회사"=>"aDesignCompany", "기타"=>"aEtc");
?>
					<tr>
						<td class="text-center"><?=$pD['no']?></td>
						<td class="text-center">
							<select name="aManageType" class="form-control mb-4" onchange="fnChgType('Type', '<?=$pD['no']?>', this.value)">
								<option value="">구분</option>
<? foreach($applyType as $k2 => $tD) { if (empty(trim($tD))) continue;  ?>
								<option value="<?=trim($tD)?>" <?=trim($tD)==$pD['adminType']?'selected':''?>><?=trim($tD)?></option>
<? } ?>
							</select>
							<select name="aManageType" class="form-control" onchange="fnChgType('Cate', '<?=$pD['no']?>', this.value)">
								<option value="">분류 _</option>
<? foreach($applyCate as $k3 => $cD) { if (empty(trim($cD))) continue; ?>
								<option value="<?=trim($cD)?>" <?=trim($cD)==$pD['adminCate']?'selected':''?>><?=trim($cD)?></option>
<? } ?>
							</select>
						</td>
						<td class="text-center">
							<table class="table">
								<tr>
									<th class="col-sm-4">이름 (아이디)</th>
									<td class="col-sm-8"><?=element('aName', $pD)?> (<?=element('applyID', $pD)?>)</td>
								</tr>
								<tr>
									<th>생년월일</th><td><?=element('aBirth', $pD)?></td>
								</tr>
								<tr>
									<th>연락처</th><td><?=element('aPhone', $pD)?></td>
								</tr>
								<tr>
									<th>이메일</th><td><?=element('aEmail', $pD)?></td>
								</tr>
								<tr>
									<th>등록일시</th><td><?=element('regDate', $pD)?></td>
								</tr>
							</table>
						</td>
						<td class="text-center">
							<table class="table">
								<tr>
									<th class="col-sm-4">신청구분</th>
									<td class="col-sm-8">
<?foreach($arrCom as $k => $v) { ?>

										<?=$k>0 ? "<br>" : ""?><?=element($v, $pD) ? $k. " : ".element($v, $pD)."" : ""?>
<?} ?>
									</td>
								</tr>
								<tr>
									<th>소개</th>
									<td><?=element('adminIntroduce', $pD)?></td>
								</tr>
								<tr>
									<th>자료</th>
									<td><?=element('adminProveData', $pD)?></td>
								</tr>
								<tr>
									<th>소속</th>
									<td><?=element('adminDepartment', $pD)?></td>
								</tr>
							</table>
						</td>
						<td class="text-center">
							<a href="/files/<?=element('aProveFileSource', $pD)?>/membership/down/<?=element('aProveFileName', $pD)?>/" class="btn btn-light btn-sm w-100 mb-4"><?=element('aProveFileName', $pD)?></a>
							<a href="<?=element('aWebsite', $pD)?>" class="btn btn-light btn-sm w-100" target="_blank"><?=element('aWebsite', $pD)?></a>
						</td>
						<td class="text-center col-sm-1">
							<a class="btn btn-sm btn-<?=element('isAllow', $pD)!='Y' ? element('isAllow', $pD)=='W' ?"secondary":"danger":"dark"?> w-100 mb-4"><?=element('isAllow', $pD)!='Y' ? element('isAllow', $pD)=='W' ?"대기":"미승인":"승인"?></a>
							<a onclick="fnEvaluation('<?=$pD['no']?>')" class="btn btn-dark btn-sm w-100">승인관리</a>
						</td>
						<td class="text-center col-sm-1">
							<a href="/admin/membership/applyList/form/<?=$pD['no']?>/" class="btn btn-sm btn-primary w-100 mb-4">수정</a>
							<a href="/admin/membership/applyList/delApply/<?=$pD['no']?>/" class="btn btn-sm btn-danger w-100" onclick="return confirm('한번 삭제하시면 복구할 수 없습니다.\n\n정말 삭제하시겠습니까?')">삭제</a>
						</td>
					</tr>
<? } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>







<div class="modal fade" id="cateSettingModal" tabindex="-1" aria-labelledby="cateModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="cateModalLabel"></h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">※ 줄 바꿈으로 항목을 구분하여 입력하여 주세요</div>
				</div>
				<div class="row">
					<div class="col-12">
						<textarea class="form-control" rows="10" id="dataCategory"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">창닫기</button>
				<button type="button" class="btn btn-dark" onclick="return fnSaveCate()">저장하기</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="evaluationModal" tabindex="-1" aria-labelledby="evaluationModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="evaluationModalLabel"></h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-8" id="divFileView">
					</div>
					<div class="col-sm-4">
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group">
									<span class="input-group-text">구분</span>
									<select name="applyType" id="evalApplyType" class="form-control" onchange="fnChgType('Type', evalNo, this.value)">
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="input-group">
									<span class="input-group-text">분류</span>
									<select name="applyCate" id="evalApplyCate" class="form-control" onchange="fnChgType('Cate', evalNo, this.value)">
									</select>
								</div>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col">
								<h5>소개</h5>
								<textarea class="form-control" rows="4" name="adminIntroduce"></textarea>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col">
								<h5>자료</h5>
								<textarea class="form-control" rows="4" name="adminProveData"></textarea>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col">
								<h5>소속</h5>
								<input name="adminDepartment" class="form-control">
							</div>
						</div>
						<div class="row mt-5">
							<div class="col">
								<h5>메모</h5>
								<textarea class="form-control" rows="4" name="adminMemo"></textarea>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col">
								<h5>승인 상태</h5>
								<select name="isAllow" class="form-control" id="evalAllowStatus">
									<option value="W">대기</option>
									<option value="Y">승인</option>
									<option value="D">미 승인</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">창닫기</button>
				<button type="button" class="btn btn-dark" onclick="return fnSaveEvaluation()">저장하기</button>
			</div>
		</div>
	</div>
</div>

<script>
$(".box").parent().css("max-width", "100%");
$("#menuTitle").html("- <?=$membershipD['title']?>라운지 신청자 내역");

var setType = '';
var evalNo = '';
function fnGetType(type) {
	setType = type;
	var msg = type == 'Type' ? '구분' : '분류';
	$("#cateModalLabel").html(msg+" 항목 설정");
	
	$.ajax({
		url: "/admin/membership/applyList/ajaxGetCate/",
		type: "POST",
		dataType: "html",
		data: {
			'setType' : type,
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		},
		success: function(data){
			data = $.parseJSON(data);
			$("#cateSettingModal").modal('show');
			//$("#dataCategory").val('');
			$("#dataCategory").html(data);
		}
	});
}

function fnSaveCate() {
	$.ajax({
		url: "/admin/membership/applyList/ajaxSetCate/",
		type: "POST",
		dataType: "html",
		data: {
			'setType' : setType,
			'setData' : $("#dataCategory").val(),
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		},
		success: function(data){
			$("#cateSettingModal").modal('hide');
			location.reload();
		}
	});
}


function fnChgType(type, no, value) {
	$.ajax({
		url: "/admin/membership/applyList/ajaxSetApplyCate/",
		type: "POST",
		dataType: "html",
		data: {
			'setType' : type,
			'setNo' : no,
			'setValue' : value,
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		},
		success: function(data){
			alert("변경되었습니다.");
		}
	});
}
function fnEvaluation(no) {
	evalNo = no;
	$.ajax({
		url: "/admin/membership/applyList/ajaxGetApplyData/",
		type: "POST",
		dataType: "html",
		data: {
			'no' : no,
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		},
		success: function(data){
			console.log(data);
			data = $.parseJSON(data);
			var html = '';
			$("#evaluationModalLabel").html("<?=$membershipD['title']?> _ "+data.aName+"님 승인관리");
			$("#evalApplyType").html(data.applyType);
			$("#evalApplyCate").html(data.applyCate);
			$("textarea[name=adminIntroduce]").val(data.adminIntroduce);
			$("textarea[name=adminProveData]").val(data.adminProveData);
			$("input[name=adminDepartment]").val(data.adminDepartment);
			$("textarea[name=adminMemo]").val(data.adminMemo);
			$("select[name=isAllow]").val(data.isAllow);
			if (data.aProveFileSource.indexOf(".pdf") != -1) {
				html = '<iframe id="viewFileFrame" src="/pdf/web/viewer.html?file=/uploads/membership/'+data.aProveFileSource+'" style="width:100%;height:calc(100vh - 220px);margin-top:20px;" frameborder="0"></iframe>';
			} else if (
				data.aProveFileSource.indexOf(".jpg") != -1 || 
				data.aProveFileSource.indexOf(".jpeg") != -1 ||
				data.aProveFileSource.indexOf(".png") != -1 || 
				data.aProveFileSource.indexOf(".webp") != -1 ||
				data.aProveFileSource.indexOf(".JPG") != -1 || 
				data.aProveFileSource.indexOf(".JPEG") != -1
				) {
				html = '<img src="/uploads/membership/'+data.aProveFileSource+'" style="width:100%;">';
			} else {
				html = '<a href="/files/'+data.aProveFileSource+'/membership/down/'+data.aProveFileName+'/" class="btn btn-dark w-100">'+data.aProveFileName+'</a>';
			}
			$("#divFileView").html(html);
			$("#evaluationModal").modal('show');
			$("#divFileView").css("height", "calc(100vh - 200px)");
		}
	});
}


function fnSaveEvaluation() {
	console.log(evalNo);
	var adminIntroduce = $("textarea[name=adminIntroduce]").val();
	var adminProveData = $("textarea[name=adminProveData]").val();
	var adminDepartment = $("input[name=adminDepartment]").val();
	var adminMemo = $("textarea[name=adminMemo]").val();
	var isAllow = $("#evalAllowStatus").val();
	$.ajax({
		url: "/admin/membership/applyList/ajaxSaveEvaluation/",
		type: "POST",
		dataType: "html",
		data: {
			'adminIntroduce' : adminIntroduce,
			'adminProveData' : adminProveData,
			'adminDepartment' : adminDepartment,
			'adminMemo' : adminMemo,
			'isAllow' : isAllow,
			'evalNo' : evalNo,
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		},
		success: function(data){
			alert("저장되었습니다.");
			location.reload();
		}
	});
}


$("input[name=fieldID]").keydown(function(event){ 
	if (!(event.keyCode >=37 && event.keyCode<=40)) { 
		var inputVal = $(this).val(); 
		var check = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/; 
		if(check.test(inputVal)){ 
			$(this).val(""); 
		} 
	} 
});
$("input[name=fieldID]").keyup(function(event){ 
	if (!(event.keyCode >=37 && event.keyCode<=40)) { 
		var inputVal = $(this).val(); 
		var check = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/; 
		if(check.test(inputVal)){ 
			$(this).val(""); 
		} 
	} 
});

$("select[name=fieldType]").on("change",function() {
	if ($(this).val()=='radio' || $(this).val()=='checkbox' || $(this).val()=='select') {
		$("#divSetViewAttr").slideDown();
	} else {
		$("#divSetViewAttr").slideUp();
	}
	//console.log()
});


function fnDelAttr (no) {
	if (confirm("정말 삭제하시겠습니까?")) {
		$.ajax({
			method: "POST",
			url: "/admin/site/program/ajaxDeleteApplyFormElement/",
			dataType: "html",
			data: { 
				'no' : no,
				'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
			}
		})
		.done(function(returnD) {
			$("#divFieldSet"+no).remove();
		});
	}
}

function fnAddApplyForm() {
	var id=$("input[name=fieldID]").val();
	var name=$("input[name=fieldName]").val();
	var type=$("select[name=fieldType]").val();

	if (id == '') {
		alert("추가할 항목의 고유 ID 값을 입력하여 주세요");
		$("input[name=fieldID]").focus();
		return false;
	}
	if (name == '') {
		alert("추가할 항목 이름을 입력하여 주세요");
		$("input[name=fieldName]").focus();
		return false;
	}
	if (type == '') {
		alert("추가할 항목의 형식을 선택하여 주세요");
		$("select[name=fieldType]").focus();
		return false;
	}
	if (type=='radio' || type=='checkbox' || type=='select') {
		if ($("textarea[name=attr]").val()=="") {
			alert("선택할 항목의 값을 줄 바꿈으로 구분하여 입력하여 주세요");
			$("textarea[name=attr]").focus();
			return false;
		}
	}
	if ($("input[name=isRequired]").is(":checked")==true && $("input[name=isUse]").is(":checked") == false) {
		alert("사용하지 않는 항목이 필수항목일 수 없습니다.");
		return false;
	}
	$.ajax({
		method: "POST",
		url: "/admin/site/program/ajaxGetApplyFormHTML/",
		dataType: "html",
		data: { 
			'pNo' : $("input[name=pNo]").val(),
			'id' : $("input[name=fieldID]").val(),
			'name' : $("input[name=fieldName]").val(),
			'type' : $("select[name=fieldType]").val(),
			'attr' : $("textarea[name=attr]").val(),
			'use' : $("input[name=isUse]").is(":checked"),
			'required' : $("input[name=isRequired]").is(":checked"),
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		}
	})
	.done(function(returnD) {
		$("input[name=fieldID]").val('');
		$("input[name=fieldName]").val('');
		$("select[name=fieldType]").val('');
		$("textarea[name=attr]").val('');
		$("input[name=isUse]").prop("checked", true);
		$("input[name=isRequired]").prop("checked", false)
		$("#divSetViewAttr").slideUp();
		var obj = $.parseJSON(returnD, true);
		if (obj['msg']=='OK') {
			$("#divApplyForm").append(obj['html']);
			$("#divApplyForm").sortable({revert: true, stop: function( event, ui ) { var data = $(this).sortable('serialize'); console.log(data); }});
		} else {
			alert(obj['msg']);
		}
	});

	
}
function fnViewAttr(no) {
	$("#divViewAttr"+no).slideToggle();
}
function fnManageApplyForm(no) {
	$.ajax({
		method: "POST",
		url: "/admin/site/program/ajaxProgramApplyForm/",
		dataType: "html",
		data: { 
			'pNo' : no,
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		}
	})
	.done(function(returnD) {
		var obj = $.parseJSON(returnD, true);
		if (obj['msg']=='OK') {
			$("#divApplyForm").html(obj['html']);
			$("#divApplyForm").sortable({revert: true, stop: function( event, ui ) { var data = $(this).sortable('serialize'); console.log(data); }});
			$("input[name=pNo]").val(no);
			$("#applyFormModal").modal('show');
		} else {
			alert(obj['msg']);
		}
	});

}

function fnManageSpeaker(no) {
	$.ajax({
		method: "POST",
		url: "/admin/site/programSpeaker/",
		dataType: "html",
		data: { 
			'pNo' : no,
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		}
	})
	.done(function(returnD) {
		var obj = $.parseJSON(returnD, true);
		$("#divSpeakerList").html(obj['listHTML']);
		$("input[name=pNo]").val(no);
		$("#speakerListModal").modal('show');
	});

}
function fnManageSpeakerAdd() {
		$("select[name=sType]").val('').prop("selected", true);
		$("#tdSpeaker").html('');
		$("input[name=sNo]").val('');
		$("input[name=speakerName]").val('');
		$("textarea[name=speakerCompany]").val('');
		$("input[name=speakerHomepage]").val('');
		$("textarea[name=speakerExp1]").val('');
		$("textarea[name=speakerExp2]").val('');
		$("textarea[name=speakerTag]").val('');
	$("#speakerFormModal").modal('show');
}

function fnManageSpeakerForm(no) {
	$.ajax({
		method: "POST",
		url: "/admin/site/programSpeaker/ajaxGetSpeaker/",
		dataType: "html",
		data: { 
			'sNo' : no,
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		}
	})
	.done(function(returnD) {
		var obj = $.parseJSON(returnD, true);
		$("select[name=sType]").val(obj['data']['sType']).prop("selected", true);
		if (obj['data']['imgSpeakerSource']!="") {
			$("#tdSpeaker").html('<input type="hidden" name="imgSpeakerSource" value="'+obj['data']['imgSpeakerSource']+'"><input type="hidden" name="imgSpeakerName"  value="'+obj['data']['imgSpeakerName']+'"><label><input type="checkbox" name="del_IMG" value="'+obj['data']['imgSpeakerSource']+'">삭제</label>');
		}
		$("input[name=sNo]").val(obj['data']['no']);
		$("input[name=speakerName]").val(obj['data']['speakerName']);
		$("textarea[name=speakerCompany]").val(obj['data']['speakerCompany']);
		$("input[name=speakerHomepage]").val(obj['data']['speakerHomepage']);
		$("textarea[name=speakerExp1]").val(obj['data']['speakerExp1']);
		$("textarea[name=speakerExp2]").val(obj['data']['speakerExp2']);
		$("textarea[name=speakerTag]").val(obj['data']['speakerTag']);
	});
	$("#speakerFormModal").modal('show');
}
function fnDeleteSpeaker(no) {
	if (confirm("정말 삭제하시겠습니까?")) {
		$.ajax({
			method: "POST",
			url: "/admin/site/programSpeaker/ajaxDelSpeaker/",
			dataType: "html",
			data: { 
				'sNo' : no,
				'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
			}
		})
		.done(function(returnD) {
			$("#trSpeaker"+no).remove();
			alert("삭제되었습니다.");
		});
	}
}
$("#evaluationModal").on('hidden.bs.modal', function () {
	location.reload();
});
</script>