<div class="box">
	<div class="box-header">

		<div class="row mb-5">
			<div class="col-sm-8">
				<select name="membershipNo" class="form-control" onchange="location = '/admin/membership/statistics/?viewMonth='+this.value; ">
<? foreach($mList as $kk => $mD) { ?>
					<option value="<?=$mD['cardinal']?>" <?=$viewMonth==$mD['cardinal'] ? "selected" : ""?>><?=substr($mD['cardinal'],0,4)?>년 <?=substr($mD['cardinal'],4,2)?>월</option>
<? } ?>
				</select>
			</div>
		</div>

		<div class="table-responsive" style="height:80vh;">
		<table class="table table-bordered bg-white w-100 table-striped-columns" id="sdfTable">
			<thead class="sticky-top">
			<tr class="bg-light">
                <th class="text-center bg-light">생년월일</th>
				<th class="text-center bg-light">연락처</th>
                <th class="text-center bg-light" style="width:80px;">성명</th>
				<th class="text-center bg-light">이용일</th>
				<th class="text-center bg-light">이용률</th>
<? for($a=1;$a<=date("t", strtotime($year."-".$month."-01"));$a++) { 
	$a = $a < 10 ? '0'.$a : $a;
	$isWeekend = $monthlyRestDay == $year."-".$month."-".$a ? "bg-danger" : "";
?>
				<th class="text-center <?=$isWeekend?>"><?=$a?></th>
<? } ?>
			</tr>
			</thead>
			<tbody>
<?
	$totalUseDay = $totalAverage = 0;
	$totalDay = array();
	foreach($statisticD as $k => $sD) {
		$isGreen = round(($sD['useDay']/date("t", strtotime($year."-".$month."-01")))*100,2) >= 48 ? "bg-success" : "";
		$totalUseDay += $sD['useDay'];
?>
			<tr class="<?//=$isGreen?>">

				<td class="text-center"><?=$sD['aBirth']?></td>
				<td class="text-center"><?=str_replace("-", "", $sD['aPhone'])?></td>
                <td class="text-center"><?=$sD['aName']?><span class="badge text-bg-danger float-end pointer" onclick="return fnViewMemo('<?=$year."-".$month?>', '<?=$sD['applyID']?>')">메모</span></td>
				<td class="text-center <?=$isGreen?>"><?=$sD['useDay']?></td>
				<td class="text-center <?=$isGreen?>"><?=round(($sD['useDay']/date("t", strtotime($year."-".$month."-01")))*100,2)?>%</td>
<?
	for($a=1;$a<=date("t", strtotime($year."-".$month."-01"));$a++) { 
		$day = $a<10 ? '0'.$a : $a;
		if (!isset($totalDay[$day])) $totalDay[$day] = 0;
		if (preg_match("/".$year."-".$month."-".$day."/i", $sD['useWhen'])) $totalDay[$day]++;
		$isMemo = $this->site->selectCI("no, useMemo", "membership_usage", array("userID"=>$sD['applyID'], "useWhen"=>$year."-".$month."-".$day), "");
		$iconMemo = (isset($isMemo[0]) && !empty($isMemo[0]['useMemo'])) ? '<span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>' : "";
		$isWeekend = $monthlyRestDay == $year."-".$month."-".$day ? "bg-danger" : "";
?>
				<td class="text-center <?=$isWeekend?>"><?=preg_match("/".$year."-".$month."-".$day."/i", $sD['useWhen'])?"<div class='btnMemo position-relative' data-useday='".$year."-".$month."-".$day."' data-userid='".$sD['applyID']."'>O".$iconMemo."</div>":"&nbsp;"?></td>
<? } ?>
			</tr>
<? } ?>
			</tbody>
<?
$totalAverage = count($statisticD) > 0 ? round(($totalUseDay/date("t", strtotime($year."-".$month."-01")))/count($statisticD)*100,2) : 0;
?>
			<tr class="bg-secondary">
				<th class="bg-secondary"></th>
				<th class="bg-secondary"></th>
				<th class="text-center bg-secondary">승인자 합계</th>
				<th class="text-center bg-secondary"><?=$totalUseDay?></th>
				<th class="text-center bg-secondary"><?=$totalAverage?>%</th>
<?
	for($a=1;$a<=date("t", strtotime($year."-".$month."-01"));$a++) { 
		$day = $a<10 ? '0'.$a : $a;
		$isWeekend = $monthlyRestDay == $year."-".$month."-".$day ? "bg-danger" : "";
?>
				<th class="text-center <?=$isWeekend?>"><?=element($day, $totalDay)?></th>
<? } ?>
			</tr>


