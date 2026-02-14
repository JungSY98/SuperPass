<div class="divContent">

<?=form_open_multipart("/admin/archive/product/saveProduct/", array("METHOD"=>"POST"), array("viewNo"=>$viewNo, "year"=>$year))?>

	<div class="row mb-2">
		<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">분야</div></label>
		<div class="col-sm-10 pt-2">


			<div class="form-check form-check-inline">
				<input class="form-check-input cateForm" type="radio" id="isBest1" name="isBest" value="Y" <?=element('isBest', $bizD) == 'Y' ? 'checked' : ''?>>
				<label class="form-check-label" for="isBest1">우수 컨소시엄 표시</label>
			</div>

			<div class="form-check form-check-inline">
				<input class="form-check-input cateForm" type="radio" id="isBest2" name="isBest" value="N" <?=element('isBest', $bizD) == 'N' ? 'checked' : ''?>>
				<label class="form-check-label" for="isBest2">미 표시</label>
			</div>


		</div>
	</div>


	
	<div class="row mb-2">
		<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">분야</div></label>
		<div class="col-sm-10 pt-2">

			<div class="form-check form-check-inline">
				<input class="form-check-input cateForm" type="radio" id="applyCategory1" name="applyCategory" value="product" checked>
				<label class="form-check-label" for="applyCategory1">제품</label>
			</div>

		</div>
	</div>


	<div class="row mb-2" id="formType">

	<div class="row mb-2">
		<div class="col-sm-6">
			<input type="text" class="form-control" id="com1Name" name="com1Name" placeholder="중소기업명을 입력하세요" value="<?=element("com1Name", $detailD)?>">
		</div>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="com2Name" name="com2Name" placeholder="디자인 기업명을 입력하세요" value="<?=element("com2Name", $detailD)?>">
		</div>
	</div>

	<div class="row mb-2">
		<div class="col-sm-12">
			<button class="btn btn-secondary w-100" type="button" onclick="fnUploadMain()">메인 이미지 업로드</button>
			<ul class="ulImageExplain row mt-4" id="ulImgMain">
<? foreach(element('top', $picD) as $k => $pD) { ?>
				<li class='col-sm-6 col-xs-12 mb-2 grid-item'>
					<input type='hidden' name='uploadFileNo[]' class='uploadFileNames' value='<?=$pD['no']?>'>
					<input type='hidden' name='uploadFileNames[]' class='uploadFileNames' value='<?=$pD['client_name']?>'>
					<input type='hidden' name='uploadFileId[]' class='uploadFileId' value='<?=$pD['file_name']?>'>
					<input type='hidden' name='uploadFileType[]' class='uploadFileType' value='<?=$pD['type']?>'>
					<textarea name='uploadFilesInfo[]' class='d-none uploadFilesInfo'><?=$pD['file_data']?></textarea>
					<img class='mb-1 w-100' src='/uploads/apply/2023/archive/<?=$pD['file_name']?>'>
					<input type='text' class='form-control uploadFileExplain' name='uploadFileExplain[]' placeholder='파일의 설명을 입력하세요' value="<?=$pD['file_explain']?>">
				</li>
<? } ?>
			</ul>
		</div>
	</div>

	<div class="row mb-2">
		<h3 class="pt-3">결과물 소개</h3>
		<div class="col-sm-12 mb-2">
			<input type="text" class="form-control" id="resultTitle" name="resultTitle" placeholder="결과물 제목을 입력하세요" value="<?=element("resultTitle", $detailD)?>">
		</div>
		<div class="col-sm-12">
			<textarea class="form-control" id="resultContent" name="resultContent" rows="5" placeholder="결과물 내용을 입력하세요"><?=element("resultContent", $detailD)?></textarea>
		</div>
	</div>

	<div class="row mb-2">
		<h3 class="pt-3">협업 목표</h3>
		<div class="col-sm-6">
			<p>중소기업</p>
			<textarea class="form-control" id="com1Aim" name="com1Aim" rows="5" placeholder="중소기업의 협업 목표를 입력하세요"><?=element("com1Aim", $detailD)?></textarea>
		</div>
		<div class="col-sm-6">
			<p>디자인기업</p>
			<textarea class="form-control" id="com2Aim" name="com2Aim" rows="5" placeholder="디자인기업의 협업 목표를 입력하세요"><?=element("com2Aim", $detailD)?></textarea>
		</div>
	</div>

	<div class="row mb-2">
		<h3 class="pt-3">멤버 등록 <span class="btn btn-sm btn-success" onclick="fnManageMember('Member', 'add')">추가</span><span class="btn btn-sm btn-danger" onclick="fnManageMember('Member', 'del')">삭제</span></h3>
		<div class="col-sm-12" id="estimateMember">
