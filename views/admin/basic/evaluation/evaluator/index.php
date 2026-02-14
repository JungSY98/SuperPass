<style>
table.mfTable  td {
	padding:8px 10px !important;
}
</style>

<div class="box">
	<div class="box-table">


		<div class="input-group">
			<span class="input-group-text">인원 추가 설정</span>
			<input type="text" name="addCnt" class="form-control onlyNumber">
			<span class="input-group-text">명</span>
			<button class="btn btn-success" type="button" onclick="return fnMake()">생성</button>
		</div>


		<br>

		<h4>생성된 심사원 리스트</h4>
		<table class="table mt20">
			<thead>
			<tr>
				<th class="text-center">심사원 이름</th>
				<th class="text-center">심사원 아이디</th>
				<th class="text-center">심사원 비번</th>
				<th class="text-center">관리</th>
			</tr>
			</thead>
			<tbody id="contList">
<? 
foreach($rList as $k => $rD) {
?>
				<tr id="tr<?=$rD['mem_id']?>" class="text-center">
					<td><?=$rD['mem_username']?></td>
					<td><?=$rD['mem_userid']?></td>
					<td><?=$rD['mem_adminmemo']?></td>
					<td class="col-sm-2">
						<button class="btn btn-success" type="button" onclick="return fnModify('<?=$rD['mem_id']?>')">수정</button>
						<button class="btn btn-danger" type="button" onclick="return fnDeleteResearcher('<?=$rD['mem_id']?>')">삭제</button>
					</td>
				</tr>
<? } ?>
			</tbody>
		</table>

	</div>
</div>


<div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="memoLabel">심사원 정보 수정</h1>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

		<div class="row">
			<div class="col-sm-3">심사원 이름</div>
			<div class="col-sm-9"><input type="text" class="form-control" name="rName"></div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-3">비번 설정</div>
			<div class="col-sm-9"><input type="text" class="form-control" name="rPW"></div>
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">창닫기</button>
        <button type="button" class="btn btn-primary" onclick="return fnChangeResearcher()">저장하기</button>
      </div>
    </div>
  </div>
</div>



<script>
var mem_id = "";
function fnMake() {
	if ($("input[name=addCnt]").val()=="") {
		alert("생성할 인원 수를 입력하세요");
		$("input[name=addCnt]").focus();
		return false;
	} else {
		var cnt = $("input[name=addCnt]").val();
		if (confirm(cnt+"명을 생성하시겠습니까?")) {
			$.ajax({
				url: "/admin/evaluation/evaluator/ajaxMakeResearcher/",
				type: "POST",
				dataType: "text",
				data: {
					'cnt': cnt,
					'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
				},
				success: function(data){
					alert("생성되었습니다.");
					location.reload();
				}
			});
		}
	}
}
function fnModify(no) {
	mem_id = no;
	var name = $("#tr"+no).find("td").eq(0).html();
	var pw = $("#tr"+no).find("td").eq(2).html();
	$("input[name=rName]").val(name);
	$("input[name=rPW]").val(pw);
	$("#modifyModal").modal("show");
}

function fnChangeResearcher() {
	var name = $("input[name=rName]").val();
	var pw = $("input[name=rPW]").val();
	if (confirm("정말 수정 하시겠습니까?")) {
		$.ajax({
			url: "/admin/evaluation/evaluator/ajaxChangeResearcher/",
			type: "POST",
			dataType: "text",
			data: {
				'name': name,
				'pw': pw,
				'mem_id': mem_id,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				alert("수정되었습니다.");
				location.reload();
			}
		});
	}
}

function fnDeleteResearcher(no) {
	if (confirm("정말 삭제 하시겠습니까?")) {
		$.ajax({
			url: "/admin/evaluation/evaluator/ajaxDeleteResearcher/",
			type: "POST",
			dataType: "text",
			data: {
				'mem_id': no,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				alert("삭제되었습니다.");
				location.reload();
			}
		});
	}
}




$(".onlyNumber").keypress(function(event) {
	//console.log('keypress');
	// Allow only backspace and delete
	if ( event.keyCode == 46 || event.keyCode == 8 ) {
		// let it happen, don't do anything
	} else {
		// Ensure that it is a number and stop the keypress
		if (event.keyCode >= 48 && event.keyCode <= 57) {
			// pass
		} else {
			event.preventDefault(); 
		}   
	}
});
$(".onlyNumber").keyup(function(event) {
	//console.log('keyup');
	// Allow only backspace and delete
	if ( event.keyCode == 46 || event.keyCode == 8 ) {
		// let it happen, don't do anything
	} else {
		// Ensure that it is a number and stop the keypress
		if (event.keyCode >= 48 && event.keyCode <= 57) {
			// pass
		} else if (event.keyCode >= 96 && event.keyCode <= 105) {
			// pass
		} else {
			event.preventDefault(); 
		}   
	}
});
$(".onlyNumber").keydown(function(event) {
	//console.log(event.keyCode);
	// Allow only backspace and delete
	if ( event.keyCode == 46 || event.keyCode == 8 ) {
		// let it happen, don't do anything
	} else {
		// Ensure that it is a number and stop the keypress
		if (event.keyCode >= 48 && event.keyCode <= 57) {
			// pass
		} else if (event.keyCode >= 96 && event.keyCode <= 105) {
			// pass
		} else {
			event.preventDefault(); 
		}   
	}
});
</script>