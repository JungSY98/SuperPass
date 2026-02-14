<link rel="stylesheet" href="/assets/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css" type="text/css" media="screen" />
<!-- production -->
<script type="text/javascript" src="/assets/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="/assets/plupload/i18n/ko.js" charset="UTF-8"></script>
<script type="text/javascript" src="/assets/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
<script src="/assets/js/masonry.pkgd.min.js"></script>


<div class="card">
	<div class="card-header">
		<h4>제품 <?=$pNo ? "수정": "등록"?></h4>
	</div>
	<div class="card-body">
<?=form_open_multipart("/admin/product/productList/save", array("onsubmit"=>"return fnChkForm()"), array("pNo"=>$pNo))?>
		<table class="table" id="hanbokTable">

			<tr>
				<th>표시여부</th>
				<td><input type="checkbox" name="isUse"  value="Y" <?=(element("isUse", $productD) == 'Y' || empty($pNo)) ? 'checked' : ''?>> 표시</td>
			</tr>
			<tr>
				<th>선정 연도</th>
				<td>
					<select name="year" class="form-control">
						<option value="">연도를 선택하세요</option>
<? for($y=2024;$y>=2023;$y--) { ?>
						<option value="<?=$y?>" <?=$y==element("year", $productD)?"selected":""?>><?=$y?></option>
<? } ?>
					</select>
			<tr>
				<th>기업명</th>
				<td>
					<select name="brandNo" class="form-control">
						<option value="">기업을 선택하세요</option>
<? foreach($brandD as $k => $bD) { ?>
						<option value="<?=$bD['no']?>" <?=$bD['no']==element("brandNo", $productD)?"selected":""?>><?=$bD['name']?></option>
<? } ?>
					</select>
				</td>
			</tr>

			<tr>
				<th>제품 이미지</th>
				<td>
<? if ($pNo) { ?>
					<button class="btn btn-secondary w-100" type="button" id="btnProduct" onclick="fnUploadProduct()">이미지 업로드</button>
					<ul class="ulImageExplain row mt-4" id="ulPageImageExplain">
					</ul>
					<div class="mt-2">
					</div>
<? } else { ?>
				<button class="btn btn-danger w-100" type="button" >제품등록 후 수정 시 등록 가능합니다.</button>
<? } ?>
				</td>
			</tr>

			<tr>
				<th>제품명 (국문)</th>
				<td><input type="text" name="pNameKR" class="form-control" placeholder="제품명 국문 을 입력하세요" required value="<?=element("pNameKR", $productD)?>"></td>
			</tr>
			<tr>
				<th>제품명 (영문)</th>
				<td><input type="text" name="pNameEN" class="form-control" placeholder="제품명 국문 을 입력하세요"  value="<?=element("pNameEN", $productD)?>"></td>
			</tr>

			<tr>
				<th class="col-sm-2">제품소개 (국문)</th>
				<td><textarea name="pDescKR" class="form-control" placeholder="제품소개 (국문)를 입력하여 주세요" rows=7><?=element("pDescKR", $productD)?></textarea></td>
			</tr>

			<tr>
				<th class="col-sm-2">제품소개 (영문)</th>
				<td><textarea name="pDescEN" class="form-control" placeholder="제품소개 (국문)를 입력하여 주세요" rows=7 ><?=element("pDescEN", $productD)?></textarea></td>
			</tr>

			<tr id="attachTR">
				<td>
					<div class="row">
						<div class="col-6" style="padding:0px;">
							<button type="button" class="btn btn-siteprimary w-100" onclick="fnAddTR()">항목 추가</button>
						</div>
						<div class="col-6" style="padding:0px;">
							<button type="button" class="btn btn-danger w-100" onclick="fnRemoveTR()">항목 삭제</button>
						</div>
					</div>
				</td>
				<td></td>
			</tr>