<? foreach(element('member', $picD) as $k => $pD) { ?>
			<div class="row divSectionMember mb-2">
				<div class="col-sm-2">
<? if ($pD['file_name']) { ?>
					<img class='mb-1' src='/uploads/apply/2023/archive/<?=$pD['file_name']?>' style="width:100%;">
				</div>
<? } ?>
				<div class="col-sm-10 align-middle">
					<div class="input-group">
						<span class="input-group-text">멤버 #<?=$k+1?></span>
						<input type="text" name="mbname[]" class="form-control" value="<?=$pD['file_explain']?>" placeholder="멤버 명칭 #1 를 입력하세요">
						<span class="input-group-text">이미지 #<?=$k+1?></span>
						<input type="file" name="mbimage[]" class="form-control onlyNumber" value="" placeholder="이미지 #1 를 입력하세요">
						<button class="btn btn-danger" type="button" onclick="return fnDelPic('<?=$pD['no']?>')">삭제</button>
					</div>
				</div>
			</div>
			<input type='hidden' name='uploadMemberNo[]' class='uploadFileNames' value='<?=$pD['no']?>'>
			<input type='hidden' name='uploadMemberC[]' class='uploadFileNames' value='<?=$pD['client_name']?>'>
			<input type='hidden' name='uploadMember[]' class='uploadFileId' value='<?=$pD['file_name']?>'>
			<input type='hidden' name='uploadMemberT[]' class='uploadFileType' value='<?=$pD['type']?>'>
			<textarea name='uploadMemberD[]' class='d-none uploadFilesInfo'><?=$pD['file_data']?></textarea>
<? } ?>
		</div>
	</div>




	<div class="row mb-2">
		<h3 class="pt-3">개발지원사업</h3>
		<div class="col-sm-6">
			<p>중소기업</p>
			<textarea class="form-control" id="com1Biz" name="com1Biz" rows="5" placeholder="중소기업의 개발지원사업 내용을 입력하세요"><?=element("com1Biz", $detailD)?></textarea>
		</div>
		<div class="col-sm-6">
			<p>디자인기업</p>
			<textarea class="form-control" id="com2Biz" name="com2Biz" rows="5" placeholder="디자인기업의 개발지원사업 내용을 입력하세요"><?=element("com2Biz", $detailD)?></textarea>
		</div>
	</div>


	<div class="row mb-2">
		<div class="col-sm-12">
			<button class="btn btn-secondary w-100" type="button" onclick="fnUploadMiddle()">중간 이미지 업로드</button>
			<ul class="ulImageExplain row mt-4" id="ulImgMiddle">
