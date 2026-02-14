<style>
table.mfTable  td {
	padding:8px 10px !important;
}
</style>

<div class="box">
	<div class="box-table">



  <!-- Nav tabs -->
  <ul class="nav nav-tabs mb-3" role="tablist">
    <li class="nav-item" role="presentation"><a href="/admin/site/apply2023/?viewCate=&status=<?=$status?>" role="tab" class="nav-link <?=$viewCate=='' ? ' active' : ''?> "style="font-size:20px;">전체보기</a></li>
	<li class="nav-item" role="presentation"><a href="/admin/site/apply2023/?viewCate=product&status=<?=$status?>" class="nav-link <?=$viewCate=='product' ? ' active' : ''?>" role="tab" style="font-size:20px;" >제품</a></li>
    <li class="nav-item" role="presentation"><a href="/admin/site/apply2023/?viewCate=brand&status=<?=$status?>" role="tab" class="nav-link <?=$viewCate=='brand' ? ' active' : ''?>"  style="font-size:20px;" >브랜드</a></li>
    <li class="nav-item" role="presentation"><a href="/admin/site/apply2023/?viewCate=uxui&status=<?=$status?>" role="tab" class="nav-link <?=$viewCate=='uxui' ? ' active' : ''?> "style="font-size:20px;">UXUI</a></li>

  </ul>

		<div class="row mb30 mt30">
<? foreach($cntArea as $k => $v) { ?>
			<div class="col-sm-2">
				<div class="input-group">
					<span class="input-group-addon">
						<?=$k?>
					</span>
					<input type="text" class="form-control" name="cnt" value="<?=$v?>">
				</div>
			</div>
<? } ?>
		</div>
		<div class="input-group-btn mb30">
			<a href="/admin/site/apply2023/dnList/?year=<?=$year?>" class="btn btn-success">전체 리스트 다운</a>
			<a href="/admin/site/apply2023/dnList/?cate=product&status=<?=$status?>&year=<?=$year?>" class="btn btn-info">제품 리스트 다운 (<?=element('제품', $cntD)?>)</a>
			<a href="/admin/site/apply2023/dnList/?cate=brand&status=<?=$status?>&year=<?=$year?>" class="btn btn-info">브랜드 리스트 다운 (<?=element('브랜드', $cntD)?>)</a>
			<a href="/admin/site/apply2023/dnList/?cate=uxui&status=<?=$status?>&year=<?=$year?>" class="btn btn-info">UXUI 리스트 다운 (<?=element('UX·UI', $cntD)?>)</a>
		</div>




		<div class="table-responsive mt30">
		<table class="table mfTable" id="mfTable">
			<thead>
			<tr>
				<th class="text-center">번호</th>
				<th class="text-center">분류<br>프로젝트명<br>업체</th>
				<th class="text-center">대표,담당자</th>
				<th class="text-center">관리</th>
			</tr>
			</thead>
			<tbody>
<? foreach($applyD as $k => $aD) { ?>
			<tr>
				<td class="text-center"><?=count($applyD)-$k?></td>
				<td class="text-center">
					[<?=$aD['applyCategory']?>]<br>
					<?=$aD['projectName']?><br>
					<?=element('com1Name', element('detailD', $aD))?> X <?=element('com2Name', element('detailD', $aD))?>
				</td>
				<td class="text-center">
					중소기업 대표 : <?=element('com1RepresentName', element('detailD', $aD))?> _ <?=element('com1RepresentPhone', element('detailD', $aD))?><br>
					디자인기업 대표 : <?=element('com2RepresentName', element('detailD', $aD))?>_ <?=element('com2RepresentPhone', element('detailD', $aD))?><br>
					디자인기업 담당자 : <?=element('com2ManagerName', element('detailD', $aD))?> _ <?=element('com2ManagerPhone', element('detailD', $aD))?><br>
					</div>
				</td>
				<td class="text-center">
					<?=$aD['regDate']?><br><?=$aD['regIP']?><br>
					<a href="/admin/site/apply2023/form/<?=$aD['no']?>" class="btn btn-sm btn-success">보기</a>
					<a href="/admin/site/apply2023/deleteData/<?=$aD['no']?>" class="btn btn-sm btn-danger" onclick="return confirm('정말 삭제하시겠습니까?\n\n한번 삭제한 자료를 복구 불가능합니다.')">삭제</a>

					<button type="button" class="btn btn-sm btn-<?=$aD['memo'] ? 'danger' : 'secondary'?>" onclick="fnViewMemo('<?=$aD['no']?>')">메모</button>

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
		lengthMenu: [100, 50, 40, 30, 20, 10],
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




<div class="modal fade" id="viewMemoModal" tabindex="-1" role="dialog" aria-labelledby="viewMemoModalLabel">
	<div class="modal-dialog dialog-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">관련 메모</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<textarea id="comMemo" class="form-control per100" rows="10"></textarea>
				<input type="hidden" id="viewNoComMemo" name="viewNoComMemo" value="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">창닫기</button>
				<button type="button" class="btn btn-primary" onclick="return fnSaveMemo()">저장하기</button>
			</div>
		</div>
	</div>
</div>
