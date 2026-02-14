<link rel="stylesheet" href="/assets/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css" type="text/css" media="screen" />
<!-- production -->
<script type="text/javascript" src="/assets/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="/assets/plupload/i18n/ko.js" charset="UTF-8"></script>
<script type="text/javascript" src="/assets/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
<script src="/assets/js/masonry.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<style>
	.sortable-grid {
		display: flex;
		flex-wrap: wrap;
		gap: 10px;
		padding: 10px;
	}
	.sortable-item {
		width: 180px;
		height: 220px;
		border: 1px solid #ddd;
		border-radius: 8px;
		background: #fff;
		padding: 5px;
		position: relative;
		cursor: move;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
	}
	.sortable-item img {
		width: 100%;
		height: 140px;
		object-fit: cover;
		border-radius: 4px;
	}
	.sortable-item .sort-badge {
		position: absolute;
		top: 5px;
		left: 5px;
		background: rgba(0,0,0,0.6);
		color: #fff;
		padding: 2px 6px;
		border-radius: 4px;
		font-size: 11px;
	}
	.sortable-ghost {
		opacity: 0.4;
		background: #ebedef;
	}
#viewMap {
	width:100%;
	aspect-ratio:4/3;
}
</style>
<div class="card">
	<div class="card-header">
		<h4>Store <?=$sNo ? "수정": "등록"?></h4>
	</div>
	<div class="card-body">
<?=form_open_multipart("/admin/store/storeList/save", array("onsubmit"=>"return fnChkForm()"), array("sNo"=>$sNo))?>
		<table class="table" id="spotTable">

			<tr>
				<th>표시여부</th>
				<td><input type="checkbox" name="isUse"  value="Y" <?=(element("isUse", $storeD) == 'Y' || empty($bNo)) ? 'checked' : ''?>> 표시</td>
			</tr>
			<tr class="d-none">
				<th>스탬프여부</th>
				<td>
					<label><input type="radio" name="isStamp"  value="Y" <?=(element("isStamp", $storeD) == 'Y' || empty($bNo)) ? 'checked' : ''?>> 예</label>
					<label><input type="radio" name="isStamp"  value="N" <?=(element("isStamp", $storeD) == 'N' || empty($bNo)) ? 'checked' : ''?>> 아니오</label>
				</td>
			</tr>

			<tr>
				<th>대분류 선택</th>
				<td>
					<select name="branchNo" class="form-control">
						<option value="">선택하세요</option>
<? foreach($branchD as $k => $bD) { ?>
						<option value="<?=$bD['no']?>" <?=element("branchNo", $storeD)==$bD['no']?"selected":""?>><?=$bD['sNameKR']?> _ <?=$bD['sNameEN']?></option>
<? } ?>
					</select>
				</td>
			</tr>


			<tr>
				<th>상점 분류 선택</th>
				<td>
					<select name="category" class="form-control">
						<option value="">선택하세요</option>
