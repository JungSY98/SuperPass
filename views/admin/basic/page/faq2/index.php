<div class="box">
	<div class="box-header">
		<?php
		echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
		$attributes = array('class' => 'form-inline', 'name' => 'flist', 'id' => 'flist');
		echo form_open(current_full_url(), $attributes);
		?>
<?php
ob_start();
?>
			<div class="d-inline w-100">
			<div class="input-group float-end" role="group" aria-label="...">
				<a href="<?php echo element('listall_url', $view); ?>" class="btn btn-secondary">FAQ 전체목록</a>
				<button type="button" class="btn btn-secondary btn-list-delete btn-list-selected disabled" data-list-delete-url = "<?php echo element('list_delete_url', $view); ?>" >선택삭제</button>
				<a href="<?php echo element('write_url', $view); ?>" class="btn btn-danger">FAQ 내용 추가</a>
			</div>
			</div>
<?php
$buttons = ob_get_contents();
ob_end_flush();
?>
			<div class="row m-5">전체 : <?php echo element('total_rows', element('data', $view), 0); ?>건</div>
			<div class="table-responsive">
				<table class="table ">
					<thead>
						<tr>
							<th>분류</th>
							<th><a href="<?php echo element('faq_title', element('sort', $view)); ?>">제목</a></th>
							<th>내용</th>
							<th><a href="<?php echo element('faq_order', element('sort', $view)); ?>">정렬순서</a></th>
							<th><a href="<?php echo element('faq_datetime', element('sort', $view)); ?>">등록일</a></th>
							<th>등록자</th>
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
							<td><?=element('faq_cate', $result)?></td>
							<td><?php echo cut_str(html_escape(strip_tags(element('faq_title', $result))),100); ?></td>
							<td><?php echo cut_str(html_escape(strip_tags(element('faq_content', $result))),100); ?></td>
							<td><?php echo number_format(element('faq_order', $result)); ?></td>
							<td><?php echo display_datetime(element('faq_datetime', $result), 'full'); ?></td>
							<td><?php echo element('display_name', $result); ?> <?php if (element('mem_userid', $result)) { ?> ( <a href="?fgr_id=<?php echo $this->input->get('fgr_id'); ?>&amp;sfield=faq.mem_id&amp;skeyword=<?php echo element('mem_id', $result); ?>"><?php echo html_escape(element('mem_userid', $result)); ?></a> ) <?php } ?></td>
							<td><a href="<?php echo admin_url($this->pagedir); ?>/write/<?php echo element(element('primary_key', $view), $result); ?>?<?php echo $this->input->server('QUERY_STRING', null, ''); ?>" class="btn btn-secondary  btn-xs">수정</a></td>
							<td><input type="checkbox" name="chk[]" class="list-chkbox" value="<?php echo element(element('primary_key', $view), $result); ?>" /></td>
						</tr>
					<?php
						}
					}
					if ( ! element('list', element('data', $view))) {
					?>
						<tr>
							<td colspan="7" class="nopost">자료가 없습니다</td>
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
	<input type="hidden" name="fgr_id" value="<?php echo $this->input->get('fgr_id'); ?>" />
		<div class="box-search">
			<div class="row m-5">
				<div class="col-md-6 offset-md-3">
					<div class="input-group">
						<select class="form-control" name="sfield" >
							<?php echo element('search_option', $view); ?>
						</select>
						<input type="text" class="form-control" name="skeyword" value="<?php echo html_escape(element('skeyword', $view)); ?>" placeholder="Search for..." />
						<span class="input-group-btn">
							<button class="btn  btn-sm" name="search_submit" type="submit">검색!</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
