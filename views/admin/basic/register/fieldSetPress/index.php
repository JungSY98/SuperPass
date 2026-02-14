<div class="row">
	<div class="col-sm-12">

		<p class="btn btn-info btn-sm w-100 m-0">입력 양식 설정</p>
		<ul id="divApplyForm">

		</ul>


		<div class="row">
			<input name="pNo" type="hidden" value="1">
			<label class="col-lg-2 col-form-label text-center">
				<input type="text" name="fieldID" class="form-control" placeholder="고유 ID 값을 입력하여 주세요" onkeydown="return /[a-z0-9]/i.test(event.key)" style="ime-mode:disabled;-webkit-ime-mode:disabled;-moz-ime-mode:disabled;-ms-ime-mode:disabled">
			</label>
			<label class="col-lg-3 col-form-label text-center">
				<input type="text" name="fieldName" class="form-control" placeholder="항목 명(국문)을 입력하여 주세요">
				<input type="text" name="fieldNameEn" class="form-control" placeholder="항목 명(영문)을 입력하여 주세요">
			</label>
			<div class="col-lg-4 col-form-label">
				<select name="fieldType" class="form-control">
					<option value="">선택하세요</option>
					<option value="text">한줄 입력 형식(text)</option>
					<option value="url">URL 형식</option>
					<option value="email">이메일 형식(email)</option>
					<option value="tel">전화번호 형식(phone)</option>
					<option value="password">비밀번호 형식(password)</option>
					<option value="textarea">여러줄 입력칸(textarea)</option>
					<option value="radio">단일 선택(radio)</option>
					<option value="select">단일 선택(select)</option>
					<option value="checkbox">다중 선택(checkbox)</option>
					<option value="date">일자(연-월-일)</option>
					<option value="file">첨부파일</option>
				</select>

				<div class="divViewAttr" id="divSetViewAttr">
					<div class="input-group">
						<span class="input-group-text">국문</span>
						<textarea name="attr" rows="6" class="form-control"></textarea>
						<span class="input-group-text">영문</span>
						<textarea name="attrEn" rows="6" class="form-control"></textarea>
					</div>
					※ 표시될 항목을 줄바꿈으로 구분하여 입력하여 주세요</div>
			</div>
			<div class="col-lg-1 col-form-label text-center"><label>사용<br><input type="checkbox" name="isUse" value="Y" checked></label></div>
			<div class="col-lg-1 col-form-label text-center"><label>필수<br><input type="checkbox" name="isRequired" value="Y"></label></div>
			<div class="col-lg-1 col-form-label text-center">
				<label>타이틀<br><input type="checkbox" name="isTitle" value="Y"></label>
				<label>구분자<br><input type="checkbox" name="isSeper" value="Y"></label>
			</div>
		</div>
		<button type="button" class="btn btn-success btn-sm w-100 mb-3" onclick="return fnAddApplyForm()">추가하기</button>
	</div>
</div>

<script>
$("select[name=fieldType]").on("change",function() {
	if ($(this).val()=='radio' || $(this).val()=='checkbox' || $(this).val()=='select') {
		$("#divSetViewAttr").slideDown();
	} else {
		$("#divSetViewAttr").slideUp();
	}
	//console.log()
});

