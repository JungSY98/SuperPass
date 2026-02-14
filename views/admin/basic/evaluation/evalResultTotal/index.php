
</div>
<div class="container-fluid">

<div class="box">
	<div class="box-header">



		<div class="box-table-header">
			<ul class="nav nav-tabs clearfix pt-2 mb-4 d-flex">
				<li class="nav-item">
					<a class="nav-link<?=$viewCate=='' ? ' active"aria-current="page' : ''?>" href="/admin/evaluation/evalResultTotal/?viewCate=">전체보기</a>
				</li>
				<li class="nav-item">
					<a class="nav-link<?=$viewCate=='제품' ? ' active"aria-current="page' : ''?>" href="/admin/evaluation/evalResultTotal/?viewCate=제품">제품</a>
				</li>
				<li class="nav-item">
					<a class="nav-link<?=$viewCate=='브랜드' ? ' active"aria-current="page' : ''?>" href="/admin/evaluation/evalResultTotal/?viewCate=브랜드">브랜드</a>
				</li>
				<li class="nav-item">
					<a class="nav-link<?=$viewCate=='UX·UI' ? ' active"aria-current="page' : ''?>" href="/admin/evaluation/evalResultTotal/?viewCate=UX·UI">UX·UI</a>
				</li>
				<li class="nav-item">
					<a class="nav-link<?=$viewCate=='기타' ? ' active"aria-current="page' : ''?>" href="/admin/evaluation/evalResultTotal/?viewCate=기타">기타</a>
				</li>
				<li class="nav-item flex-row flex-wrap ms-md-auto"><p class="btn btn-primary btn-sm" onclick="fnPrint()">엑셀다운</p></li>
			</ul>
		</div>



		<div class="table-responsive">
		<table class="table table-hover table-striped " id="tableTotal">
			<thead>
			<tr>
				<th class='text-center'>No</th>
				<th class='text-center'>과제명</th>
				<th class="text-center">분류</th>
<? foreach($view['mList'] as $k => $mD) { ?>
				<th class='text-center'><?=$mD['mem_userid']?></th>
<? } ?>
				<th class='text-center' style="background-color:#b7dee8;">소계</th>
				<th class='text-center'>최고점</th>
				<th class='text-center'>최저점</th>
				<th class='text-center'>조정합계</th>
				<th class='text-center' style="background-color:#ffff00;">최종점수</th>

			</tr>
			</thead>
			<tbody>
<?
$canSign = true;
$sSign = "";
$cnt = array();
if (!empty($data)) {
	foreach ($data as $k => $result) {
		$total = 0;
		if (isset($cnt[$result['applyCategory']])) $cnt[$result['applyCategory']]++;
		else $cnt[$result['applyCategory']] = 1;
?>
			<tr>
				<td class='text-center'><?=$viewCate != "" ? $cnt[$result['applyCategory']] : count($data)-$k?></td>
				<td class='text-center'>
					<a href="javascript:;" onclick="return fnStartEvaluation('<?=$result['applyNo']?>', 1)">
					<?=$result['projectName']?>
					</a>
				</td>
				<td class="text-center"><?=$result['applyCategory']?></td>

<? foreach($view['mList'] as $k => $mD) {
	$bgColor = $result['maxPanel']==$mD['mem_userid'] ? "background-color:red;" : "";
	$bgColor = $result['minPanel']==$mD['mem_userid'] ? "background-color:yellow;" : $bgColor;
	$total += element($mD['mem_userid'],$result);
?>
				<td style="<?=$bgColor?>"><?=element($mD['mem_userid'],$result)?></td>
<? } ?>
				<td style="background-color:#b7dee8;"><?=$total?></td>
				<td><?=$result['panelMAX']?></td>
				<td><?=$result['panelMIN']?></td>
				<td><?=$total-$result['panelMAX']-$result['panelMIN']?></td>
				<td style="background-color:#ffff00;"><?=number_format(($total-$result['panelMAX']-$result['panelMIN'])/(count($view['mList'])-2),1)?></td>
			</tr>
<? } } ?>
			</tbody>
			<tfoot>

			</tfoot>
		</table>
		</div>

	</div>
