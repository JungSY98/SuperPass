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
		<div class="text-right">
			
		</div>
		<hr>

		<table class="table" id="sdfTable">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">구분</th>
					<th class="text-center col-sm-3">멤버십 구분명</th>
					<th class="text-center">접수기간</th>
					<th class="text-center">사용기간</th>
					<th class="text-center">신청자 관리</th>
					<th class="text-center">관리</th>
				</tr>
			</thead>
			<tbody>
<?
	foreach($membershipD as $k => $pD) { 
		$applySE = "";
		if (element('applyS', $pD)) $applySE .= date("Y-m-d", strtotime(element('applyS', $pD)));
		if (element('applyE', $pD)) $applySE .= " ~ ".date("Y-m-d", strtotime(element('applyE', $pD)));
		$periodSE = "";
		if (element('usePeriodS', $pD)) $periodSE .= date("Y-m-d", strtotime(element('usePeriodS', $pD)));
		if (element('usePeriodE', $pD)) $periodSE .= " ~ ".date("Y-m-d", strtotime(element('usePeriodE', $pD)));
?>
				<tr>
					<td class="text-center"><?=$pD['no']?></td>
					<td class="text-center"><?=element('cardinal', $pD)?></td>
					<td><?=nl2br(element('title', $pD))?></td>
					<td class="text-center"><?=$applySE?></td>
					<td class="text-center"><?=$periodSE?></td>
					<td class="text-center">
						<a class="btn btn-sm btn-outline-primary p-1" type="button" href="/admin/membership/applyList/lists/<?=$pD['no']?>/">신청자 관리 [<?=count($pD['applyD'])?>]</a>
					</td>
					<td class="text-center">
						<a href="/admin/membership/cardinal/form/<?=$pD['no']?>" class="btn btn-sm btn-primary p-1">수정</a>
					</td>
				</tr>
<? } ?>
			</tbody>
		</table>
	</div>
</div>


<div class="modal fade" id="applyFormModal" tabindex="-1" aria-labelledby="applyFormModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="applyFormModalLabel">신청폼 관리</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="">
					<div class="col-sm-12">
						<ul id="divApplyForm">

						</ul>
					</div>
				</div>
				<div class="row m-0">
					<p class="btn btn-info btn-sm w-100 m-0">입력 추가 양식 설정</p>

					<label class="col-lg-2 col-form-label text-center"><input type="text" name="fieldID" class="form-control" placeholder="고유 ID 값을 입력하여 주세요" onkeydown="return /[a-z0-9]/i.test(event.key)" style="ime-mode:disabled;-webkit-ime-mode:disabled;-moz-ime-mode:disabled;-ms-ime-mode:disabled"></label>
					<label class="col-lg-3 col-form-label text-center"><input type="text" name="fieldName" class="form-control" placeholder="항목 명을 입력하여 주세요"></label>
					<div class="col-lg-4 col-form-label">
						<select name="fieldType" class="form-control">
							<option value="">선택하세요</option>
							<option value="text">한줄 입력 형식(text)</option>
							<option value="url">URL 형식</option>
							<option value="email">이메일 형식(email)</option>
							<option value="tel">전화번호 형식(phone)</option>
							<option value="textarea">여러줄 입력칸(textarea)</option>
							<option value="radio">단일 선택(radio)</option>
							<option value="select">단일 선택(select)</option>
							<option value="checkbox">다중 선택(checkbox)</option>
							<option value="date">일자(연-월-일)</option>
							<option value="file">첨부파일</option>
						</select>

						<div class="divViewAttr" id="divSetViewAttr"><textarea name="attr" rows="6" class="form-control"></textarea>※ 표시될 항목을 줄바꿈으로 구분하여 입력하여 주세요</div>
					</div>
					<div class="col-lg-1 col-form-label text-center pt-5"><input type="checkbox" name="isUse" value="Y" checked></div>
					<div class="col-lg-1 col-form-label text-center pt-5"><input type="checkbox" name="isRequired" value="Y"></div>
					<div class="col-lg-1 col-form-label text-center">&nbsp;</div>
					<button type="button" class="btn btn-success btn-sm w-100 mb-3" onclick="return fnAddApplyForm()">추가하기</button>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">창닫기</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="speakerListModal" tabindex="-1" aria-labelledby="speakerModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="speakerModalLabel">연사 관리</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<div class="row">
					<div class="col-sm-12" id="divSpeakerList">

					</div>
				</div>


				<hr class="clearfix">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">창닫기</button>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="speakerFormModal" tabindex="-1" aria-labelledby="speakerModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="speakerModalLabel">연사 관리</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<div class="row">
					<div class="col-sm-12">