<?
	if (is_array(element('pAddFieldKR', $productD)))
		foreach($productD['pAddFieldKR'] as $k4 => $fD)  {
			$krField = $fD;
			$enField = element($k4, element('pAddFieldEN', $productD));
?>
			<tr class="addTR">
				<td>
					<div class="input-group">
						<span class="input-group-text">항목명(KR)</span>
						<input type="text" name="fieldNameKR[]" class="form-control addField" placeholder="국문 항목명 을 입력하세요" required value="<?=element(0, $krField)?>">
					</div>
					<div class="input-group mt-5">
						<span class="input-group-text">항목명(EN)</span>
						<input type="text" name="fieldNameEN[]" class="form-control addField" placeholder="영문 항목명 을 입력하세요"  value="<?=element(0, $enField)?>">
					</div>
				</td>
				<td>
					<div class="input-group">
						<span class="input-group-text">항목내용(국문)</span>
						<textarea name="fieldValueKR[]" class="form-control addField" placeholder="항목내용(국문)을 입력하여 주세요" required rows="3"><?=element(1, $krField)?></textarea>
					</div>
					<div class="input-group">
						<span class="input-group-text">항목내용(영문)</span>
						<textarea name="fieldValueEN[]" class="form-control addField" placeholder="항목내용(영문)을 입력하여 주세요"  rows="3"><?=element(1, $enField)?></textarea>
					</div>
				</td>
			</tr>
<? } ?>
			<tr>
				<td></td>
				<td>
					<div class="row">
						<div class="col-6">
							<button type="submit" class="btn btn-success w-100">저장하기</button>
						</div>
						<div class="col-6">
							<button type="button" class="btn btn-secondary w-100" onclick="location = '/admin/product/productList/'; ">목록으로</button>
						</div>
					</div>
				</td>
			</tr>

		</table>
<?=form_close()?>

	</div>
</div>


<!-- 제품 이미지 업로드 -->
<div class="modal fade" id="uploadIMGModal" tabindex="-1" aria-labelledby="uploadIMGModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="uploadIMGModalLabel"><span>기존 제품등 이미지 자료 업로드</span></h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="imgContent p-0" id="imgContent">

				</div>
				<div class="mt-2">
				<ul class="ulImageExplain row mt-4" id="ulImageExplain">
				</ul>
				</div>
			</div>


			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" onclick="return fnChkUploaded()">창닫기</button>
				<button type="button" class="btn btn-danger" onclick="return fnUploadSave()">저장</button>
			</div>
		</div>
	</div>
</div>



<script>
/* 전역 변수 선언 */
var isAllUploaded = false;
var isFileAdd = false;
var signType = '';
var currentStep = 'step3';
var $masonry = $('#ulPageImageExplain').masonry({
	// options
	itemSelector: '.grid-item',
	columnWidth: '.grid-item',
	percentPosition: true
});
$(document).ready(function() {
	fnGetImgExplain();
});

var addHTML = '<tr class="addTR">';
addHTML += '<td>';
addHTML += '<div class="input-group"><span class="input-group-text">항목명(KR)</span><input type="text" name="fieldNameKR[]" class="form-control addField" placeholder="국문 항목명 을 입력하세요" required></div>';
addHTML += '<div class="input-group mt-5"><span class="input-group-text">항목명(EN)</span><input type="text" name="fieldNameEN[]" class="form-control addField" placeholder="영문 항목명 을 입력하세요"></div>';
addHTML += '</td>';
addHTML += '<td><div class="input-group"><span class="input-group-text">항목내용(국문)</span><textarea name="fieldValueKR[]" class="form-control addField" placeholder="항목내용(국문)을 입력하여 주세요" required rows="3"></textarea></div><div class="input-group"><span class="input-group-text">항목내용(영문)</span><textarea name="fieldValueEN[]" class="form-control addField" placeholder="항목내용(영문)을 입력하여 주세요" rows="3"></textarea></div></td>';
addHTML += '</tr>';

function fnAddTR() {
	if ($(".addTR").length==0) {
		$("#attachTR").after(addHTML);
	} else {
		$(".addTR").last().after(addHTML);
	}
}
function fnRemoveTR() {
	if (confirm("마지막 칸이 삭제됩니다. \n\n정말 삭제하시겠습니까?\n\n삭제하시면 입력한 자료는 복구되지 않습니다.")) {
		$(".addTR").last().remove();
	}

}
function fnUploadProduct() {
	fnCallUpload('imgContent', 'ulImageExplain');
	$("#uploadIMGModal").modal("show");
}

function fnGetImgExplain() {
	$.ajax({
		url: "/admin/product/productList/ajaxGetUploadPhoto/",
		type: "POST",
		dataType: "html",
		data: {
			'type': 'productExplain',
			'productNo': '<?=$pNo?>',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			console.log(data);
			$('#ulPageImageExplain').html('');
			fnCallMasonry('ulPageImageExplain', data);
			//$("#ulImageExplain").html(data);
		}
	});
}

function fnCallMasonry(id, data) {
	var $content = $(data);
	var $masonry = $('#'+id).append( $content ).masonry( 'appended', $content ).masonry({
		// options
		itemSelector: '.grid-item',
		columnWidth: '.grid-item',
		percentPosition: true
	});
	var timerId = setInterval(function() { $masonry.masonry('layout') }, 1000);
	setTimeout(function() { clearInterval(timerId); }, 10000);
}


