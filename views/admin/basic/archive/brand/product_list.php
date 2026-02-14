<style>
table.mfTable  td {
	padding:8px 10px !important;
}
</style>

<div class="box">
	<div class="box-table">





		<div class="table-responsive mt30">
		<table class="table mfTable" id="mfTable">
			<thead>
			<tr>
				<th class="text-center">분류</th>
				<th class="text-center">대표사진</th>
				<th class="text-center">중소기업 X 디자인기업</th>
				<th class="text-center">결과물</th>
				<th class="text-center">우수 컨소시엄</th>
				<th class="text-center">관리</th>
			</tr>
			</thead>
			<tbody>
<? foreach($bizD as $k => $bD) { ?>
			<tr>
				<td class="text-center"><?=$bD['applyCategory']?></td>
				<td class="text-center"><img src="/uploads/apply/2023/archive/<?=element("fileName", $bD)?>" style="width:160px;"></td>
				<td class="text-center"><?=$bD['projectName']?></td>
				<td class="text-center"><?=$bD['title']?></td>
				<td class="text-center"><?=$bD['isBest']?></td>
				<td class="text-center">
					<a href="/admin/archive/brand/form/<?=$bD['no']?>" class="btn btn-sm btn-success">수정</a>
					<a href="/admin/archive/brand/deleteData/<?=$bD['no']?>" class="btn btn-sm btn-danger" onclick="return confirm('정말 삭제하시겠습니까?\n\n한번 삭제한 자료를 복구 불가능합니다.')">삭제</a>
				</td>
			</tr>
<? } ?>
			</tbody>
		</table>
		</div>

	</div>
</div>


<link rel="stylesheet" type="text/css" href="/assets/datatables/datatables.min.css"/>
<script type="text/javascript" src="/assets/datatables/datatables.min.js"></script>

<script>
var viewNo;
$(document).ready(function() {
	var table = $('#mfTable').DataTable({
		ordering:  false,
		lengthMenu: [100, 50, 25],
	});
});
$(document).keyup(function(e) {
	 if (e.key === "Escape") { // escape key maps to keycode `27`
		fnCloseEval();
	}
});
function fnViewFile(no) {
	viewNo = no;
	var comName = $("#comName"+no).html();
	var ceoName = $("#ceoName"+no).html();
	var comNo = $("#comNo"+no).html();
	var comType = $("#comType"+no).html();
	var comPhone = $("#comPhone"+no).html();
	$(".divEvaluation h2").html(comName+"  _ <span>[대표자: "+ceoName+"]  _ [사업자번호: "+comNo+"]  _ [업종/업태: "+comType+"]  _ [연락처: "+comPhone+"] </span> ")
	$.ajax({
		method: "POST",
		url: "/admin/site/apply2023/ajaxGetDocument/",
		data: {
			'no' : no,
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		}
	})
	.done(function( obj ) {
		var data = $.parseJSON(obj);
		//console.log(data);
		$("#divViewDocu1").html(data.file1+data.docu1);
		$("#divViewDocu2").html(data.file2+data.docu2);
		$(".bgBlack").fadeIn();
		$(".divEvaluation").fadeIn();
	});
}
function fnCloseEval() {
	$(".bgBlack").fadeOut();
	$(".divEvaluation").fadeOut();
}

function fnSetEval(act) {
	var msg = "정말 "+act+" 처리 하시겠습니까?";
	if (viewNo != '' && confirm(msg)) {
		$.ajax({
			method: "POST",
			url: "/admin/site/apply2023/ajaxSetStatus/",
			data: {
				'no' : viewNo,
				'act' : act,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			}
		})
		.done(function( obj ) {
			$("#btnStatus"+viewNo).html(act);
			if (act=='적격') {
				$("#btnStatus"+viewNo).removeClass("btn-success btn-danger btn-default").addClass("btn-success").html(act);
			} else if (act=='부적격') {
				$("#btnStatus"+viewNo).removeClass("btn-success btn-danger btn-default").addClass("btn-danger").html(act);
			} else if (act=='접수') {
				$("#btnStatus"+viewNo).removeClass("btn-success btn-danger btn-default").addClass("btn-default").html(act);
			}
			alert(obj);
			fnCloseEval();
		});
	}
}
function fnChgCategory(no, cate) {
	if (confirm(cate+" 분류로 변경하시겠습니까?")) {
		$.ajax({
			method: "POST",
			url: "/admin/site/apply2023/ajaxChgCategory/",
			data: {
				'no' : no,
				'cate' : cate,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			}
		})
		.done(function( obj ) {
			alert(obj);
			location.reload();
		});
	} else return false;
}
function fnChgStatus(setNo, act) {
	var msg = "정말 "+act+" 처리 하시겠습니까?";
	if (setNo != '' && confirm(msg)) {
		$.ajax({
			method: "POST",
			url: "/admin/site/apply2023/ajaxSetStatus/",
			data: {
				'no' : setNo,
				'act' : act,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			}
		})
		.done(function( obj ) {
			alert(obj);
		});
	}
}
function fnChgStatus2(setNo, act) {
	var msg = "정말 "+act+" 처리 하시겠습니까?";
	if (setNo != '' && confirm(msg)) {
		$.ajax({
			method: "POST",
			url: "/admin/site/apply2023/ajaxSetStatus2/",
			data: {
				'no' : setNo,
				'act' : act,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			}
		})
		.done(function( obj ) {
			alert(obj);
		});
	}
}
/*
		fixedColumns:{
			left: 3
		},
*/
</script>