<? foreach(element('middle', $picD) as $k => $pD) { ?>
				<li class='col-sm-6 col-xs-12 mb-2 grid-item'>
					<input type='hidden' name='uploadFileNo[]' class='uploadFileNames' value='<?=$pD['no']?>'>
					<input type='hidden' name='uploadFileNames[]' class='uploadFileNames' value='<?=$pD['client_name']?>'>
					<input type='hidden' name='uploadFileId[]' class='uploadFileId' value='<?=$pD['file_name']?>'>
					<input type='hidden' name='uploadFileType[]' class='uploadFileType' value='<?=$pD['type']?>'>
					<textarea name='uploadFilesInfo[]' class='d-none uploadFilesInfo'><?=$pD['file_data']?></textarea>
					<img class='mb-1 w-100' src='/uploads/apply/2023/archive/<?=$pD['file_name']?>'>
					<div class="input-group">
						<input type='text' class='form-control uploadFileExplain' name='uploadFileExplain[]' placeholder='파일의 설명을 입력하세요' value="<?=$pD['file_explain']?>">
						<button type="button" class="btn btn-danger" onclick="return fnDelPic('<?=$pD['no']?>')">삭제</button>
					</div>
				</li>
<? } ?>
			</ul>
		</div>
	</div>


	<div class="row mb-2">
		<h3 class="pt-3">컨소시엄 그 후</h3>
		<div class="col-sm-6">
			<p>중소기업</p>
			<textarea class="form-control" id="com1Consortium" name="com1Consortium" rows="5" placeholder="중소기업의 컨소시엄 그 후 내용을 입력하세요"><?=element("com1Consortium", $detailD)?></textarea>
		</div>
		<div class="col-sm-6">
			<p>디자인기업</p>
			<textarea class="form-control" id="com2Consortium" name="com2Consortium" rows="5" placeholder="디자인기업의 컨소시엄 그 후 내용을 입력하세요"><?=element("com2Consortium", $detailD)?></textarea>
		</div>
	</div>


	<div class="row mb-2">
		<h3 class="pt-3">소감</h3>
		<div class="col-sm-6">
			<p>중소기업</p>
			<textarea class="form-control" id="com1After" name="com1After" rows="5" placeholder="중소기업의 컨소시엄 그 후 내용을 입력하세요"><?=element("com1After", $detailD)?></textarea>
		</div>
		<div class="col-sm-6">
			<p>디자인기업</p>
			<textarea class="form-control" id="com2After" name="com2After" rows="5" placeholder="디자인기업의 컨소시엄 그 후 내용을 입력하세요"><?=element("com2After", $detailD)?></textarea>
		</div>
	</div>



	<div class="row mb-2">
		<h3 class="pt-3">홈페이지</h3>
		<div class="col-sm-6">
			<p>중소기업</p>
			<div class="input-group">
				<span class="input-group-text">링크명</span>
				<input type="text" class="form-control" name="com1LinkName" placeholder="누비랩(Nuvilab Inc.)" value="<?=element("com1LinkName", $detailD)?>">
				<span class="input-group-text">링크주소</span>
				<input type="text" class="form-control" name="com1Link" placeholder="www.nuvilab.com" value="<?=element("com1Link", $detailD)?>">
			</div>
		</div>
		<div class="col-sm-6">
			<p>디자인기업</p>
			<div class="input-group">
				<span class="input-group-text">링크명</span>
				<input type="text" class="form-control" name="com2LinkName" placeholder="피앤디디자인(PND design)" value="<?=element("com2LinkName", $detailD)?>">
				<span class="input-group-text">링크주소</span>
				<input type="text" class="form-control" name="com2Link" placeholder="www.pnddesign.co.kr/" value="<?=element("com2Link", $detailD)?>">
			</div>
		</div>
	</div>


	<div class="row mb-2">
		<div class="col-sm-12">
			<button class="btn btn-success w-100">저장</button>
		</div>
	</div>

<?=form_close()?>


	</div>


</div>

<input type="hidden" name="fieldCntMember" value="">

<script>
/* 전역 변수 선언 */
var isAllUploaded = false;
var isFileAdd = false;

function fnManageMember(section, act) {
	var cnt = $(".divSection"+section).length;
	var printCnt = cnt + 1;
	$("input[name=fieldCnt"+section+"]").val(printCnt);
	var html = '';
	html += '<div class="row divSection'+section+' mb-2">';
	html += '<div class="col-sm-6">';
	html += '<p>멤버 #'+printCnt+'</p>';
	html += '<input type="hidden" name="uploadMemberNo[]" value="">';
	html += '<input type="text" name="mbname[]" class="form-control" value="" placeholder="멤버 명칭 #'+printCnt+' 를 입력하세요">';
	html += '</div>';
	html += '<div class="col-sm-6">';
	html += '<p>이미지 #'+printCnt+'</p>';
	html += '<div class="input-group">';
	html += '<input type="file" name="mbimage[]" class="form-control onlyNumber" value="" placeholder="이미지 #'+printCnt+' 를 입력하세요">';
	html += '</div>';
	html += '</div>';

	if (act == 'add') {
		$("#estimate"+section).append(html);
		fnSetNumber();
	} else {
		if (cnt==1) {
			alert("더 이상 삭제할 수 없습니다.");
			return false;
		} else {
			$("div.divSection"+section+":last").remove();
		}
	}
	
}