<? foreach($cateD as $k => $cD) { ?>
						<option value="<?=$cD['code']?>" <?=element("category", $storeD)==$cD['code']?"selected":""?>><?=$cD['name_kr']?></option>
<? } ?>
					</select>
				</td>
			</tr>


			<tr>
				<th>Store 이용코드</th>
				<td><input type="text" name="storeCode" class="form-control" placeholder="이용코드를 입력하여 주세요"  value="<?=element("storeCode", $storeD)?>"></td>
			</tr>
			<tr>
				<th>할인 설정</th>
				<td>
					<div class="input-group">
						<input type="text" name="dcAmount" class="form-control" placeholder="DC 금액을 입력하여 주세요"  value="<?=@number_format(element("dcAmount", $storeD))?>">
						<span class="input-group-text">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="dcType" id="inlineRadio1" value="￦" <?=element("dcType", $storeD)=="￦" ? "checked" : ""?>>
								<label class="form-check-label" for="inlineRadio1">￦</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="dcType" id="inlineRadio2" value="%" <?=element("dcType", $storeD)=="%" ? "checked" : ""?>>
								<label class="form-check-label" for="inlineRadio2">%</label>
							</div>
						</span>
					</div>				
				
				</td>
			</tr>
			<tr>
				<th>Store 명</th>
				<td>
					<div class="input-group">
						<span class="input-group-text">국문</span>
						<input type="text" name="sNameKR" class="form-control" placeholder="국문 Store명을 입력하여 주세요" required value="<?=element("sNameKR", $storeD)?>">
					</div>
					<div class="input-group">
						<span class="input-group-text">영문</span>
						<input type="text" name="sNameEN" class="form-control" placeholder="영문 Store명을입력하여 주세요"  value="<?=element("sNameEN", $storeD)?>">
					</div>
				</td>
			</tr>
			<tr>
				<th class="col-sm-2">Store 소개 (국문)</th>
				<td><textarea name="sDescKR" class="form-control" placeholder="Store 소개 (국문)를 입력하여 주세요" rows=7><?=element("sDescKR", $storeD)?></textarea></td>
			</tr>

			<tr>
				<th class="col-sm-2"> Store 소개 (영문)</th>
				<td><textarea name="sDescEN" class="form-control" placeholder="Store 소개 (국문)를 입력하여 주세요" rows=7 ><?=element("sDescEN", $storeD)?></textarea></td>
			</tr>
			<tr class="">
				<th> Store 메인 이미지</th>
				<td>
					<input type="file" id="sIMG" name="sIMG" class="form-control" onchange="return viewIMG()">
					<div id="showIMG" class="pt-2" style="width:300px;"></div>
					<p class="mb-0">※ 최대 3000 X 3000 까지 업로드 가능합니다. <span class="text-danger" id="fileMsg"></span></p>
<? if (element("sMainIMG_Source", $storeD)) { ?>
					<img src="/uploads/store/<?=element("sMainIMG_Source", $storeD)?>" style="width:200px;">
					<label><input type="checkbox" name="del_spotIMG" value="<?=element("sMainIMG_Source", $storeD)?>"> 이미지 삭제</label>
					<input type="hidden" name="sMainIMG_Name" value="<?=element("sMainIMG_Name", $storeD)?>">
					<input type="hidden" name="sMainIMG_Source" value="<?=element("sMainIMG_Source", $storeD)?>">
<? } ?>


				</td>
			</tr>

			<tr>
				<th> Store 상세 이미지</th>
				<td>
