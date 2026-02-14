<style>
table.mfTable  td {
	padding:8px 10px !important;
}
</style>

<div class="box">
	<div class="box-table">



  <!-- Nav tabs -->
  <ul class="nav nav-tabs mb30" role="tablist">
    <li role="presentation"<?=$viewCate=='기계금속' ? ' class="active"' : ''?>><a href="/admin/site/apply2023_2/?viewCate=기계금속&status=<?=$status?>" role="tab" style="font-size:20px;" >기계금속 (<?=element('기계금속', $cntD)?>)</a></li>
    <li role="presentation"<?=$viewCate=='인쇄' ? ' class="active"' : ''?>><a href="/admin/site/apply2023_2/?viewCate=인쇄&status=<?=$status?>" role="tab" style="font-size:20px;" >인쇄 (<?=element('인쇄', $cntD)?>)</a></li>
    <li role="presentation"<?=$viewCate=='주얼리' ? ' class="active"' : ''?>><a href="/admin/site/apply2023_2/?viewCate=주얼리&status=<?=$status?>" role="tab" style="font-size:20px;">주얼리 (<?=element('주얼리', $cntD)?>)</a></li>
	<li role="presentation"<?=$viewCate=='수제화' ? ' class="active"' : ''?>><a href="/admin/site/apply2023_2/?viewCate=수제화&status=<?=$status?>" role="tab" style="font-size:20px;">수제화 (<?=element('수제화', $cntD)?>)</a></li>

  </ul>

	<div class="input-group-btn mb30">
	<a href="/admin/site/apply2023_2/?viewCate=<?=$viewCate?>&status=접수" role="tab" class="btn btn-default" >접수 리스트 보기</a>
	<a href="/admin/site/apply2023_2/?viewCate=<?=$viewCate?>&status=적격" role="tab" class="btn btn-success">적격 리스트 보기</a>
	<a href="/admin/site/apply2023_2/?viewCate=<?=$viewCate?>&status=부적격" role="tab" class="btn btn-danger">부적격 리스트 보기</a>
	<a href="/admin/site/apply2023_2/dnAttachFile/?viewCate=<?=$viewCate?>" class="btn btn-default pull-right"><?=$viewCate?> 첨부파일 일괄다운</a>
	</div>

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
			<a href="/admin/site/apply2023_2/dnList/?year=<?=$year?>" class="btn btn-success">전체 리스트 다운</a>
			<a href="/admin/site/apply2023_2/dnList/?cate=기계금속&status=<?=$status?>&year=<?=$year?>" class="btn btn-info">기계금속 리스트 다운 (<?=element('기계금속', $cntD)?>)</a>
			<a href="/admin/site/apply2023_2/dnList/?cate=인쇄&status=<?=$status?>&year=<?=$year?>" class="btn btn-info">인쇄 리스트 다운 (<?=element('인쇄', $cntD)?>)</a>
			<a href="/admin/site/apply2023_2/dnList/?cate=주얼리&status=<?=$status?>&year=<?=$year?>" class="btn btn-info">주얼리 리스트 다운 (<?=element('주얼리', $cntD)?>)</a>
			<a href="/admin/site/apply2023_2/dnList/?cate=수제화&status=<?=$status?>&year=<?=$year?>" class="btn btn-info">수제화 리스트 다운 (<?=element('수제화', $cntD)?>)</a>
		</div>




		<div class="table-responsive mt30">
		<table class="table mfTable" id="mfTable">
			<thead>
			<tr>
				<th class="text-center">번호</th>
				<th class="text-center">분류</th>
				<th class="text-center">업체 정보</th>
				<th class="text-center thTel">연락처</th>
				<th class="text-center">신청금액</th>
				<th class="text-center">신청분류</th>
				<th class="text-center">관리</th>
			</tr>
			</thead>
			<tbody>