function fnDelAttr(no) {
	if (confirm("정말 삭제하시겠습니까?")) {
		$.ajax({
			method: "POST",
			url: "/admin/register/fieldSetPress/ajaxDeleteApplyFormElement/",
			dataType: "html",
			data: { 
				'no' : no,
				'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
			}
		})
		.done(function(returnD) {
			$("#divFieldSet"+no).remove();
			fnDisplayApplyForm();
			fnSetSortable();
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
	if (name == '' && $("input[name=isSeper]").is(":checked") == false ) {
		alert("추가할 항목 명(국문)을 입력하여 주세요");
		$("input[name=fieldName]").focus();
		return false;
	}
	if (name == '' && $("input[name=isSeper]").is(":checked") == false ) {
		alert("추가할 항목 명(영문)을 입력하여 주세요");
		$("input[name=fieldNameEn]").focus();
		return false;
	}
	console.log ($("input[name=isTitle]").is(":checked"));
	if (type == '' && $("input[name=isTitle]").is(":checked") == false && $("input[name=isSeper]").is(":checked") == false ) {
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
		url: "/admin/register/fieldSetPress/ajaxGetApplyFormHTML/",
		dataType: "html",
		data: { 
			'type' : 'buyer',
			'pNo' : $("input[name=pNo]").val(),
			'id' : $("input[name=fieldID]").val(),
			'name' : $("input[name=fieldName]").val(),
			'nameEn' : $("input[name=fieldNameEn]").val(),
			'type' : $("select[name=fieldType]").val(),
			'attr' : $("textarea[name=attr]").val(),
			'attrEn' : $("textarea[name=attrEn]").val(),
			'use' : $("input[name=isUse]").is(":checked"),
			'required' : $("input[name=isRequired]").is(":checked"),
			'title' : $("input[name=isTitle]").is(":checked"),
			'seper' : $("input[name=isSeper]").is(":checked"),
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		}
	})
	.done(function(returnD) {
		$("input[name=fieldID]").val('');
		$("input[name=fieldName]").val('');
		$("input[name=fieldNameEn]").val('');
		$("select[name=fieldType]").val('');
		$("textarea[name=attr]").val('');
		$("input[name=isUse]").prop("checked", true);
		$("input[name=isRequired]").prop("checked", false)
		$("#divSetViewAttr").slideUp();
		var obj = $.parseJSON(returnD, true);
		if (obj['msg']=='OK') {
			$("#divApplyForm").append(obj['html']);
			$("#divApplyForm").sortable({cancel: ".unsortable", revert: true, stop: function( event, ui ) { 
				$("#divApplyForm").find("li").each(function() {
				var fieldOrder = new Array();
				$("#divApplyForm").find("li").each(function() {
					fieldOrder.push($(this).attr("id"));
				});
				fnSetOrder(fieldOrder);
				});
			}});
			fnDisplayApplyForm();
			fnSetSortable();
		} else {
			alert(obj['msg']);
		}
	});

	
}
function fnViewAttr(no) {
	$("#divViewAttr"+no).slideToggle();
}

function fnSetRequiredAct() {
	$(".btnRequired").on("click", function() {
		var isYN = $(this).is(":checked");
		isYN = isYN == true ? "Y" : "N";
		$.ajax({
			url: "/admin/register/fieldSetPress/ajaxSetRequiredStatus/",
			type: "POST",
			dataType: "html",
			data: {
				'fNo' : $(this).attr("data-fno"),
				'isRequired' : isYN,
				'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
			},
			success: function(data){
				//alert('변경되었습니다.');
			}
		});
	});
}


function fnSetUseAct() {
	$(".btnUse").on("click", function() {
		var isYN = $(this).is(":checked");
		isYN = isYN == true ? "Y" : "N";
		$.ajax({
			url: "/admin/register/fieldSetPress/ajaxSetUseStatus/",
			type: "POST",
			dataType: "html",
			data: {
				'fNo' : $(this).attr("data-fno"),
				'isUse' : isYN,
				'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
			},
			success: function(data){
				//alert('변경되었습니다.');
			}
		});
	});
}

function fnSetOrder(order) {
	$.ajax({
		method: "POST",
		url: "/admin/register/fieldSetPress/ajaxSetApplyFormOrder/",
		dataType: "html",
		data: { 
			'programNo' : 2,
			'pType' : 'press',
			'order' : order,
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		}
	})
	.done(function(returnD) {
		alert("순서 저장되었습니다.");
	});
}
function fnDisplayApplyForm() {
	$.ajax({
		method: "POST",
		url: "/registration/ajaxGetApplyForm/",
		dataType: "html",
		data: { 
			'pType' : 'press',
			'pNo' : 2,
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		}
	})
	.done(function(returnD) {
		var obj = $.parseJSON(returnD, true);
		if (obj['msg']=='OK') {
			//$("#divDisplayApplyForm").html(obj['html']);
		}
	});
}
function fnSetSortable() {
	$("#divApplyForm").sortable({cancel: ".unsortable", revert: true, stop: function( event, ui ) { 
		var fieldOrder = new Array();
		$("#divApplyForm").find("li").each(function() {
			fieldOrder.push($(this).attr("id"));
		});
		fnSetOrder(fieldOrder);
	}});
}

function fnManageApplyForm(no, type) {
	programNo = no;
	$.ajax({
		method: "POST",
		url: "/admin/register/fieldSetPress/ajaxApplyForm/",
		dataType: "html",
		data: { 
			'pType' : type,
			'pNo' : no,
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		}
	})
	.done(function(returnD) {
		var obj = $.parseJSON(returnD, true);
		if (obj['msg']=='OK') {
			$("#divApplyForm").html(obj['html']);

			//fnDisplayApplyForm();
			fnSetSortable();

			$("input[name=pNo]").val(no);

		} else {
			alert(obj['msg']);
		}
		fnSetRequiredAct();
		fnSetUseAct();
	});

}
fnManageApplyForm(2, 'press');
</script>