<? if ($sNo) { ?>
					<div class="d-flex gap-2 mb-2">
						<button class="btn btn-secondary flex-grow-1" type="button" id="btnSpot" onclick="fnUploadSpot()">이미지 업로드</button>
						<button class="btn btn-primary flex-grow-1" type="button" onclick="fnShowSortModal()">상세 이미지 순서 조정</button>
					</div>
					<ul class="ulImageExplain row mt-4" id="ulPageImageExplain">
					</ul>
<? } else { ?>
				<button class="btn btn-danger w-100" type="button" >등록 후 수정 시 등록 가능합니다.</button>
<? } ?>
				</td>
			</tr>


			<tr>
				<th class="col-sm-2">주소 (국문)</th>
				<td>
					<div class="input-group w-100">
						<input type="text" id="sAddr1KR" name="sAddr1KR" class="form-control" placeholder="국문 주소를 입력하여 주세요"  value="<?=element("sAddr1KR", $storeD)?>" readonly>
						<button class="btn btn-success" type="button" onclick="fnSearchAddr()">주소 검색</button>
					</div>
					<input type="text" id="sAddr2KR" name="sAddr2KR" class="form-control" placeholder="국문 상세주소를 입력하여 주세요"  value="<?=element("sAddr2KR", $storeD)?>">
					<input type="hidden" id="sAddr3KR" name="sAddr3KR" class="form-control" value="<?=element("sAddr3KR", $storeD)?>">
				</td>
			</tr>
			<tr>
				<th class="col-sm-2">주소 (영문)</th>
				<td>
					<input type="text" id="sAddr1EN" name="sAddr1EN" class="form-control" placeholder="영문 주소를 입력하여 주세요"  value="<?=element("sAddr1EN", $storeD)?>" readonly>
					<input type="text" id="sAddr2EN" name="sAddr2EN" class="form-control" placeholder="영문 상세주소를 입력하여 주세요"  value="<?=element("sAddr2EN", $storeD)?>">
					<input type="hidden" id="sAddr3EN" name="sAddr3EN" class="form-control" value="<?=element("sAddr3EN", $storeD)?>">
				</td>
			</tr>
			<tr>
				<th class="col-sm-2">주소 (영문)</th>
				<td>

					<p class="mb-0 text-danger" id="pGuideGPS">※ 주소 입력 후, GPS 변환을 클릭하여 지도상 정확한 위치를 확인하여 주세요</p>
					<button class="btn btn-outline-danger w-100" type="button" id="btnGetGPS">상세 변경</button>
					<div class="viewMap" id="viewMap" style="display:none;"></div>
					<span id="coordinates"></span>
					<div class="input-group">
						<span class="input-group-text">Lat</span>
						<input type="text" class="form-control" name="mapLat" id="mapLat" value="<?=element("mapLat", $storeD)?>">
						<span class="input-group-text">Lng</span>
						<input type="text" class="form-control" name="mapLng"id="mapLng"  value="<?=element("mapLng", $storeD)?>">
					</div>
					<button class="btn btn-danger w-100" type="button" id="btnConfirmGPS">GPS 설정</button>
				</td>
			</tr>

			<tr>
				<th>운영시간</th>
				<td>
					<textarea name="sOpenTime" class="form-control" placeholder="운영시간을 영문으로 입력하여 주세요" rows="5"><?=element("sOpenTime", $storeD)?></textarea>
					<p class="text-danger">※ 영문으로 기재하여 주세요</p>
				</td>
			</tr>
			<tr>
				<th>연락처</th>
				<td>
					<input type="text" name="sContact" class="form-control" placeholder="연락처를 입력하여 주세요"  value="<?=element("sContact", $storeD)?>">
				</td>
			</tr>
			<tr>
				<th>홈페이지 / SNS</th>
				<td>
					<div class="input-group mb10">
						<span class="input-group-text">홈페이지</span>
						<input type="text" name="sLink1" class="form-control" placeholder="홈페이지를 입력하여 주세요"  value="<?=element("sLink1", $storeD)?>">
					</div>
					<div class="input-group mb10">
						<span class="input-group-text">인스타</span>
						<span class="input-group-text">https://www.instagram.com/</span>
						<input type="text" name="sLink2" class="form-control" placeholder="인스타를 입력하여 주세요"  value="<?=element("sLink2", $storeD)?>">
					</div>
					<div class="input-group">
						<span class="input-group-text">기타</span>
						<textarea name="sLink3" class="form-control" placeholder="기타 SNS를 입력하여 주세요"  rows="4"><?=element("sLink3", $storeD)?></textarea>
					</div>
				</td>
			</tr>
			<tr id="attachTR">
				<td>
					<div class="row">
						<div class="col-6" style="padding:0px;">
							<button type="button" class="btn btn-primary w-100" onclick="fnAddTR()">항목 추가</button>
						</div>
						<div class="col-6" style="padding:0px;">
							<button type="button" class="btn btn-danger w-100" onclick="fnRemoveTR()">항목 삭제</button>
						</div>
					</div>
				</td>
				<td></td>
			</tr>
