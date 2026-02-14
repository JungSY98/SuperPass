<div class="row">
	<div class="col-sm-12">

		<div class="input-group mb-4">
			<a href="/admin/register/applyBuyer/dnList/" class="btn btn-success">전체 리스트 다운</a>
		</div>

		<div class="table-responsive">
		<table class="table">
			<tr>
				<th class="text-center">구분</th>
				<th class="text-center">이름</th>
				<th class="text-center">기본정보</th>
				<th class="text-center">추가정보</th>
				<th class="text-center">등록정보</th>
				<th class="text-center">상태</th>
				<th></th>
			</tr>
<? foreach($applyD as $k => $aD) { ?>
			<tr>
				<td class="text-center"><?=$aD['pType']?></td>
				<td class="text-center"><?=$aD['name']?></td>
				<td class="text-center"><?=$aD['email']?> / <?=$aD['phone']?></td>
				<td><?=$aD['company']?> / <?=$aD['comAddr']?> / <?=$aD['comTel']?></td>
				<td class="text-center"><?=$aD['regIP']?><br><?=$aD['regDate']?></td>
				<td class="text-center">
					<div class="input-group">
						<button type="button" id="btnStatus_<?=$aD['no']?>" class="btn <?=$btnColor[$aD['status']]?>"><?=$aD['status']?></button>
						<select name="chgStatus" class="form-control" onchange="return fnSetStatus2('<?=$aD['no']?>', this.value)">
							<option value="">변경</option>
							<option value="접수">접수</option>
							<option value="허용">허용</option>
							<option value="반려">반려</option>
						</select>
					</div>
				</td>
				<td class="text-center">
					
					<a href="/admin/register/applyBuyer/form/<?=$aD['no']?>/" class="btn btn-secondary">상세</a>

				</td>
			</tr>
<? } ?>
		</table>
		</div>
	</div>
</div>

<script>
function fnSetStatus2(no, value) {
	if (value!="" && confirm(value+" 상태로 변경하시겠습니까?")) {
		$.ajax({
			url: "/admin/register/applyBuyer/ajaxSetStatus/",
			type: "POST",
			dataType: "html",
			data: {
				'value': value,
				'no': no,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				alert(data);
				if (value=='허용') {
					$("#btnStatus_"+no).removeClass("btn-danger, btn-secondary").addClass("btn-success").html(value);
				} else if (value=='반려') {
					$("#btnStatus_"+no).removeClass("btn-success, btn-secondary").addClass("btn-danger").html(value);
				} else if (value=='접수') {
					$("#btnStatus_"+no).removeClass("btn-success, btn-danger").addClass("btn-secondary").html(value);
				}
			}
		});
	}
}
</script>