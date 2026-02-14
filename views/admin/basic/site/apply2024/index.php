<style>
table.mfTable  td {
	padding:8px 10px !important;
}
</style>

<div class="box">
	<div class="box-table">



  <!-- Nav tabs -->
  <ul class="nav nav-tabs mb-3" role="tablist">
    <li class="nav-item" role="presentation"><a href="/admin/site/apply2024/?viewCate=&status=<?=$status?>" role="tab" class="nav-link <?=$viewCate=='' ? ' active' : ''?> "style="font-size:20px;">전체보기</a></li>
	<li class="nav-item" role="presentation"><a href="/admin/site/apply2024/?viewCate=제품&status=<?=$status?>" class="nav-link <?=$viewCate=='제품' ? ' active' : ''?>" role="tab" style="font-size:20px;" >제품</a></li>
    <li class="nav-item" role="presentation"><a href="/admin/site/apply2024/?viewCate=브랜드&status=<?=$status?>" role="tab" class="nav-link <?=$viewCate=='brand' ? ' active' : ''?>"  style="font-size:20px;" >브랜드</a></li>
    <li class="nav-item" role="presentation"><a href="/admin/site/apply2024/?viewCate=UX·UI&status=<?=$status?>" role="tab" class="nav-link <?=$viewCate=='UX·UI' ? ' active' : ''?> "style="font-size:20px;">UX·UI</a></li>
    <li class="nav-item" role="presentation"><a href="/admin/site/apply2024/?viewCate=기타&status=<?=$status?>" role="tab" class="nav-link <?=$viewCate=='기타' ? ' active' : ''?> "style="font-size:20px;">기타</a></li>

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
			<a href="/admin/site/apply2024/dnList/?year=<?=$year?>" class="btn btn-success">전체 리스트 다운</a>
			<a href="/admin/site/apply2024/dnList/?cate=제품&status=<?=$status?>&year=<?=$year?>" class="btn btn-info">제품 리스트 다운 (<?=element('제품', $cntD)?>)</a>
			<a href="/admin/site/apply2024/dnList/?cate=브랜드&status=<?=$status?>&year=<?=$year?>" class="btn btn-info">브랜드 리스트 다운 (<?=element('브랜드', $cntD)?>)</a>
			<a href="/admin/site/apply2024/dnList/?cate=UX·UI&status=<?=$status?>&year=<?=$year?>" class="btn btn-info">UXUI 리스트 다운 (<?=element('UX·UI', $cntD)?>)</a>
			<a href="/admin/site/apply2024/dnList/?cate=기타&status=<?=$status?>&year=<?=$year?>" class="btn btn-info">기타 리스트 다운 (<?=element('기타', $cntD)?>)</a>
		</div>




		<div class="table-responsive mt30">
		<table class="table mfTable" id="mfTable">
			<thead>
			<tr>
				<th class="text-center">번호</th>
				<th class="text-center">KeyNo/User ID</th>
				<th class="text-center">[분류] 프로젝트명<br>중소기업 X 디자인기업</th>
				<th class="text-center">대표,담당자</th>
				<th class="text-center">관리</th>
			</tr>
			</thead>
			<tbody>
