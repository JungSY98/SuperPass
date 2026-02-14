<div class="box">
	<div class="box-header">
		<?php
		echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
		$attributes = array('class' => 'form-inline', 'name' => 'flist', 'id' => 'flist');
		echo form_open(current_full_url(), $attributes);
		?>
			<div class="box-table-header w-100">
				<ul class="nav nav-pills">
					<li role="presentation" class="nav-item"><a href="<?php echo admin_url($this->pagedir); ?>" class="nav-link active">배너클릭</a></li>
					<li role="presentation" class="nav-item"><a href="<?php echo admin_url($this->pagedir . '/graph'); ?>" class="nav-link ">기간별 그래프</a></li>
					<li role="presentation" class="nav-item"><a href="<?php echo admin_url($this->pagedir . '/cleanlog'); ?>" class="nav-link ">오래된 로그삭제</a></li>
				</ul>
				<?php
				ob_start();
				?>
					<div class="btn-group float-end" role="group" aria-label="...">
						<a href="<?php echo element('listall_url', $view); ?>" class="btn btn-light">전체목록</a>
						<button type="button" class="btn btn-danger btn-list-delete btn-list-selected disabled" data-list-delete-url = "<?php echo element('list_delete_url', $view); ?>" >선택삭제</button>
					</div>
				<?php
				$buttons = ob_get_contents();
				ob_end_flush();
				?>
			</div>
			<div class="row m-5">전체 : <?php echo element('total_rows', element('data', $view), 0); ?>건</div>
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th><a href="<?php echo element('plc_id', element('sort', $view)); ?>">번호</a></th>
							<th>배너</th>
							<th>배너설명</th>
							<th>배너가노출된주소</th>
							<th>링크주소</th>
							<th>링크클릭일시</th>
							<th>링크클릭 IP</th>
							<th>링크클릭 회원</th>
							<th>OS</th>
							<th>Browser</th>
							<th><input type="checkbox" name="chkall" id="chkall" /></th>
						</tr>
					</thead>
					<tbody>
					<?php
					if (element('list', element('data', $view))) {
						foreach (element('list', element('data', $view)) as $result) {
					?>
						<tr>
							<td><?php echo number_format(element('num', $result)); ?></td>
							<td><?php if (element('thumb_url', $result)) {?><img src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('ban_title', $result)); ?>" title="<?php echo html_escape(element('ban_title', $result)); ?>" class="thumbnail mg0" style="width:80px;" /><?php } ?></td>
							<td><?php echo html_escape(element('ban_title', $result)); ?></td>
							<td><a href="<?php echo goto_url(html_escape(element('bcl_referer', $result))); ?>" target="_blank"><?php echo html_escape(element('bcl_referer', $result)); ?></a></td>
							<td><a href="<?php echo goto_url(html_escape(element('bcl_url', $result))); ?>" target="_blank"><?php echo html_escape(element('bcl_url', $result)); ?></a></td>
							<td><?php echo display_datetime(element('bcl_datetime', $result), 'full'); ?></td>
							<td><a href="?sfield=bcl_ip&amp;skeyword=<?php echo display_admin_ip(element('bcl_ip', $result)); ?>"><?php echo display_admin_ip(element('bcl_ip', $result)); ?></a></td>
							<td><?php echo element('display_name', $result); ?> <?php if (element('mem_userid', element('member', $result))) { ?> ( <a href="?sfield=banner_click_log.mem_id&amp;skeyword=<?php echo element('mem_id', $result); ?>"><?php echo html_escape(element('mem_userid', element('member', $result))); ?></a> ) <?php } ?></td>
							<td><?php echo element('os', $result); ?></td>
							<td><?php echo element('browsername', $result); ?> <?php echo element('browserversion', $result); ?> <?php echo element('engine', $result); ?></td>
							<td><input type="checkbox" name="chk[]" class="list-chkbox" value="<?php echo element(element('primary_key', $view), $result); ?>" /></td>
						</tr>
					<?php
						}
					}
					if ( ! element('list', element('data', $view))) {
					?>
						<tr>
							<td colspan="11" class="nopost">자료가 없습니다</td>
						</tr>
					<?php
					}
					?>
					</tbody>
				</table>
			</div>
			<div class="box-info w-100">
				<?php echo element('paging', $view); ?>
				<div class=""><?php echo admin_listnum_selectbox();?></div>
				<?php echo $buttons; ?>
			</div>
		<?php echo form_close(); ?>
	</div>
	<form name="fsearch" id="fsearch" action="<?php echo current_full_url(); ?>" method="get">
		<div class="box-search">
			<div class="row m-5">
				<div class="col-md-6 offset-md-3">
					<div class="input-group">
						<select class="form-control" name="sfield" >
							<?php echo element('search_option', $view); ?>
						</select>
						<input type="text" class="form-control" name="skeyword" value="<?php echo html_escape(element('skeyword', $view)); ?>" placeholder="Search for..." />
						<button class="btn btn-light" name="search_submit" type="submit">검색!</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
