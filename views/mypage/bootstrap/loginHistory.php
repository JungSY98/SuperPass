<div class="container">

	<div class="row">
		<div class="col-sm-3 sticky-top">

			<?=$menuD?>

		</div>
		<div class="col-sm-9">
			<h5 class="modifyContentTitle">변경 이력</h5>

			<table class="table table-hover">
	<table class="table table-hover">
		<thead>
		<tr>
			<th>로그인여부</th>
			<th>IP</th>
			<th>OS</th>
			<th>Browser</th>
			<th>날짜</th>
		</tr>
		</thead>
		<tbody>
<?php
	foreach ($loginD as $result) {

		if (element('mll_useragent', $result)) {
			$userAgent = get_useragent_info(element('mll_useragent', $result));
			$result['browsername'] = $userAgent['browsername'];
			$result['browserversion'] = $userAgent['browserversion'];
			$result['os'] = $userAgent['os'];
			$result['engine'] = $userAgent['engine'];
		}

?>
			<tr>
				<td><?php echo element('mll_success', $result) === '1' ? "<span class=\"label label-success\">로그인성공</span>":"<span class=\"label label-danger\">로그인실패</span>"; ?></td>
				<td><?php echo html_escape(element('mll_ip', $result)); ?></td>
				<td><?php echo html_escape(element('os', $result)); ?></td>
				<td><?php echo html_escape(element('browsername', $result)); ?> <?php echo html_escape(element('browserversion', $result)); ?> <?php echo html_escape(element('engine', $result)); ?></td>
				<td><?php echo display_datetime(element('mll_datetime', $result), 'full'); ?></td>
			</tr>
<?php
	}

if ( ! $loginD ) {
?>
			<tr>
				<td colspan="5" class="nopost">로그인 기록이 없습니다</td>
			</tr>
<?php
}
?>
		</tbody>
	</table>



		</div>
	</div>
</div>

