<div class="divContents divApply mt-5 pt-4">
	<div class="row">
		<div class="col-sm-12 divAgree pt-3">
			<?=$step6_form?>
		</div>
	</div>
</div>


<!-- 파일업로드 -->
<div class="modal fade" id="uploadModal" aria-labelledby="uploadModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="uploadModalLabel"><span></span></h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="divUploadFileList" id="divUploadFileList">
				</div>
				<div id="uploadFile" class="w-100 text-center"></div>
				<div id="uploadPlace" class="w-100 align-middle text-center"></div>
			</div>


			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" onclick="return chkUpload()">창닫기</button>
			</div>
		</div>
	</div>
</div>



<link rel="stylesheet" href="/assets/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css" type="text/css" media="screen" />
<!-- production -->
<script type="text/javascript" src="/assets/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="/assets/plupload/i18n/ko.js" charset="UTF-8"></script>
<script type="text/javascript" src="/assets/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
<script>
/* 전역 변수 선언 */
var isAllUploaded = true;
var isFileAdd = false;
var currentStep = 'step6';
var arrFileName = new Array();
<? foreach($document as $k => $docuName) { ?>
arrFileName['<?=$k?>'] = '<?=$docuName?>';
<? } ?>
var arrComType = new Array();
arrComType['com1'] = '중소기업';
arrComType['com2'] = '디자인전문기업';
$(document).ready(function() {

});

function fnViewFile(fileName, clientName) {
	location = "/viewFiles/"+fileName+"/";
}

function fnDelFile2(no) {
	if (confirm("정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다.")) {
		$.ajax({
			url: "/apply/ajaxDelUploadPhoto/",
			type: "POST",
			dataType: "html",
			data: {
				'no': no,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				$("#btnName"+no).remove();
			}
		});
	}
}

function fnGetFileList(docuType, comType) {
	$("#divUploadFileList").html("");
	$.ajax({
		url: "/admin/site/apply2024/ajaxGetDocuList/",
		type: "POST",
		dataType: "html",
		data: {
			'applyNo': '<?=$applyNo?>',
			'docuType': docuType,
			'comType': comType,
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			$("#divUploadFileList").html(data);
		}
	});
}

function fnUploadSave() {

}

function fnFileUpload(docuType, comType) {
	// 업로드 된 파일 가져오기
	fnGetFileList(docuType, comType);
	$("#uploadModalLabel").find("span").html("[ "+arrComType[comType]+" ]<br>"+arrFileName[docuType]+"  파일 첨부");
	fnCallFileUpload(docuType, comType);
	$("#uploadModal").modal("show");
}
function fnCallFileUpload(docuType, comType) {
	// Setup html5 version
	$("#uploadPlace").pluploadQueue({
		// General settings
		runtimes : 'html5',
		url : "/apply/upload",
		chunk_size : '1mb',
		unique_names : true,
		multipart_params: { 
			'applyNo' : '<?=$applyNo?>',
			'docuType' : docuType,
			'comType' : comType,
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		filters : {
			prevent_duplicates : true,
			max_file_size : '100mb',
			mime_types: [
				{title : "Image files", extensions : "jpg,gif,png,JPG,jpeg,JPEG,GIF,PNG"},
				{title : "PDF files", extensions : "pdf,PDF"},
				{title : "Document files", extensions : "doc,docx,ppt,pptx,hwp,hwpx,xls,xlsx,DOC,DOCX,PPT,PPTX,HWP,HWPX,XLS,XLSX"},
				{title : "Zip files", extensions : "zip,ZIP"}
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

				var upVerifyHtml = '';
				var arrUploadFiles = new Array();
				// 파일 DB 처리 
				for( var i = 0 ; i < fileVerify.length ; i++) {
					var clientName = fileVerify[i]['name'];
					var fileName = fileVerify[i]['target_name'];
					var fileData = JSON.stringify(fileVerify[i]);
					arrUploadFiles.push({"clientName":clientName, "fileName":fileName, "fileData":fileData});
				}
				$.ajax({
					url: "/apply/ajaxUploadFile/",
					type: "POST",
					dataType: "html",
					data: {
						'type': docuType+"_"+comType,
						'applyNo': '<?=$applyNo?>',
						'arrUploadFiles':arrUploadFiles,
						'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					},
					success: function(data){
						fnGetFileList(docuType, comType);
						fnCallFileUpload(docuType, comType)
					}
				});
			}
		}
	});
	$("#uploadPlace_container").css("padding", "0px")
	$("div.plupload_header_content").css("display", "none");
	var chgTitle = setTimeout(function() {
		$("#uploadPlace_container").attr("title", arrFileName[docuType]+" 업로드");
	}, 100);
}

function fnMoveStep(step) {
	location = '/apply/step'+step;
}
function chkUpload() {
	//console.log(isAllUploaded+ " "+isFileAdd);
	if (isAllUploaded==true) {
		location.reload();
	} else {
		alert("[업로드 시작] 버튼을 눌러 업로드를 완료하여 주세요");
		$("a.plupload_button plupload_start").click();
		return false;
	}
}
</script>

<?//=$autoSave?>