</div>

<link rel="stylesheet" type="text/css" href="/assets/datatables/datatables.min.css"/>
<script type="text/javascript" src="/assets/datatables/datatables.min.js"></script>

<iframe name="print_iframe" id="print_iframe" src="" width="100%" height="0" style="display:;"></iframe>

<script>
function fnPrint() {
	$("#print_iframe").focus();
	frames["print_iframe"].footer = '';
	frames["print_iframe"].focus();
	$("#print_iframe").attr("src", '/admin/evaluation/evalResultTotal/prints/?year=<?=$year?>&times=<?=$times?>&viewCate=<?=$viewCate?>');
	//frames["print_iframe"].print();
}
$(document).ready(function() {

	var table = $('#tableTotal').DataTable({
		//ordering:  false,
		lengthMenu: [200, 100, 50, 40, 30, 20, 10],
	});

});



function fnGetExpectResult(applyNo) {
	$.ajax({
		url: "/apply/ajaxGetUploadPhoto/",
		type: "POST",
		dataType: "html",
		data: {
			'type': 'expectResult',
			'applyNo': applyNo,
			'btn': 'hidden',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			$('#ulExpectResult').html('');
			fnCallMasonry('ulExpectResult', data);
			//$("#ulImageExplain").html(data);
		}
	});
}
function fnGetCenceptExplain(applyNo) {
	$.ajax({
		url: "/apply/ajaxGetUploadPhoto/",
		type: "POST",
		dataType: "html",
		data: {
			'type': 'conceptExplain',
			'applyNo': applyNo,
			'btn': 'hidden',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			$('#ulConceptExplain').html('');
			fnCallMasonry('ulConceptExplain', data);
			//$("#ulImageExplain").html(data);
		}
	});
}
function fnGetImgExplain(applyNo) {
	$.ajax({
		url: "/apply/ajaxGetUploadPhoto/",
		type: "POST",
		dataType: "html",
		data: {
			'type': 'imgExplain',
			'applyNo': applyNo,
			'btn': 'hidden',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			$('#ulImageExplain').html('');
			fnCallMasonry('ulImageExplain', data);
			//$("#ulImageExplain").html(data);
		}
	});
}

function fnCallMasonry(id, data) {
	var $content = $(data);
	var $masonry = $('#'+id).append( $content ).masonry( 'appended', $content ).masonry({
		// options
		itemSelector: '.grid-item',
		columnWidth: '.grid-item',
		percentPosition: true
	});
	var timerId = setInterval(function() { $masonry.masonry('layout') }, 1000);
	setTimeout(function() { clearInterval(timerId); }, 10000);
}

var viewNo;
var viewNoLast;
function fnStartEvaluation(no, type, idx=0) {
	viewNo = no;
	$.ajax({
		url: "/evaluation/ajaxGetEvaluation/",
		type: "POST",
		dataType: "html",
		data: {
			'no': no,
			'type': type,
			'idx': idx,
			'height': $(window).height(),
			'mem_id': '<?=$this->member->item("mem_userid")?>',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){

			var result = $.parseJSON(data);
			if (result.stat == 'false') {
				alert(result.msg);
			} else if (result.stat == 'true') {
				$(".itemEval").removeClass("bg-warning");
				if (type==1 || type==2) {
					$(".itemEval").eq(0).addClass("bg-warning");
					$(".itemEval").eq(1).addClass("bg-warning");
					$(".itemEval").eq(2).addClass("bg-warning");
				} else if (type==3 || type==4) {
					$(".itemEval").eq(3).addClass("bg-warning");
					$(".itemEval").eq(4).addClass("bg-warning");
				}
				$("#evaluationLabel").html(result.title+ " >> 심사평가");
				$("#evalMenu").html(result.menu);
				$("#evalForm").html(result.htmlForm);
				if (viewNo != viewNoLast) {
					var e1 = result.evalD.e1 != 0 ? result.evalD.e1 : "";
					$("#itemEval1").val(e1);
					var e2 = result.evalD.e2 != 0 ? result.evalD.e2 : "";
					$("#itemEval2").val(e2);
					var e3 = result.evalD.e3 != 0 ? result.evalD.e3 : "";
					$("#itemEval3").val(e3);
					var e4 = result.evalD.e4 != 0 ? result.evalD.e4 : "";
					$("#itemEval4").val(e4);
					var e5 = result.evalD.e5 != 0 ? result.evalD.e5 : "";
					$("#itemEval5").val(e5);
					$("#evalComment").val(result.evalD.comment);
					viewNoLast = no;
				}
				$("#evalModal").modal("show");
				$(".btnEvalTop").removeClass("btn-siteprimary").addClass("btn-secondary");
				$("#btnT"+type).addClass("btn-siteprimary").removeClass("btn-secondary");
				$("#evalForm input, #evalForm textarea").attr("disabled", true);
				fnGetImgExplain(no);
				fnGetCenceptExplain(no);
				fnGetExpectResult(no);
			}
		}
	});
}