<?=form_open_multipart("/admin/site/programSpeaker/save/", array("method"=>"post", "target"=>"hiddenFrame"), array("pNo"=>'', 'sNo'=>''))?>
						<div class="form-group row mb10">
							<label class="col-sm-2 control-label">온/오프라인</label>
							<div class="col-sm-10">
								<select name="sType2" class="form-control">
									<option value="">선택하세요</option>
									<option value="오프라인">오프라인</option>
									<option value="온라인">온라인</option>
								</select>
							</div>
						</div>
						<div class="form-group row mb10">
							<label class="col-sm-2 control-label">유형</label>
							<div class="col-sm-10">
								<select name="sType" class="form-control" required>
									<option value="">선택하세요</option>
									<option value="연사">연사</option>
									<option value="진행자">진행자</option>
									<option value="멘토">멘토</option>
								</select>
							</div>
						</div>
						<div class="form-group row mb10">
							<label class="col-sm-2 control-label">연사 이미지</label>
							<div class="col-sm-10">
								<input type="file" name="imgSpeaker" class="form-control" placeholder="연사 이미지를 선택하세요" >
								<span  id="tdSpeaker"></span>
							</div>
						</div>
						<div class="form-group row mb10">
							<label class="col-sm-2 control-label">연사 이름</label>
							<div class="col-sm-10">
								<input type="text"  name="speakerName" required class="form-control" placeholder="연사의 성명을 입력하세요">
							</div>
						</div>

						<div class="form-group row mb10">
							<label class="col-sm-2 control-label">연사 회사</label>
							<div class="col-sm-10">
								<textarea name="speakerCompany" required class="form-control" placeholder="연사의 회사명을 입력하세요" rows="3" ></textarea>
							</div>
						</div>
						<div class="form-group row mb10">
							<label class="col-sm-2 control-label">연사 설명 1</label>
							<div class="col-sm-10">
								<textarea name="speakerExp1" required class="form-control" placeholder="설명1 을 입력하세요" rows="3" ></textarea>
							</div>
						</div>
						<div class="form-group row mb10">
							<label class="col-sm-2 control-label">연사 설명 2</label>
							<div class="col-sm-10">
								<textarea name="speakerExp2" class="form-control" placeholder="설명2 을 입력하세요" rows="3"></textarea>
							</div>
						</div>
						<div class="form-group row mb10 hidden">
							<label class="col-sm-2 control-label">태그 입력</label>
							<div class="col-sm-10">
								<textarea name="speakerTag" class="form-control" placeholder="태그를 을 입력하세요" rows="2"></textarea>
							</div>
						</div>
						<div class="form-group row mb10">
							<label class="col-sm-2 control-label">홈페이지</label>
							<div class="col-sm-10">
								<input type="text" name="speakerHomepage" class="form-control" placeholder="홈페이지를 입력하세요" >
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" >저장하기</button>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">창닫기</button>
			</div>
<?=form_close()?>
		</div>
	</div>
</div>







<script>
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


</script>


<iframe src="" name="hiddenFrame" id="hiddenFrame" frameborder="0"></iframe>