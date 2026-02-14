
<div class="card">
	<div class="card-header">
		<h4>기업 <?=$bNo ? "수정": "등록"?></h4>
	</div>
	<div class="card-body">
<?=form_open_multipart("/admin/brand/brandList/save", array("onsubmit"=>"return fnChkForm()"), array("bNo"=>$bNo))?>
		<table class="table" id="hanbokTable">

			<tr>
				<th>표시여부</th>
				<td><input type="checkbox" name="isUse"  value="Y" <?=(element("isUse", $branchD) == 'Y' || empty($bNo)) ? 'checked' : ''?>> 표시</td>
			</tr>

			<tr>
				<th>기업명</th>
				<td>
					<div class="input-group">
						<span class="input-group-text">국문</span>
						<input type="text" name="bizNameKR" class="form-control" placeholder="국문 기업명을 입력하여 주세요" required value="<?=element("bizNameKR", $branchD)?>">
					</div>
					<div class="input-group">
						<span class="input-group-text">영문</span>
						<input type="text" name="bizNameEN" class="form-control" placeholder="영문 기업명을입력하여 주세요"  value="<?=element("bizNameEN", $branchD)?>">
					</div>
				</td>
			</tr>

			<tr class="">
				<th>대표 이미지</th>
				<td>
					<input type="file" name="bizIMG" class="form-control">
					※ 최대 3000 X 3000 까지 업로드 가능합니다.<br>
<? if (element("bizIMGSource", $branchD)) { ?>
					<img src="/uploads/biz/<?=element("bizIMGSource", $branchD)?>" style="width:200px;">
					<label><input type="checkbox" name="del_bizIMG" value="<?=element("bizIMGSource", $branchD)?>"> 이미지 삭제</label>
					<input type="hidden" name="bizIMGName" value="<?=element("bizIMGName", $branchD)?>">
					<input type="hidden" name="bizIMGSource" value="<?=element("bizIMGSource", $branchD)?>">
<? } ?>

<?php
if ( $this->session->flashdata( 'error' ) ) {
	echo '<div class="alert alert-danger" role="alert">';
	echo $this->session->flashdata('error');
	echo '</div>';
}
?>

				</td>
			</tr>


			<tr>
				<th class="col-sm-2">연락처</th>
				<td><input type="text" name="bizTel" class="form-control" placeholder="연락처를 입력하여 주세요"  value="<?=element("bizTel", $branchD)?>"></td>
			</tr>
			<tr>
				<th>이메일</th>
				<td><input type="text" name="bizEmail" class="form-control" placeholder="이메일 주소를 입력하여 주세요"  value="<?=element("bizEmail", $branchD)?>"></td>
			</tr>
			<tr>
				<th>홈페이지 / SNS</th>
				<td>
					<div class="input-group mb10">
						<span class="input-group-text">홈페이지</span>
						<span class="input-group-text">https://</span>
						<input type="text" name="bWebsite" class="form-control" placeholder="기업 홈페이지를 입력하여 주세요"  value="<?=element("bWebsite", $branchD)?>">
					</div>
					<div class="input-group mb10">
						<span class="input-group-text">인스타</span>
						<span class="input-group-text">https://www.instagram.com/</span>
						<input type="text" name="bSNS1" class="form-control" placeholder="기업 인스타를 입력하여 주세요"  value="<?=element("bSNS1", $branchD)?>">
					</div>
					<div class="input-group mb10">
						<span class="input-group-text">페이스북</span>
						<span class="input-group-text">https://www.facebook.com/</span>
						<input type="text" name="bSNS2" class="form-control" placeholder="기업 페이스북을 입력하여 주세요"  value="<?=element("bSNS2", $branchD)?>">
					</div>
					<div class="input-group">
						<span class="input-group-text">블로그</span>
						<span class="input-group-text">https://blog.naver.com/</span>
						<input type="text" name="bSNS3" class="form-control" placeholder="기업 블로그를 입력하여 주세요"  value="<?=element("bSNS3", $branchD)?>">
					</div>
					<div class="input-group">
						<span class="input-group-text">기타</span>
						<textarea name="bSNS4" class="form-control" placeholder="기타 SNS를 입력하여 주세요"  rows="4"><?=element("bSNS4", $branchD)?></textarea>
					</div>
				</td>
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
	if (is_array(element('bAddFieldKR', $branchD)))
		foreach($branchD['bAddFieldKR'] as $k4 => $fD)  {
			$krField = $fD;
			$enField = element($k4, element('bAddFieldEN', $branchD));
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
							<button type="button" class="btn btn-secondary w-100" onclick="location = '/admin/brand/brandList/'; ">목록으로</button>
						</div>
					</div>
				</td>
			</tr>

		</table>
<?=form_close()?>

	</div>
</div>

<script>
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
		if ($(".addTR").length>1) {
			$(".addTR").last().remove();
		} else {
			alert("소개 항목은 기본 설정항목으로 삭제할 수 없습니다.");
		}
	}

}

</script>