</script>


</div>
<div class="container">















<div class="modal fade" id="evalModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="evaluationLabel"></h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body pt-0">
				<div class="row">
					<div class="col-sm-12">
						<div class="container-fluid pt-3 pb-3 sticky-top" id="evalMenu">
						</div>
						<div class="container-fluid pt-3" id="evalForm">
						</div>
					</div>
					<div class="col-sm-3 d-none">
						<div class="container-fluid pt-3 pb-3 sticky-top">
								<h5>중소기업</h5>
							<div class="input-group mb-3">
								<span class="itemEval input-group-text col-sm-8">기업역량 & 사업화의지 (10)</span>
								<select class="form-control" id="itemEval1">
									<option value="">선택하세요</option>
									<option value="10">10</option>
									<option value="9">9</option>
									<option value="8">8</option>
									<option value="7">7</option>
									<option value="6">6</option>
								</select>
							</div>
							<div class="input-group mb-3">
								<span class="itemEval input-group-text col-sm-8">상품성 (20)</span>
								<select class="form-control" id="itemEval2">
									<option value="">선택하세요</option>
									<option value="20">20</option>
									<option value="18">18</option>
									<option value="16">16</option>
									<option value="14">14</option>
									<option value="12">12</option>
								</select>
							</div>
							<div class="input-group mb-3">
								<span class="itemEval input-group-text col-sm-8">사업화 가능성 & 활용성 (20)</span>
								<select class="form-control" id="itemEval3">
									<option value="">선택하세요</option>
									<option value="20">20</option>
									<option value="18">18</option>
									<option value="16">16</option>
									<option value="14">14</option>
									<option value="12">12</option>
								</select>
							</div>
							<h5>디자인기업</h5>


							<div class="input-group mb-3">
								<span class="itemEval input-group-text col-sm-8">기업역량 & 전문성 (20)</span>
								<select class="form-control" id="itemEval4">
									<option value="">선택하세요</option>
									<option value="20">20</option>
									<option value="18">18</option>
									<option value="16">16</option>
									<option value="14">14</option>
									<option value="12">12</option>
								</select>
							</div>


							<div class="input-group mb-3">
								<span class="itemEval input-group-text col-sm-8">디자인개발 수행계획 적절성 (30)</span>
								<select class="form-control" id="itemEval5">
									<option value="">선택하세요</option>
									<option value="30">30</option>
									<option value="27">27</option>
									<option value="24">24</option>
									<option value="21">21</option>
									<option value="18">18</option>
								</select>
							</div>




							<h5>심사의견</h5>
							<textarea class="form-control w-100 mb-3" rows="7" id="evalComment"></textarea>

						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-danger" style="width:calc(100% - 88px)" id="btnSaveEvaluation">평가하기</button> -->
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">창닫기</button>
			</div>
		</div>
	</div>
</div>