function fnUploadMain() {
	fnCallUpload('divUploadFileList', 'ulImgMain', 'top');
	$("#uploadModal").modal("show");
}
function fnUploadMiddle() {
	fnCallUpload('divUploadFileList', 'ulImgMiddle', 'middle');
	$("#uploadModal").modal("show");
}

function fnCallUpload(target, expTarget, imgType) {
	// Setup html5 version
	$("#imgUpload").pluploadQueue({
		// General settings
		runtimes : 'html5',
		url : "/dataTransfer/upload",
		chunk_size : '1mb',
		unique_names : true,
		multipart_params: { 
			'type' : target,
			'applyNo' : 'archive',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		filters : {
			max_file_size : '20mb',
			mime_types: [
				{title : "Image files", extensions : "jpg,gif,png"},
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
					upVerifyHtml += "<li class='col-sm-6 col-xs-12 mb-2 grid-item'>"
					upVerifyHtml += "<input type='hidden' name='uploadFileNo[]' class='uploadFileNames' value=''>";
					upVerifyHtml += "<input type='hidden' name='uploadFileNames[]' class='uploadFileNames' value='"+fileVerify[i]['name']+"'>";
					upVerifyHtml += "<input type='hidden' name='uploadFileId[]' class='uploadFileId' value='"+fileVerify[i]['target_name']+"'>";
					upVerifyHtml += "<input type='hidden' name='uploadFileType[]' class='uploadFileType' value='"+imgType+"'>";
					upVerifyHtml += "<textarea name='uploadFilesInfo[]' class='d-none uploadFilesInfo'>"+JSON.stringify(fileVerify[i])+"</textarea>";
					upVerifyHtml += "<img class='mb-1' src='/uploads/apply/2023/archive/"+fileVerify[i]['target_name']+"'>";
					upVerifyHtml += "<input type='text' class='form-control uploadFileExplain' name='uploadFileExplain[]' placeholder='"+fileVerify[i]['name']+" 파일의 설명을 입력하세요'>";
					upVerifyHtml += "</li>";
					// 파일 DB 처리 
				}
				//$("#imgContentExplain").append(upVerifyHtml);
				fnCallMasonry(expTarget, upVerifyHtml);
				fnCallUpload(target, expTarget);
			}
		}
	});
	$("#imgContent_container").css("padding", "0px");
	$("div.plupload_header_content").css("display", "none");
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
function fnDelPic(no) {
	if (confirm("정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다.")) {
		$.ajax({
			url: "/admin/archive/product/ajaxDelUploadPhoto/",
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
$(document).ready(function() {
<? if (empty($bizD)) { ?>
	fnManageMember('Member', 'add');
	fnManageMember('Member', 'add');
<? } ?>
});
</script>

<link rel="stylesheet" href="/assets/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css" type="text/css" media="screen" />
<!-- production -->
<script type="text/javascript" src="/assets/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="/assets/plupload/i18n/ko.js" charset="UTF-8"></script>
<script type="text/javascript" src="/assets/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
<script src="/assets/js/masonry.pkgd.min.js"></script>

<!-- 컨셉 업로드 -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="uploadModalLabel"><span>이미지 업로드</span></h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="conceptContent p-0" id="imgUpload">

				</div>
				<div class="mt-2">
					<ul class="ulConceptContentExplain row" id="imgUploadExplain">

					</ul>
				</div>
			</div>


			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">창닫기</button>
			</div>
		</div>
	</div>
</div>