function fnCallUpload(target, expTarget) {
	// Setup html5 version
	$("#"+target).pluploadQueue({
		// General settings
		runtimes : 'html5',
		url : "/admin/product/productList/upload",
		chunk_size : '1mb',
		unique_names : true,
		multipart_params: { 
			'productNo' : '<?=$pNo?>',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		filters : {
			max_file_size : '20mb',
			mime_types: [
				{title : "Image files", extensions : "jpg,gif,png"},
				{title : "PDF files", extensions : "pdf"},
				{title : "Zip files", extensions : "zip"}
			]
		},
		init : {
			FilesAdded: function(up, files) {
				isAllUploaded = false;
				isFileAdd = true;
			},
			UploadComplete: function(up, files) {
                // Called when all files are either uploaded or failed
				fileVerify = new Array();
				plupload.each(files, function(file) {
					fileVerify.push(file);
				});
				isAllUploaded = true;
				isFileAdd = false;
				var upVerifyHtml = "";
				for( var i = 0 ; i < fileVerify.length ; i++) {
					//console.log(fileVerify[i]);
					upVerifyHtml += "<li class='col-sm-6 col-xs-12 mb-2 grid-item'>"
					upVerifyHtml += "<input type='hidden' class='uploadFileNames' value='"+fileVerify[i]['name']+"'>";
					upVerifyHtml += "<input type='hidden' class='uploadFileId' value='"+fileVerify[i]['target_name']+"'>";
					upVerifyHtml += "<textarea class='d-none uploadFilesInfo'>"+JSON.stringify(fileVerify[i])+"</textarea>";
					if (fileVerify[i].target_name.indexOf(".jpg") > 0 || fileVerify[i].target_name.indexOf(".jpeg") > 0 || fileVerify[i].target_name.indexOf(".png") > 0 || fileVerify[i].target_name.indexOf(".gif") > 0) {
						upVerifyHtml += "<img class='mb-1' src='/uploads/product/<?=$applyYear?>/<?=$pNo?>/"+fileVerify[i]['target_name']+"'>";
					} else {
						upVerifyHtml += "<a href='/files/"+fileVerify[i]['name']+"/apply/file/"+fileVerify[i]['target_name']+"/<?=$applyYear?>/' class='btn btn-dark w-100'>"+fileVerify[i]['target_name']+"</a>";
					}
					upVerifyHtml += "<input type='text' class='form-control uploadFileExplain' name='uploadFileExplain' placeholder='"+fileVerify[i]['name']+" 파일의 설명을 입력하세요'>";
					upVerifyHtml += "</il>";
					// 파일 DB 처리 
				}
				//$("#imgContentExplain").append(upVerifyHtml);
				fnCallMasonry(expTarget, upVerifyHtml);
				fnCallUpload();
			}
		}
	});
	$("#imgContent_container").css("padding", "0px");
	$("div.plupload_header_content").css("display", "none");
}
function fnUploadSave() {
	var arrUploadFiles = new Array();
	if ($(".uploadFileNames").length>0) {
		$(".uploadFileNames").each(function (idx) {
			var clientName = $(".uploadFileNames").eq(idx).val();
			var fileName = $(".uploadFileId").eq(idx).val();
			var fileData = $(".uploadFilesInfo").eq(idx).val();
			var fileExplain = $(".uploadFileExplain").eq(idx).val();
			arrUploadFiles.push({"clientName":clientName, "fileName":fileName, "fileData":fileData, "fileExplain":fileExplain});
		});
		$.ajax({
			url: "/admin/product/productList/ajaxUploadPhoto/",
			type: "POST",
			dataType: "html",
			data: {
				'type': 'productExplain',
				'productNo': '<?=$pNo?>',
				'arrUploadFiles':arrUploadFiles,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				$("#uploadIMGModal").modal('hide');
				$("#imgContentExplain").html("");
				fnGetImgExplain();
			}
		});
	} else { 
		alert("파일을 업로드하여 주세요");
		return false;
	}
}
function fnChkUploaded() {
	if (isAllUploaded==true) {
		$("#uploadIMGModal").modal('hide');
		$("#uploadConceptModal").modal('hide');
		$("#uploadModal").modal('hide');
	} else {
		alert("[업로드 시작] 버튼을 눌러 업로드를 하여주세요");
		return false;
	}
}
function fnDelFile(no) {
	if (confirm("정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다.")) {
		$.ajax({
			url: "/admin/product/productList/ajaxDelUploadPhoto/",
			type: "POST",
			dataType: "html",
			data: {
				'no': no,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				$("#imgFileView"+no).remove();
				fnCallMasonry('ulImageExplain', data);
			}
		});
	}
}
</script>

