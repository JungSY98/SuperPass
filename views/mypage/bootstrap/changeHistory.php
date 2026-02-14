<div class="container">

	<div class="row">
		<div class="col-sm-3 sticky-top">

			<?=$menuD?>

		</div>
		<div class="col-sm-9">
			<h5 class="modifyContentTitle">변경 이력</h5>

			<table class="table table-striped">
				<tr>
					<th class="col-sm-1">변경 ID</th>
					<th class="col-sm-2">변경 유형</th>
					<th class="">변경 정보</th>
					<th class="col-sm-2">변경 일</th>
				</tr>
<?
	foreach($chgD as $k => $cD) { 
		$changeData = json_decode($cD['changeData'], true);
?>
				<tr>
					<td><?=$cD['userID']?></td>
					<td><?=$cD['changeType']?></td>
					<td>
						<table class="table table-hover">
							<tr class="text-center">
								<th>유형</th>
								<th>전</th>
								<th>후</th>
							</tr>
<?
	foreach($changeData as $kk => $field) { ?>
							<tr>
								<td><?=$field['title']?></td>
								<td><?=$field['before']?></td>
								<td><?=$field['after']?></td>
							</tr>
<? } ?>
						</table>
					</td>
					<td><?=$cD['regDate']?><br><?=$cD['regIP']?></td>
				</tr>
<? } ?>
<? if (empty($chgD)) { ?>
				<tr>
					<th colspan="4" class="text-center p-5">변경 이력이 없습니다.</th>
				</tr>
<? } ?>
			</table>


		</div>
	</div>
</div>