<? foreach($applyD as $k => $aD) { ?>
			<tr>
				<td class="text-center"><?=count($applyD)-$k?></td>
				<td class="text-center"><?=$aD['no']?> / <?=$aD['userID']?></td>
				<td class="text-center">
					<div id="applyD_<?=$aD['no']?>">
					<span class="badge text-bg-dark float-start"><?=$aD['applyCategory']?></span> &nbsp; 
					<?=$aD['projectName']?><br>
					<?=element('com1Name', element('detailD', $aD))?> X <?=element('com2Name', element('detailD', $aD))?>
					</div>
					<button class="btn btn-sm btn-info w-100 mt-3" onclick="return fnAddFile('<?=$aD['no']?>')">첨부파일 추가</button>
				</td>
				<td class="text-center">

					<div class="row">
						<div class="col-lg-12 mb-2 pt-2">
							<button type="button" class="btn btn-sm btn-light w-100 btnPopover text-start2 ps-2"
									data-bs-toggle="popover" data-bs-placement="top"
									data-bs-custom-class="custom-popover"
									data-bs-title="중소기업 _ <?=element('com1Name', element('detailD', $aD))?>"
									data-bs-content="대표자 : <?=element('com1RepresentName', element('detailD', $aD))?> / <?=echoPhoneNumber(element('com1RepresentPhone', element('detailD', $aD)))?> / <?=element('com1RepresentEmail', element('detailD', $aD))?><br>담당자 : <?=element('com1ManagerName', element('detailD', $aD))?> / <?=echoPhoneNumber(element('com1ManagerPhone', element('detailD', $aD)))?> / <?=element('com1ManagerEmail', element('detailD', $aD))?>">
							중소기업 : <?=element('com1Name', element('detailD', $aD))?>
							</button>
						</div>
						<div class="col-lg-12">
							<button type="button" class="btn btn-sm btn-light w-100 btnPopover text-start2 ps-2"
									data-bs-toggle="popover" data-bs-placement="top"
									data-bs-custom-class="custom-popover"
									data-bs-title="디자인기업 _ <?=element('com2Name', element('detailD', $aD))?>"
									data-bs-content="대표자 : <?=element('com2RepresentName', element('detailD', $aD))?> / <?=echoPhoneNumber(element('com2RepresentPhone', element('detailD', $aD)))?> / <?=element('com2RepresentEmail', element('detailD', $aD))?><br>담당자 : <?=element('com2ManagerName', element('detailD', $aD))?> / <?=echoPhoneNumber(element('com2ManagerPhone', element('detailD', $aD)))?> / <?=element('com2ManagerEmail', element('detailD', $aD))?>">
							디자인기업 : <?=element('com2Name', element('detailD', $aD))?>
							</button>
						</div>
					</div>
				</td>
				<td class="text-center">
					<?=$aD['regDate']?><br>
					<?=$aD['saveDate']?><br>
					<?=$aD['submitDate']?><br>
					<?=$aD['regIP']?><br>
					<a href="javascript:viewFinal('<?=$aD['no']?>')" class="btn btn-sm btn-success">보기</a>
					<button type="button" class="btn btn-sm btn-<?=$aD['memo'] ? 'danger' : 'secondary'?>" type="button" onclick="fnViewMemo('<?=$aD['no']?>')">메모</button>
					<button type="button" class="btn btn-sm btn-<?=$aD['status']=='접수중' ? 'danger' : 'success'?>" type="button"><?=$aD['status']?></button>

					<button type="button" class="btn btn-sm btn-<?=$aD['status2']=='부적격' ? 'danger' : 'success'?>" type="button" id="btnStatus2_<?=$aD['no']?>" onclick="viewFinal('<?=$aD['no']?>')"><?=$aD['status2']?></button>

					<a href="/admin/site/apply2024/deleteData/<?=$aD['no']?>" class="btn btn-sm btn-danger" onclick="return confirm('정말 삭제하시겠습니까?\n\n한번 삭제한 자료를 복구 불가능합니다.')">삭제</a>
				</td>
			</tr>
<? } ?>
			</tbody>
		</table>
		</div>

	</div>
</div>



<!-- 파일 첨부 -->
<div class="modal fade" id="addFileModal" aria-labelledby="addFileModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-fullscreen">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="addFileLabel">파일 추가</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<iframe id="iframeAddFile" src="" frameborder="0" style="width:100%;"></iframe>
			</div>


			<div class="modal-footer">
				<button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" aria-label="Close">창닫기</button>
			</div>
		</div>
	</div>
</div>