<? ////////////////////////////////////////////////////////////// 방문자
	$totalUseDay2 = $totalAverage2 = 0;
	$totalDay2 = array();
	foreach($statistic2D as $k => $sD) {
		$isGreen = round(($sD['useDay']/date("t", strtotime($year."-".$month."-01")))*100,2) > 50 ? "bg-success" : "";
		$totalUseDay2 += $sD['useDay'];
?>
			<tr class="<?//=$isGreen?>">

				<td class="text-center"><?=$sD['userBirth']?></td>
				<td class="text-center"><?=$sD['userPhone']?></td>
                <td class="text-center"><?=$sD['userName']?></td>
				<td class="text-center <?=$isGreen?>"><?=$sD['useDay']?></td>
				<td class="text-center <?=$isGreen?>"><?=round(($sD['useDay']/date("t", strtotime($year."-".$month."-01")))*100,2)?>%</td>
<?
	for($a=1;$a<=date("t", strtotime($year."-".$month."-01"));$a++) { 
		$day = $a<10 ? '0'.$a : $a;
		if (!isset($totalDay2[$day])) $totalDay2[$day] = 0;
		if (preg_match("/".$year."-".$month."-".$day."/i", $sD['visitedDay'])) $totalDay2[$day]++;
		$isMemo2 = $this->site->selectCI("no, useMemo", "membership_guest_usage", array("userName"=>$sD['userName'], "useWhen"=>$year."-".$month."-".$day), "");
		$iconMemo2 = (isset($isMemo2[0]) && !empty($isMemo2[0]['useMemo'])) ? '<span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>' : "";
		$isWeekend = $monthlyRestDay == $year."-".$month."-".$a ? "bg-danger" : "";
?>
				<td class="text-center <?=$isWeekend?>"><?=preg_match("/".$year."-".$month."-".$day."/i", $sD['visitedDay'])?"<div class='btnGuestMemo position-relative' data-useday='".$year."-".$month."-".$day."' data-username='".$sD['userName']."'>O".$iconMemo2."</div>":"&nbsp;"?></td>
<? } ?>
			</tr>
<? } ?>
<?
$totalAverage2 = count($statistic2D) > 0 ? round(($totalUseDay2/date("t", strtotime($year."-".$month."-01")))/count($statistic2D)*100,2) : 0;
?>
			<tr class="bg-secondary">
				<th class="bg-secondary"></th>
				<th class="bg-secondary"></th>
				<th class="text-center bg-secondary">방문자 합계</th>
				<th class="text-center bg-secondary"><?=$totalUseDay2?></th>
				<th class="text-center bg-secondary"><?=$totalAverage2?>%</th>
<?
	for($a=1;$a<=date("t", strtotime($year."-".$month."-01"));$a++) { 
		$day = $a<10 ? '0'.$a : $a;
		$isWeekend = $monthlyRestDay == $year."-".$month."-".$a ? "bg-danger" : "";
?>
				<th class="text-center <?=$isWeekend?>"><?=element($day, $totalDay2)?></th>
<? } ?>
			</tr>

		</table>
		</div>


	</div>
</div>

<style>
#sdfTable th, #sdfTable td {
	white-space: nowrap;
	border-bottom-width: 1px;
}
</style>
<link rel="stylesheet" type="text/css" href="/assets/datatables/datatables.min.css"/>
<script type="text/javascript" src="/assets/datatables/datatables.min.js"></script>


<div class="modal fade" id="memoModal" tabindex="-1" aria-labelledby="memoModalLabel" aria-hidden="true">
	<div class="modal-dialog  modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="memoModalLabel">메모</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<textarea name="memo" class="form-control" rows="5" id="textMemo"></textarea>
				<div class="textMemoAll"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">창 닫기</button>
				<button type="button" class="btn btn-primary" onclick="return fnSaveMemo()">저장하기</button>
			</div>
		</div>
	</div>
</div>


<script>
var viewType = '';
var viewMemoNo = '';
var viewMemoGuestNo = '';

$(".box").parent().parent().find(".container").css("max-width", "100%");
$(".divTableWrap").css("width", $(".box-header").width());
$(document).ready(function() {
	var table = $('#sdfTable').DataTable( {
		fixedColumns:{
			left: 5
		},
		ordering:  false,
		lengthMenu: [200, 100, 50, 25, 10],
	});
	$(".btnMemo").on("click", function() {
		viewType = 'membership';
		var userid = $(this).attr("data-userid");
		var useday = $(this).attr("data-useday");
		$("#textMemo").val("");
		fnGetMemo(viewType, userid, useday);
	});
	$(".btnGuestMemo").on("click", function() {
		viewType = 'guest';
		var username = $(this).attr("data-username");
		var useday = $(this).attr("data-useday");
		$("#textMemo").val("");
		fnGetMemo(viewType, username, useday);
	});
});
function fnGetMemo(type, id, day) {
	$("#textMemo").removeClass("d-none");
	$("div.textMemoAll").html('');
	$.ajax({
		method: "POST",
		url: "/admin/membership/statistics/ajaxGetMemo/",
		dataType: "html",
		data: { 
			'type' : type,
			'id' : id,
			'day' : day,
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		}
	})
	.done(function(returnD) {
		var memoD = $.parseJSON(returnD);
		if (type=='membership') {
			viewMemoNo = memoD.no;
		} else if (type=='guest') {
			viewMemoGuestNo = memoD.no;
		}
		$("#textMemo").val(memoD.useMemo)
		$("#memoModal").modal("show");

		//console.log(memoD);
	});
}
function fnSaveMemo() {
	$.ajax({
		method: "POST",
		url: "/admin/membership/statistics/ajaxSaveMemo/",
		dataType: "html",
		data: { 
			'type' : viewType,
			'viewMemoNo' : viewMemoNo,
			'viewMemoGuestNo' : viewMemoGuestNo,
			'memo' : $("#textMemo").val(),
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		}
	})
	.done(function(returnD) {
		if (returnD) location.reload();
	});
}
function fnViewMemo(viewMonth, viewID) {
	$("div.textMemoAll").html('');
	$.ajax({
		method: "POST",
		url: "/admin/membership/statistics/ajaxGetMemoAll/",
		dataType: "html",
		data: { 
			'id' : viewID,
			'viewMonth' : viewMonth,
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		}
	})
	.done(function(returnD) {
		var memoD = $.parseJSON(returnD);
		$("#textMemo").addClass("d-none");
		$("div.textMemoAll").html(memoD.html);
		$("#memoModal").modal("show");
		//console.log(memoD);
	});
}
</script>