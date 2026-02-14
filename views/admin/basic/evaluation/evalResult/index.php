<div class="input-group mb-3">
	<span class='input-group-text'>심사위원 선택</span>
	<select class="form-control" name="mb_id" onchange="location = '/admin/evaluation/evalResult/?eID='+this.value; ">
		<option value=''>심사위원 선택</option>
<?
foreach($view['mList'] as $k => $mD) {
?>
		<option value="<?=$mD['mem_userid']?>" <?=$view['viewID']==$mD['mem_userid'] ? "selected" : ""?>><?=$mD['mem_userid']?></option>
<? } ?>
	</select>
	<button type="button" class="btn btn-success" id="btnPaper1Down" onclick="fnPrintPaper()">보안서약서 / 위촉승낙서 / 개인정보 동의서 출력</button>
	<button type="button" class="btn btn-primary" id="btnPaper2Down" onclick="fnPrint()">심사결과 출력</button>
	<button type="button" class="btn btn-siteprimary" id="btnEvaluationDown">엑셀 다운</button>
</div>
<p class="text-end text-danger">※ 보안서약서 / 위촉승낙서 / 개인정보 동의서 / 심사결과 출력시 [설정 더보기] > 용지 크기를 A3로 설정하셔야 합니다.</p>


<div class="table-responsive">
<table class="table table-hover table-striped ">
	<thead>
	<tr>
		<th class='text-center col-xs-2'>프로젝트명</th>
		<th class='text-center col-xs-2'>기업역량 & 사업화의지(10)		</th>
		<th class='text-center col-xs-2'>상품성(20)</th>
		<th class='text-center col-xs-2'>사업화 가능성 & 활용성 (20)</th>
		<th class='text-center col-xs-2'>기업역량 & 전문성 (20)</th>
		<th class='text-center col-xs-2'>디자인개발 수행계획 적절성 (30)</th>
		<th class='text-center'>Comments</th>
	</tr>
	</thead>
	<tbody>
<?
$canSign = true;
$sSign = "";
if (!empty($data)) {
foreach ($data as $result) {
if ($result['ee_field1']==NULL) $canSign = false;
if (!empty($result['evaluate_id'])) $sID = $result['evaluate_id'];
if (!empty($result['evaluate_name'])) $sName = $result['evaluate_name'];
if (!empty($result['evaluate_sign1'])) $sSign = $result['evaluate_sign1'];
if (!empty($result['evaluate_sign2'])) $sSign2 = $result['evaluate_sign2'];
if (!empty($result['evaluate_date'])) $sDate = $result['evaluate_date'];

?>
	<tr>
		<td class='text-center'><?=$result['projectName']?></td>
		<td class='text-center'><?=number_format($result['ee_field1'])?></td>
		<td class='text-center'><?=number_format($result['ee_field2'])?></td>
		<td class='text-center'><?=number_format($result['ee_field3'])?></td>
		<td class='text-center'><?=number_format($result['ee_field4'])?></td>
		<td class='text-center'><?=number_format($result['ee_field5'])?></td>
		<td><?=nl2br($result['comments'])?></td>
	</tr>
<? } } ?>
	</tbody>
	<tfoot>
<? if (isset($sSign2)) { ?>
	<tr>
		<th colspan=7>
			<p>I accept being appointed as a judging panel in Seoul Fashion Week and I affirm that I do not have any interests in the applicants of <?=$view['viewProgram']?></p>
			<p>In addition, I pledge to observe the confidentiality of their personal information and to give a fair evaluation data.</p>
			<div class="row">
				<div class="col-xl-3">Name <hr> <?=isset($sName) ? $sName : ''?></div>
				<div class="col-xl-3">Date <hr> <?=$sDate?></div>
				<div class="col-xl-6">Sign <hr> <div id="aSign2" class="aSign" style="width:600px;height:330px;"></div></div>
				<textarea id="dbSign" class="hidden"><?=$sSign2?></textarea>


				<script>
				$('#aSign2').signature();
				if ($('#dbSign').val() != '') {
					$('#aSign2').signature('enable').signature('draw', $('#dbSign').val()).signature({disabled: true})
						$('#aSign2').signature({disabled: true});
				}

				//$("#aSign2").find("canvas").attr({"width":"403","height":"230"});
				//$("#aSign2").find("canvas").css({"width":"100%", "height":"100%"});
				</script>
			</div>
		</th>
	</tr>
<? } ?>
	</tfoot>
</table>
</div>
<iframe name="print_iframe" id="print_iframe" src="" width="100%" height="1"></iframe>


<style>
	canvas {
		width:100%;
		height:auto;
	}
</style>


<script>
function viewModal(no) {
	$("#titComInfo").html($("#titCom"+no).html() + " _ 업체정보");
	$("#divComInfo").html($("#divComHidden"+no).html());
	$("#comModal").modal('show');
}
var no;
var file;
var fNo;

$(document).ready(function() {
	$("#btnEvaluationDown").on("click",function() {
		var sSeason = $("select[name=season]").val();
		var sProgram = $("select[name=program]").val();
		var sMember = $("select[name=mb_id]").val();
		location = '/admin/evaluation/evalResult/xlsDown/?eID='+sMember;
	});
});

function fnPrint() {
	$("#print_iframe").attr("src", "/admin/evaluation/evalResult/printEvaluation/?eID=<?=$view['viewID']?>");
	$("#print_iframe").focus();
}
function fnPrintPaper() {
	$("#print_iframe").attr("src", "/admin/evaluation/evalResult/printPaper/?eID=<?=$view['viewID']?>");
	$("#print_iframe").focus();
}

</script>