<!-- 최종확인 -->
<div class="modal fade" id="viewFinalModal" aria-labelledby="viewFinalModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-fullscreen">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="viewFinalModalLabel">신청 내역 확인</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<iframe id="iframeViewFinal" src="" frameborder="0" style="width:100%;"></iframe>
			</div>


			<div class="modal-footer">
				<div class="input-group float-start"  style="width:250px;">
					<span class="input-group-text bg-danger" style="color:white;border:1px solid red">적격 여부</span>
					<select name="status2" id="selectStatus2" class="form-control" onchange="return fnSetStatus2(this.value)" style="border:1px solid red">
						<option value="">선택하세요</option>
						<option value="부적격">부적격</option>
						<option value="적격">적격</option>
					</select>
				</div>
				<button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" aria-label="Close">창닫기</button>
			</div>
		</div>
	</div>
</div>


<link rel="stylesheet" type="text/css" href="/assets/datatables/datatables.min.css"/>
<script type="text/javascript" src="/assets/datatables/datatables.min.js"></script>

<script>
var viewNo;
var viewFile;

$(document).ready(function() {
	const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
	const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl, {html:true, trigger:'click hover'})) // hover focus
});

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
const myModalEl = document.getElementById('viewFinalModal')
myModalEl.addEventListener('shown.bs.modal', event => {
	var h = $("#viewFinalModal").find(".modal-body").css("height");
	h = parseInt(h) - 40;
	$("#iframeViewFinal").css("height", h);
})
myModalEl.addEventListener('hidden.bs.modal', event => {
	$("#iframeViewFinal").attr("src", "");
})
const myModalEl2 = document.getElementById('addFileModal')
myModalEl2.addEventListener('shown.bs.modal', event => {
	var h = $("#addFileModal").find(".modal-body").css("height");
	h = parseInt(h) - 40;
	$("#iframeAddFile").css("height", h);
})
myModalEl2.addEventListener('hidden.bs.modal', event => {
	$("#iframeAddFile").attr("src", "");
})

function fnAddFile(no) {
	viewFile = no;
	$("#addFileLabel").html($("#applyD_"+no).html());
	$("#iframeAddFile").attr("src", "/admin/site/apply2024/manageFile/"+no+"/");
	$("#addFileModal").modal('show');

}

function fnSetStatus2(value) {
	//console.log(viewNo+" "+value);
	if (value!="" && confirm(value+" 상태로 변경하시겠습니까?")) {
		$.ajax({
			url: "/admin/site/apply2024/ajaxSetStatus/",
			type: "POST",
			dataType: "html",
			data: {
				'value': value,
				'no': viewNo,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				alert(data);
				if (value=='적격') {
					$("#btnStatus2_"+viewNo).removeClass("btn-danger").addClass("btn-success").html(value);
				} else if (value=='부적격') {
					$("#btnStatus2_"+viewNo).removeClass("btn-success").addClass("btn-danger").html(value);
				}
			}
		});
	}
}
function viewFinal(no) {
	viewNo = no;
	$.ajax({
		url: "/admin/site/apply2024/ajaxViewFinal/",
		type: "POST",
		dataType: "html",
		data: {
			'mem_id': '<?=$this->member->item("mem_userid")?>',
			'no': no,
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			var result = $.parseJSON(data);
			if (result.stat == 'true') {
				$("#iframeViewFinal").attr("src", "/admin/site/apply2024/viewFinal/"+no+"/");
				$("#viewFinalModal").modal("show");
				$("#selectStatus2").val(result.status2);
			} else if (result.stat == 'false') {
				alert($.parseJSON(result.msg));
			}
		}
	});
}
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
		url: "/admin/site/apply2024/ajaxGetDocument/",
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
			url: "/admin/site/apply2024/ajaxSetStatus/",
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
			url: "/admin/site/apply2024/ajaxChgCategory/",
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
			url: "/admin/site/apply2024/ajaxSetStatus/",
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
			url: "/admin/site/apply2024/ajaxSetStatus2/",
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
				<button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" aria-label="Close">창닫기</button>
				<button type="button" class="btn btn-primary" onclick="return fnSaveMemo()">저장하기</button>
			</div>
		</div>
	</div>
</div>
