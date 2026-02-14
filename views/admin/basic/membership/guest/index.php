<link rel="stylesheet" type="text/css" href="/assets/datatables/datatables.min.css"/>
<script type="text/javascript" src="/assets/datatables/datatables.min.js"></script>

<div class="box">
	<div class="box-header">

		<div class="table-responsive">
		<table class="table" id="sdfTable">
			<thead>
			<tr class="text-center">
				<th>등록일</th>
				<th>성명(본인)</th>
				<th>소속</th>
				<th>생년월일</th>
				<th>성별</th>
				<th>연락처</th>
				<th>이메일 주소</th>
				<th>방문목적</th>
				<th>기타</th>
				<th>승인된멤버십</th>
				<th>삭제</th>
			</tr>
			</thead>
			<tbody>
<? foreach($usageGuestD as $k => $uD) { ?>
			<tr id="tr<?=$uD['no']?>">
				<td><?=$uD['useWhen']?> <?=$uD['useTimeS']?></td>
				<td><?=$uD['userName']?></td>
				<td><?=$uD['userCompany']?></td>
				<td><?=$uD['userBirth']?></td>
				<td><?=$uD['userGender']!==""? $uD['userGender']=="M" ? "남" : "여" : "-"?></td>
				<td><?=str_replace("-", "", $uD['userPhone'])?></td>
				<td><?=$uD['userEmail']?></td>
				<td><?=$uD['propose']?></td>
				<td><?=$uD['userEtc']?></td>
				<td style="width:200px;">
					<div class="input-group">
						<input type="text" class="form-control" name="companionName[<?=$uD['no']?>]" id="cnm_<?=$uD['no']?>" value="<?=$uD['companionName']?>">
						<button class="btn btn-outline-secondary" onclick="return fnChgCompanionName('<?=$uD['no']?>')">변경</button>
					</div>
				</td>
				<td><button class="btn btn-danger" onclick="return fnDelGuestUsage('<?=$uD['no']?>')">삭제</button></td>
			</tr>
<? } ?>
			</tbody>
		</table>
		</div>

	</div>
</div>

<script>
$(document).ready(function() {
	$(".box").parent().parent().find(".container").css("max-width", "100%");
	var table = $('#sdfTable').DataTable( {
		fixedColumns:{
			left: 2
		},
		ordering:  false,
		lengthMenu: [50, 25, 10],
	});
});
function fnDelGuestUsage(no) {
	if (confirm("정말 삭제하시겠습니까?")) {
		$.ajax({
			url: "/admin/membership/guest/ajaxDelRegistration/",
			type: "POST",
			dataType: "html",
			data: {
				'no' : no,
				'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
			},
			success: function(data){
				if (data=='OK') {
					alert("삭제 되었습니다.");
					$("#tr"+no).remove();
				} else {
					alert("문제가 발생하였습니다. 다시 시도하여 주세요");
				}
			}
		});
	}
}
function fnChgCompanionName(no) {
	var chgName = $("#cnm_"+no).val();
	if (confirm(chgName+"으로 정말 변경하시겠습니까?")) {
		$.ajax({
			url: "/admin/membership/guest/ajaxChgCname/",
			type: "POST",
			dataType: "html",
			data: {
				'no' : no,
				'cName' : chgName,
				'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
			},
			success: function(data){
				if (data=='OK') {
					alert("수정 되었습니다.");
				} else {
					alert("문제가 발생하였습니다. 다시 시도하여 주세요");
				}
			}
		});
	}
}
</script>