<?
	if (is_array(element('sAddFieldKR', $storeD)))
		foreach($storeD['sAddFieldKR'] as $k4 => $fD)  {
			$krField = $fD;
			$enField = element($k4, element('sAddFieldEN', $storeD));
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
							<button type="button" class="btn btn-secondary w-100" onclick="location = '/admin/store/storeList/'; ">목록으로</button>
						</div>
					</div>
				</td>
			</tr>

		</table>
<?=form_close()?>

	</div>
</div>


<!-- 정렬 모달 -->
<div class="modal fade" id="sortImageModal" tabindex="-1" aria-labelledby="sortImageModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="sortImageModalLabel"><span>상세 이미지 순서 조정</span></h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body bg-light">
				<div class="alert alert-info py-2 small mb-3">
					<i class="fa fa-info-circle"></i> 이미지를 클릭하여 드래그하거나 순서를 옮긴 후 <b>[변경 사항 저장]</b> 버튼을 눌러주세요.
				</div>
				<div id="sortableContainer" class="sortable-grid">
					<!-- JS에서 동적 생성 -->
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
				<button type="button" class="btn btn-danger" onclick="return fnUpdatePhotoInfoFromModal()">변경 사항 저장</button>
			</div>
		</div>
	</div>
</div>


<!-- 제품 이미지 업로드 -->
<div class="modal fade" id="uploadIMGModal" tabindex="-1" aria-labelledby="uploadIMGModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="uploadIMGModalLabel"><span>Store 이미지 업로드</span></h1>
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
var isAllUploaded = true;
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

	// GPS 변환 버튼 클릭 시 주소를 좌표로 변환
	$('#btnConfirmGPS').click(function() {
		$("#viewMap").slideUp();
		$('#btnConfirmGPS, #pGuideGPS, #coordinates').css("display", "none");
	});
	$('#btnGetGPS').click(function() {
		$("#viewMap").slideDown({
			duration: 1500,
			complete: function() {	

				$('#btnConfirmGPS, #pGuideGPS, #coordinates').css("display", "block");
				// 지도 초기화
				var mapContainer = document.getElementById('viewMap');
				var mapOption = {
				  center: new kakao.maps.LatLng(37.566324, 127.009151), // 초기 지도 위치 (서울)
				  level: 3
				};
				var map = new kakao.maps.Map(mapContainer, mapOption);
				var geocoder = new kakao.maps.services.Geocoder();
				var marker = null; // 전역 마커 변수 선언
				
				var address = $('#sAddr1KR').val();
				console.log('aaa');
				geocoder.addressSearch(address, function(result, status) {
					if (status === kakao.maps.services.Status.OK) {
						var mapLat = $("#mapLat").val();
						var mapLng = $("#mapLng").val();
						if (mapLat && mapLng) {
							var coords = new kakao.maps.LatLng(mapLat, mapLng);
						} else {
							var coords = new kakao.maps.LatLng(result[0].y, result[0].x);
						}
						map.setCenter(coords); // 지도 중심 이동
						// 기존 마커가 있으면 제거
						if (marker) {
							marker.setMap(null);
						}
						// 새 위치에 마커 생성
						marker = new kakao.maps.Marker({
							map: map,
							position: coords
						});

						$('#coordinates').text('※ 지도상에 위치를 조정하여 정확한 위치를 선택하여 주세요')
						$("#mapLat").val(result[0].y);
						$("#mapLng").val(result[0].x);
					} else {
						alert('주소를 찾을 수 없습니다.');
					}
				});
				// 지도 클릭 시 클릭한 위치의 좌표 표시
				kakao.maps.event.addListener(map, 'click', function(mouseEvent) {
					var latlng = mouseEvent.latLng;

					// 기존 마커가 있으면 제거
					if (marker) {
						marker.setMap(null);
					}

					// 클릭 위치에 새 마커 생성
					marker = new kakao.maps.Marker({
						position: latlng,
						map: map
					});
					marker.setMap(map);
					$("#mapLat").val(latlng.getLat());
					$("#mapLng").val(latlng.getLng());
					$('#coordinates').text('※ 지도상에 위치를 조정하여 정확한 위치를 선택하여 주세요')
				});
			}
		});
	});


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
function fnUploadSpot() {
	fnCallUpload('imgContent', 'ulImageExplain');
	$("#uploadIMGModal").modal("show");
}

function fnGetImgExplain() {
	$.ajax({
		url: "/admin/store/storeList/ajaxGetUploadPhoto/",
		type: "POST",
		dataType: "html",
		data: {
			'type': 'storeExplain',
			'storeNo': '<?=$sNo?>',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			//console.log(data);
			$('#ulPageImageExplain').html('');
			fnCallMasonry('ulPageImageExplain', data);
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
		url : "/admin/store/storeList/upload",
		chunk_size : '1mb',
		unique_names : true,
		multipart_params: { 
			'spotNo' : '<?=$sNo?>',
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
						upVerifyHtml += "<img class='mb-1' src='/uploads/store/"+fileVerify[i]['target_name']+"'>";
					} else {
						upVerifyHtml += "<a href='/files/"+fileVerify[i]['name']+"/store/file/"+fileVerify[i]['target_name']+"/' class='btn btn-dark w-100'>"+fileVerify[i]['target_name']+"</a>";
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
			url: "/admin/store/storeList/ajaxUploadPhoto/",
			type: "POST",
			dataType: "html",
			data: {
				'type': 'storeExplain',
				'storeNo': '<?=$sNo?>',
				'arrUploadFiles':arrUploadFiles,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				//location.reload();
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
function fnShowSortModal() {
	$('#sortableContainer').html('<div class="w-100 text-center p-5"><i class="fa fa-spinner fa-spin fa-2x"></i></div>');
	$('#sortImageModal').modal('show');

	$.ajax({
		url: "/admin/store/storeList/ajaxGetUploadPhoto/",
		type: "POST",
		dataType: "html",
		data: {
			'type': 'storeExplain',
			'storeNo': '<?=$sNo?>',
			'btn': 'hidden',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			var $data = $(data);
			var html = '';
			
			$data.each(function(index){
				if (this.nodeType === 1) { // Element node
					var no = $(this).data('no');
					var imgSrc = $(this).find('img').attr('src');
					var explain = $(this).find('input[name="image_explain[]"]').val();
					var sort = $(this).find('input[name="image_sort[]"]').val();

					html += '<div class="sortable-item" data-no="'+no+'">';
					html += '	<span class="sort-badge">'+(index+1)+'</span>';
					html += '	<img src="'+imgSrc+'">';
					html += '	<div class="mt-2">';
					html += '		<input type="text" class="form-control form-control-sm modal-explain" value="'+explain+'" placeholder="설명">';
					html += '		<input type="hidden" class="modal-sort" value="'+sort+'">';
					html += '	</div>';
					html += '</div>';
				}
			});
			
			$('#sortableContainer').html(html);

			// SortableJS 적용
			var el = document.getElementById('sortableContainer');
			Sortable.create(el, {
				animation: 150,
				ghostClass: 'sortable-ghost',
				onEnd: function() {
					$('#sortableContainer .sortable-item').each(function(index){
						$(this).find('.sort-badge').text(index + 1);
						$(this).find('.modal-sort').val(index + 1);
					});
				}
			});
		}
	});
}

function fnUpdatePhotoInfoFromModal() {
	var image_no = [];
	var image_sort = [];
	var image_explain = [];

	$('#sortableContainer .sortable-item').each(function() {
		image_no.push($(this).data('no'));
		image_sort.push($(this).find('.modal-sort').val());
		image_explain.push($(this).find('.modal-explain').val());
	});

	if (image_no.length == 0) {
		alert("항목이 없습니다.");
		return;
	}

	$.ajax({
		url: "/admin/store/storeList/ajaxUpdatePhotoInfo/",
		type: "POST",
		data: {
			'image_no': image_no,
			'image_sort': image_sort,
			'image_explain': image_explain,
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			alert(data);
			$('#sortImageModal').modal('hide');
			fnGetImgExplain();
		}
	});
}

function fnDelFile(no) {
	if (confirm("정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다.")) {
		$.ajax({
			url: "/admin/store/storeList/ajaxDelUploadPhoto/",
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

function fnUpdatePhotoInfo() {
	var image_no = [];
	var image_sort = [];
	var image_explain = [];

	$('input[name="image_no[]"]').each(function() { image_no.push($(this).val()); });
	$('input[name="image_sort[]"]').each(function() { image_sort.push($(this).val()); });
	$('input[name="image_explain[]"]').each(function() { image_explain.push($(this).val()); });

	if (image_no.length == 0) {
		alert("등록된 이미지가 없습니다.");
		return;
	}

	$.ajax({
		url: "/admin/store/storeList/ajaxUpdatePhotoInfo/",
		type: "POST",
		data: {
			'image_no': image_no,
			'image_sort': image_sort,
			'image_explain': image_explain,
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			alert(data);
			fnGetImgExplain();
		},
		error: function() {
			alert("저장 중 오류가 발생했습니다.");
		}
	});
}

var _URL = window.URL || window.webkitURL;
function viewIMG() {
	var file = document.getElementById("sIMG");
	var msg = document.getElementById("fileMsg");
	msg.innerHTML = "";
	var img = new Image(), fileSize = Math.round(file.files[0].size / 1024);
	img.onload = function () {
		var width = this.width,
			height = this.height,
			imgsrc = this.src;
		if (width>3000 || height > 3000) {
			alert("업로드 불가한 크기입니다. 다시 업로드 하여주세요\n\nWidth : "+width+" / Height : "+height);
			$("#sIMG").val('');
			return false;
		}
		$('#showIMG').append('<img src="' + imgsrc + '" class="w-100">');

	};
	img.src = _URL.createObjectURL(file.files[0]);
}

</script>





<!-- iOS에서는 position:fixed 버그가 있음, 적용하는 사이트에 맞게 position:absolute 등을 이용하여 top,left값 조정 필요 -->
<div id="postLayer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
<img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">
</div>
<script src="//dapi.kakao.com/v2/maps/sdk.js?appkey=bdee59ddd0e5b9c0038924c5f1d94422&libraries=services,clusterer"></script>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
// 우편번호 찾기 화면을 넣을 element
var element_layer = document.getElementById('postLayer');

function closeDaumPostcode() {
	// iframe을 넣은 element를 안보이게 한다.
	element_layer.style.display = 'none';
}

function fnSearchAddr() {
	new daum.Postcode({
		oncomplete: function(data) {
			// 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

			// 각 주소의 노출 규칙에 따라 주소를 조합한다.
			// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
			var addrKR = ''; // 주소 변수
			var addrEN = ''; 
			var extraAddrKR = ''; // 참고항목 변수
			var extraAddrEN = ''; // 참고항목 변수
			

			//사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
			addrKR = data.roadAddress;
			addrEN = data.roadAddressEnglish;

			// 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
			// 법정동명이 있을 경우 추가한다. (법정리는 제외)
			// 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
			if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
				extraAddrKR += data.bname;
				extraAddrEN += data.bnameEnglish;
			}
			// 건물명이 있고, 공동주택일 경우 추가한다.
			if(data.buildingName !== '' && data.apartment === 'Y'){
				extraAddrKR += (extraAddrKR !== '' ? ', ' + data.buildingName : data.buildingName);
				extraAddrEN += (extraAddrEN !== '' ? ', ' + data.buildingName : data.buildingName);
			}
			// 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
			if(extraAddrKR !== ''){
				extraAddrKR = ' (' + extraAddrKR + ')';
			}
			if(extraAddrEN !== ''){
				extraAddrEN = ' (' + extraAddrEN + ')';
			}
			// 조합된 참고항목을 해당 필드에 넣는다.
			document.getElementById("sAddr3KR").value = extraAddrKR;
			document.getElementById("sAddr3EN").value = extraAddrEN;


			// 우편번호와 주소 정보를 해당 필드에 넣는다.
			document.getElementById("sAddr1KR").value = addrKR;
			document.getElementById("sAddr1EN").value = addrEN;
			// 커서를 상세주소 필드로 이동한다.
			document.getElementById("sAddr2KR").focus();

			// iframe을 넣은 element를 안보이게 한다.
			// (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
			element_layer.style.display = 'none';
		},
		width : '100%',
		height : '100%',
		maxSuggestItems : 5
	}).embed(element_layer);

	// iframe을 넣은 element를 보이게 한다.
	element_layer.style.display = 'block';

	// iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
	initLayerPosition();
}

// 브라우저의 크기 변경에 따라 레이어를 가운데로 이동시키고자 하실때에는
// resize이벤트나, orientationchange이벤트를 이용하여 값이 변경될때마다 아래 함수를 실행 시켜 주시거나,
// 직접 element_layer의 top,left값을 수정해 주시면 됩니다.
function initLayerPosition(){
	var width = 300; //우편번호서비스가 들어갈 element의 width
	var height = 400; //우편번호서비스가 들어갈 element의 height
	var borderWidth = 5; //샘플에서 사용하는 border의 두께

	// 위에서 선언한 값들을 실제 element에 넣는다.
	element_layer.style.width = width + 'px';
	element_layer.style.height = height + 'px';
	element_layer.style.border = borderWidth + 'px solid';
	// 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
	element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px';
	element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px';
}
</script>
