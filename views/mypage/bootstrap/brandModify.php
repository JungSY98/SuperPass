<div class="container">

	<div class="row">
		<div class="col-sm-3 sticky-top">

			<?=$menuD?>

		</div>
		<div class="col-sm-9">
			<h5 class="modifyContentTitle">브랜드 정보 수정</h5>

			<table class="table">
				<tr>
					<th class="col-sm-2">연락처</th>
					<td><input type="text" name="bizTel" class="form-control" placeholder="연락처를 입력하여 주세요"  value="<?=element("bizTel", $brandD)?>"></td>
				</tr>
				<tr>
					<th>이메일</th>
					<td><input type="text" name="bizEmail" class="form-control" placeholder="이메일 주소를 입력하여 주세요"  value="<?=element("bizEmail", $brandD)?>"></td>
				</tr>
				<tr>
					<th>홈페이지 / SNS</th>
					<td>
						<div class="input-group mb10">
							<span class="input-group-text">홈페이지</span>
							<input type="text" name="bWebsite" class="form-control" placeholder="기업 홈페이지를 입력하여 주세요"  value="<?=element("bWebsite", $brandD)?>">
						</div>
						<div class="input-group mb10">
							<span class="input-group-text">인스타</span>
							<input type="text" name="bSNS1" class="form-control" placeholder="기업 인스타를 입력하여 주세요"  value="<?=element("bSNS1", $brandD)?>">
						</div>
						<div class="input-group mb10">
							<span class="input-group-text">페이스북</span>
							<input type="text" name="bSNS2" class="form-control" placeholder="기업 페이스북을 입력하여 주세요"  value="<?=element("bSNS2", $brandD)?>">
						</div>
						<div class="input-group">
							<span class="input-group-text">블로그</span>
							<input type="text" name="bSNS3" class="form-control" placeholder="기업 블로그를 입력하여 주세요"  value="<?=element("bSNS3", $brandD)?>">
						</div>
						<div class="input-group">
							<span class="input-group-text">기타</span>
							<input type="text" name="bSNS4" class="form-control" placeholder="기타 SNS를 입력하여 주세요"  value="<?=element("bSNS4", $brandD)?>">
						</div>
					</td>
				</tr>
				<tr>
					<th>브랜드소개 (국문)</th>
					<td>
						<textarea name="brandKR" class="form-control" rows="7"><?=element("1", element("0", element("addValue", $brandD)))?></textarea>
					</td>
				</tr>
				<tr>
					<th>브랜드소개 (영문)</th>
					<td>
						<textarea name="brandEN" class="form-control" rows="7"><?=element("1", element("0", element("addValueEn", $brandD)))?></textarea>
					</td>
				</tr>
				<tr>
					<th></th>
					<td><button class="btn btn-success w-100" onclick="return fnSaveChange()">저장 하기</button></td>
				</tr>
			</table>


		</div>
	</div>
</div>


<script>
function fnSaveChange() {

	if (confirm("정말 변경하시겠습니까?")) {

		$.ajax({
			url: "/mypage/ajaxChangeBrandData/",
			type: "POST",
			dataType: "html",
			data: {
				'brandD': '<?=$brandD["no"]?>',
				'mbID': '<?=$this->member->item("mem_userid")?>',
				'tel' : $("input[name=bizTel]").val(),
				'email' : $("input[name=bizEmail]").val(),
				'website' : $("input[name=bWebsite]").val(),
				'sns1' : $("input[name=bSNS1]").val(),
				'sns2' : $("input[name=bSNS2]").val(),
				'sns3' : $("input[name=bSNS3]").val(),
				'sns4' : $("input[name=bSNS4]").val(),
				'brandKR' : $("textarea[name=brandKR]").val(),
				'brandEN' : $("textarea[name=brandEN]").val(),
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				alert(data);
			}
		});

	}

}
</script>