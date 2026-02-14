<div class="container">

	<div class="card">
		<div class="card-header d-flex">
<? /* 
			<select name="year" class="form-control w-50" onchange="location = '/admin/store/branchList/?viewYear='+this.value; ">
				<option value="">연도를 선택하세요</option>
				<option value="2025" <?=$viewYear=='2025' ? "selected" : ""?>>2025</option>
			</select>
*/ ?>
			<button class="btn btn-dark ms-auto" onclick="location = '/admin/store/branchList/form/'; ">추가</button>
		</div>

		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="col-1 text-center">번호</th>
						<th class="col-5">대분류 Store 정보</th>
						<th>GPS</th>
						<th class="text-center" style="width:105px;">관리</th>
					</tr>
				</thead>
				<tbody>
<? foreach($branchD as $k => $sD) {?>
					<tr>
						<td class="text-center"><?=$sD['no']?></td>
						<td>
							<?=$sD['sNameKR']?> / <?=$sD['sNameEN']?><hr style="margin:5px 0px;">
							<?=$sD['sAddr1KR']?> <?=$sD['sAddr2KR']?>
						</td>
						<td><?=$sD['mapLat']?> / <?=$sD['mapLng']?></td>
						<td>
							<div class="btn-group">
								<button class="btn btn-sm btn-success" onclick="location = '/admin/store/branchList/form/<?=$sD['no']?>/'; ">수정</button>
								<button class="btn btn-sm btn-danger" onclick="return fnDelSpot('<?=$sD['no']?>')">삭제</button>
							</div>
						</td>
					</tr>
<? } ?>
				</tbody>
			</table>
		</div>
	</div>

</div>



<script>
function fnDelSpot (no) {
	if (confirm("정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다.")) {
		$.ajax({
			url: "/admin/store/branchList/ajaxDelBranch/",
			type: "POST",
			dataType: "html",
			data: {
				'no': no,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				alert(data);
				location.reload();
			}
		});
	}
}
</script>