<? foreach($applyD as $k => $aD) { ?>
			<tr>
				<td class="text-center"><?=count($applyD)-$k?></td>
				<td class="text-center">
					<?=$aD['category']?>
				</td>
				<td>
					<table class="table" style="width:300px;">
						<tr>
							<th style="padding:5px 0px; width:75px;">업체명</th>
							<td style="padding:5px 0px;" id="comName<?=$aD['no']?>"><?=$aD['comName']?></td>
						</tr>
						<tr>
							<th style="padding:5px 0px;">대표자명</th>
							<td style="padding:5px 0px;" id="ceoName<?=$aD['no']?>"><?=$aD['ceoName']?></td>
						</tr>
						<tr>
							<th style="padding:5px 0px;word-break:nowrap;">사업자번호</th>
							<td style="padding:5px 0px;" id="comNo<?=$aD['no']?>"><?=$aD['comNo']?></td>
						</tr>
						<tr>
							<th style="padding:5px 0px;">업종/업테</th>
							<td style="padding:5px 0px;" id="comType<?=$aD['no']?>"><?=$aD['comType1']?>/<?=$aD['comType2']?></td>
						</tr>
						<tr>
							<th style="padding:5px 0px;">주소</th>
							<td style="padding:5px 0px;">
								(<?=$aD['comZip']?>) <?=$aD['comAddr1']?>, <?=$aD['comAddr2']?><br><?=$aD['comAddr3']?>
							</td>
						</tr>
						<tr>
							<th style="padding:5px 0px;">상.근.수</th>
							<td style="padding:5px 0px;"><?=$aD['comEmployee']?>명</td>
						</tr>
					</table>
				</td>
				<td class="text-center">
					<div style="width:160px;">
					<?=$aD['comTel']?><br>
					<span id="comPhone<?=$aD['no']?>"><?=$aD['comPhone']?></span><br>
					<?=$aD['comEmail']?>
					</div>
				</td>
				<td>
					<table class="table" style="width:160px;">
						<tr>
							<th style="padding:5px 0px;word-break:nowrap;">총사업비</th>
							<td style="padding:5px 0px;" class="text-right"><?=number_format($aD['totalFund'])?>원</td>
						</tr>
						<tr>
							<th style="padding:5px 0px;">지원금</th>
							<td style="padding:5px 0px;" class="text-right"><?=number_format($aD['supportFund'])?>원</td>
						</tr>
						<tr>
							<th style="padding:5px 0px;">자부담</th>
							<td style="padding:5px 0px;" class="text-right"><?=number_format($aD['selfFund'])?>원</td>
						</tr>
						<tr>
							<th style="padding:5px 0px;">부가세</th>
							<td style="padding:5px 0px;" class="text-right"><?=number_format($aD['vatFund'])?>원</td>
						</tr>
					</table>
				</td>
				<td class="text-center">
					<?=count($aD['typeD'])?>개 품목 신청
					<div  style="max-height:210px;overflow-y:auto;">
					<table class="table" style="width:200px;">
						<tr>
							<th>분류</th>
							<th>품목명</th>
						</tr>
<? foreach($aD['typeD'] as $key2 => $tD) { ?>
						<tr>
							<td style="padding:5px 0px;" class="text-center"><?=$tD['cate'] ? $cateName[$tD['cate']] : ""?></td>
							<td style="padding:5px 0px;" class="text-center"><?=$tD['aType']?><?=$tD['aEtc']?"(".$tD['aEtc'].")":""?></td>
						</tr>
<? } ?>
					</table>
					</div>
				</td>
				<td class="text-center">
					<?=$aD['status']?><br><?=$aD['regDate']?><br><?=$aD['regIP']?><br>
					<a href="/admin/site/apply2023_2/form/<?=$aD['no']?>" class="btn btn-sm btn-success">보기</a>
					<a href="/admin/site/apply2023_2/deleteData/<?=$aD['no']?>" class="btn btn-sm btn-danger" onclick="return confirm('정말 삭제하시겠습니까?\n\n한번 삭제한 자료를 복구 불가능합니다.')">삭제</a>
					<button type="button" class="btn btn-sm btn-<?=$aD['memo'] ? 'danger' : 'default'?>" onclick="fnViewMemo('<?=$aD['no']?>')">메모</button>
					<hr>
					<a href="javascript:;" onclick="return fnViewFile(<?=$aD['no']?>)" class="btn btn-sm btn-default">첨부파일 확인</a>
					<p class="btn btn-sm <?=$btnColor[$aD['status']]?>" id="btnStatus<?=$aD['no']?>"><?=$aD['status']?></p>
					<hr>
					<div class="input-group">
						<span class="input-group-addon">분류 변경</span>
						<select name="chgCategory" class="form-control" onchange="return fnChgCategory(<?=$aD['no']?>, this.value)">
							<option value="기계금속" <?=$aD['category']=='기계금속'?'selected':''?>>기계금속</option>
							<option value="인쇄" <?=$aD['category']=='인쇄'?'selected':''?>>인쇄</option>
							<option value="주얼리" <?=$aD['category']=='주얼리'?'selected':''?>>주얼리</option>
							<option value="수제화" <?=$aD['category']=='수제화'?'selected':''?>>수제화</option>
						</select>
					</div><br>
					<div class="input-group">
						<span class="input-group-addon">합격여부 변경</span>
						<select name="chgStatus" class="form-control" onchange="return fnChgStatus(<?=$aD['no']?>, this.value)">
							<option value="접수" <?=$aD['status']=='접수'?'selected':''?>>접수</option>
							<option value="합격" <?=$aD['status']=='합격'?'selected':''?>>합격</option>
							<option value="불합격" <?=$aD['status']=='불합격'?'selected':''?>>불합격</option>
						</select>
					</div><br>
					<div class="input-group">
						<span class="input-group-addon">준공 검사</span>
						<select name="chgStatus2" class="form-control" onchange="return fnChgStatus2(<?=$aD['no']?>, this.value)">
							<option value="">선택하세요</option>
							<option value="합격" <?=$aD['status2']=='합격'?'selected':''?>>합격</option>
							<option value="불합격" <?=$aD['status2']=='불합격'?'selected':''?>>불합격</option>
						</select>
					</div>
				</td>
			</tr>
<? } ?>
			</tbody>
		</table>
		</div>

	</div>
