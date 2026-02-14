<div class="card">
	<div class="card-header d-flex">
		<button class="btn btn-dark ms-auto" onclick="location = '/admin/product/productList/form/'; ">추가</button>
	</div>
	<div class="card-body">
		<div class="div-responsive">
			<table class="table table-hover">
				<thead>
				<tr>
					<th class="col-1 text-center">번호</th>
					<th>기업</th>
					<th>연도</th>
					<th>제품명</th>
					<th class="col-1 text-center">관리</th>
				</tr>
				</thead>
				<tbody>
<? foreach($productD as $k => $pD){ ?>
				<tr>
					<td class="col-1 text-center"><?=$pD['no']?></td>
					<td><?=$pD['brandName']?></td>
					<td><?=$pD['year']?></td>
					<td><?=$pD['pNameKR']?> _ <?=$pD['pNameEN']?>
<? if ($pD['fileName']) { ?>
						<br>
						<img src="/uploads/product/<?=$pD['fileName']?>" width=150>
<? } ?>
					</td>
					<td class="col-1 text-center">
						<div class="input-group w-100">
							<button class="btn btn-sm btn-success" onclick="location = '/admin/product/productList/form/<?=$pD['no']?>/'; ">수정</button>
							<button class="btn btn-sm btn-danger" onclick="return fnDelProduct('<?=$pD['no']?>')">삭제</button>
						</div>
					</td>
				</tr>
<? } ?>
				</tbody>
			</table>


	</div>
</div>

<script>
function fnDelProduct(no) {
	if (confirm("정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다.")) {
		$.ajax({
			url: "/admin/product/productList/ajaxDelProduct/",
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