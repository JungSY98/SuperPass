<div class="container">

	<div class="row">
		<div class="col-sm-3 sticky-top">

			<?=$menuD?>

		</div>
		<div class="col-sm-9">
			<h5 class="modifyContentTitle">제품 정보 수정</h5>

			<table class="table">
<? foreach($productD as $k => $pD) { ?>
				<tr>
					<th class="p-3" style="background-color:#ecc;" colspan=2><?=$pD['pNameKR']?> / <?=$pD['pNameEN']?></th>
				</tr>
				<tr>
					<th class="col-sm-3">제품소개  (국문)</th>
					<td>
						<textarea name="explainKR[]" class="form-control explainKR" rows="7" data-brandno="<?=$pD['no']?>"><?=element("pDescKR", $pD)?></textarea>
					</td>
				</tr>
				<tr>
					<th>제품소개  (영문)</th>
					<td>
						<textarea name="explainEN[]" class="form-control explainEN" rows="7" data-brandno="<?=$pD['no']?>"><?=element("pDescEN", $pD)?></textarea>
					</td>
				</tr>
<? } ?>
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
		var chgD = new Array();
		for(var i=0;i<$(".explainKR").length;i++) {
			chgD.push({
				"pKey" : $(".explainKR").eq(i).attr("data-brandno"),
				"chgDataKR" : $(".explainKR").eq(i).val(),
				"chgDataEN" : $(".explainEN").eq(i).val()}
			);
		}

		$.ajax({
			url: "/mypage/ajaxChangeProductData/",
			type: "POST",
			dataType: "html",
			data: {
				'brandD': '<?=$this->member->item("mem_brand")?>',
				'mbID': '<?=$this->member->item("mem_userid")?>',
				'chgD': chgD,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				//alert(data);
			}
		});

	}

}
</script>