</div>

<div class="bgBlack"></div>
<div class="divEvaluation">
	<a href="javascript:fnCloseEval()" title="ESC 키를 누르세요"><i class="fa fa-close pull-right" style="font-size:30px;color:white"></i></a>
	<a href="javascript:fnSetEval('적격')" title="적격 처리" class="btn btn-success pull-right mr20" style="font-size:20px;color:white;">적격 처리</a>
	<a href="javascript:fnSetEval('부적격')" title="부적격 처리" class="btn btn-danger pull-right mr20" style="font-size:20px;color:white">부적격 처리</a>
	<a href="javascript:fnSetEval('접수')" title="부적격 처리" class="btn btn-default pull-right mr20" style="font-size:20px;color:black">접수 처리</a>
	<h2></h2>
	<hr>
	<div class="evalCont">
		<div class="row">
			<div class="col-xs-12 col-sm-6" id="divViewDocu1" style="overflow-y:auto;height:87vh;">
			</div>
			<div class="col-xs-12 col-sm-6" id="divViewDocu2" style="overflow-y:auto;height:87vh;">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6" id="divViewDocu3" style="overflow-y:auto;height:87vh;">
			</div>
			<div class="col-xs-12 col-sm-6" id="divViewDocu4" style="overflow-y:auto;height:87vh;">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6" id="divViewDocu5" style="overflow-y:auto;height:87vh;">
			</div>
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
		url: "/admin/site/apply2023_2/ajaxGetDocument/",
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
		$("#divViewDocu3").html(data.file3+data.docu3);
		$("#divViewDocu4").html(data.file4+data.docu4);
		$("#divViewDocu5").html(data.file5+data.docu5);
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
			url: "/admin/site/apply2023_2/ajaxSetStatus/",
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
			url: "/admin/site/apply2023_2/ajaxChgCategory/",
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