
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
				<td class='text-center'><?=$result['applyCategory']?>_<?=$cnt[$result['applyCategory']]?></td>
				<td class='text-center'><?=$result['projectName']?></td>
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