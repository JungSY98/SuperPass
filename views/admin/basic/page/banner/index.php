<div class="box">
	<div class="box-header">
		<?php
		echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
		$attributes = array('class' => 'form-inline', 'name' => 'flist', 'id' => 'flist');
		echo form_open(current_full_url(), $attributes);
		?>
			<div class="box-table-header w-100 mb-5">
				<ul class="nav nav-tabs mb-5 <?if (empty($this->member->is_admin())) { ?>d-none<?}?>">
					<li class="nav-item" role="presentation" class="active"><a href="<?php echo admin_url($this->pagedir); ?>" class="nav-link active">배너관리</a></li>
					<li class="nav-item" role="presentation"><a href="<?php echo admin_url($this->pagedir . '/group'); ?>" class="nav-link">배너 위치 관리</a></li>
				</ul>
				<?php
				ob_start();
				?>
					<div class="btn-group float-" role="group" aria-label="...">
						<a href="<?php echo element('listall_url', $view); ?>" class="btn btn-outline btn-light">전체목록</a>
						<button type="button" class="btn btn-outline btn-light btn-list-delete btn-list-selected disabled" data-list-delete-url = "<?php echo element('list_delete_url', $view); ?>" >선택삭제</button>
						<a href="<?php echo element('write_url', $view); ?>" class="btn btn-outline btn-danger">배너추가</a>
					</div>
				<?php
				$buttons = ob_get_contents();
				ob_end_flush();
				?>
				<div class="btn-group clearfix" role="group">
					<a href="?" class="btn <?php echo ($this->input->get('ban_activated') !== 'Y' && $this->input->get('ban_activated') !== 'N') ? 'btn-success' : 'btn-light'; ?>">전체배너</a>
					<a href="?ban_activated=Y" class="btn <?php echo ($this->input->get('ban_activated') === 'Y') ? 'btn-success' : 'btn-light'; ?>">활성</a>
					<a href="?ban_activated=N" class="btn <?php echo ($this->input->get('ban_activated') === 'N') ? 'btn-success' : 'btn-light'; ?>">비활성</a>
				</div>
			</div>
			<div class="row m-1 clearfix">전체 : <?php echo element('total_rows', element('data', $view), 0); ?>건</div>
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th><a href="<?php echo element('ban_id', element('sort', $view)); ?>">번호</a></th>
							<th>이미지</th>
							<th><a href="<?php echo element('ban_title', element('sort', $view)); ?>">이미지설명</a></th>
							<th><a href="<?php echo element('bng_name', element('sort', $view)); ?>">배너 위치</a></th>
							<th>표시기기</th>
							<th><a href="<?php echo element('ban_url', element('sort', $view)); ?>">URL</a></th>
							<th>가로/세로</a></th>
							<th><a href="<?php echo element('ban_start_date', element('sort', $view)); ?>">시작일시</a></th>
							<th><a href="<?php echo element('ban_end_date', element('sort', $view)); ?>">종료일시</a></th>
							<th><a href="<?php echo element('ban_hit', element('sort', $view)); ?>">클릭수</a></th>
							<th><a href="<?php echo element('ban_order', element('sort', $view)); ?>">정렬순서</a></th>
							<th><a href="<?php echo element('ban_activated', element('sort', $view)); ?>">활성여부</a></th>
							<th>수정</th>
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
							<td><?php echo html_escape(element('bng_name', $result)); ?></td>
							<td class="text-center"><?php echo element('ban_device', $result); ?></td>
							<td><div class="text-wrap"  style="width:200px;"><?php if (element('ban_url', $result)) { ?><a href="<?php echo goto_url(element('ban_url', $result)); ?>" target="_blank"><?php echo html_escape(element('ban_url', $result)); ?></a> <?php } ?></div></td>
							<td class="text-center"><?php echo html_escape(element('ban_width', $result)); ?> / <?php echo html_escape(element('ban_height', $result)); ?></td>
							<td><?php echo element('ban_start_date', $result); ?></td>
							<td><?php echo element('ban_end_date', $result); ?></td>
							<td class="text-center"><?php echo number_format((int) element('ban_hit', $result)); ?></td>
							<td class="text-center"><?php echo number_format((int) element('ban_order', $result)); ?></td>
							<td><?php echo element('ban_activated', $result) ? '<button type="button" class="btn btn-xs btn-primary">활성</button>' : '<button type="button" class="btn btn-xs btn-danger">비활성</button>'; ?></td>
							<td><a href="<?php echo admin_url($this->pagedir); ?>/write/<?php echo element(element('primary_key', $view), $result); ?>?<?php echo $this->input->server('QUERY_STRING', null, ''); ?>" class="btn btn-outline btn-light btn-xs">수정</a></td>
							<td><input type="checkbox" name="chk[]" class="list-chkbox" value="<?php echo element(element('primary_key', $view), $result); ?>" /></td>
						</tr>
					<?php
						}
					}
					if ( ! element('list', element('data', $view))) {
					?>
						<tr>
							<td colspan="14" class="nopost">자료가 없습니다</td>
						</tr>
					<?php
					}
					?>
					</tbody>
				</table>
			</div>
			<div class="box-info w-100">
				<?php echo element('paging', $view); ?>
				<div class="pull-left"><?php echo admin_listnum_selectbox();?></div>
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
