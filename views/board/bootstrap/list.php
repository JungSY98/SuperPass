<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<?php echo element('headercontent', element('board', element('list', $view))); ?>

<div class="container-fluid max1920 board">
	<h3><?php echo html_escape(element('board_name', element('board', element('list', $view)))); ?></h3>
	<div class="row mb20">
		<div class="col-sm-6">
			<?php if ( ! element('access_list', element('board', element('list', $view))) && element('use_rss_feed', element('board', element('list', $view)))) { ?>
				<a href="<?php echo rss_url(element('brd_key', element('board', element('list', $view)))); ?>" class="btn btn-danger btn-sm" title="<?php echo html_escape(element('board_name', element('board', element('list', $view)))); ?> RSS 보기"><i class="fa fa-rss"></i></a>
			<?php } ?>

			<?php if (element('use_category', element('board', element('list', $view))) && ! element('cat_display_style', element('board', element('list', $view)))) { ?>
				<select class="form-control px150" onchange="location.href='<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=' + this.value;">
					<option value="">카테고리선택</option>
					<?php
					$category = element('category', element('board', element('list', $view)));
					function ca_select($p = '', $category = '', $category_id = '')
					{
						$return = '';
						if ($p && is_array($p)) {
							foreach ($p as $result) {
								$exp = explode('.', element('bca_key', $result));
								$len = (element(1, $exp)) ? strlen(element(1, $exp)) : 0;
								$space = str_repeat('-', $len);
								$return .= '<option value="' . html_escape(element('bca_key', $result)) . '"';
								if (element('bca_key', $result) === $category_id) {
									$return .= 'selected="selected"';
								}
								$return .= '>' . $space . html_escape(element('bca_value', $result)) . '</option>';
								$parent = element('bca_key', $result);
								$return .= ca_select(element($parent, $category), $category, $category_id);
							}
						}
						return $return;
					}

					echo ca_select(element(0, $category), $category, $this->input->get('category_id'));
					?>
				</select>
			<?php } ?>
		</div>
		<div class="col-sm-6">
			<div class="searchbox">
				<form class="navbar-form navbar-right float-end" action="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>" onSubmit="return postSearch(this);">
					<input type="hidden" name="findex" value="<?php echo html_escape($this->input->get('findex')); ?>" />
					<input type="hidden" name="category_id" value="<?php echo html_escape($this->input->get('category_id')); ?>" />
					<select class="form-control d-none" name="sfield">
						<option value="post_both" selected>제목+내용</option>
					</select>
					<div class="input-group">
						<input type="text" class="form-control px150" placeholder="Search" name="skeyword" value="<?php echo html_escape($this->input->get('skeyword')); ?>" />
						<button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
					</div>
				</form>
			</div>
			<?php if (element('point_info', element('list', $view))) { ?>
				<div class="point-info float-end mr10">
					<button class="btn-point-info btn-link" data-toggle="popover" data-trigger="focus" data-placement="left" title="포인트안내" data-content="<?php echo element('point_info', element('list', $view)); ?>"
					><i class="fa fa-info-circle fa-lg"></i></button>
				</div>
			<?php } ?>
		</div>
		<script type="text/javascript">
		//<![CDATA[
		function postSearch(f) {
			var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
			if (skeyword.length < 2) {
				alert('2글자 이상으로 검색해 주세요');
				f.skeyword.focus();
				return false;
			}
			return true;
		}
		function toggleSearchbox() {
			$('.searchbox').show();
			$('.searchbuttonbox').hide();
		}
		<?php
		if ($this->input->get('skeyword')) {
			echo 'toggleSearchbox();';
		}
		?>
		$('.btn-point-info').popover({
			template: '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-title"></div><div class="popover-content"></div></div>',
			html : true
		});
		//]]>
		</script>
	</div>

	<?php
	if (element('use_category', element('board', element('list', $view))) && element('cat_display_style', element('board', element('list', $view))) === 'tab') {
		$category = element('category', element('board', element('list', $view)));
	?>
		<ul class="nav nav-tabs clearfix">
			<li role="presentation" <?php if ( ! $this->input->get('category_id')) { ?>class="active" <?php } ?>><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=">전체</a></li>
			<?php
			if (element(0, $category)) {
				foreach (element(0, $category) as $ckey => $cval) {
			?>
				<li role="presentation" <?php if ($this->input->get('category_id') === element('bca_key', $cval)) { ?>class="active" <?php } ?>><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=<?php echo element('bca_key', $cval); ?>"><?php echo html_escape(element('bca_value', $cval)); ?></a></li>
			<?php
				}
			}
			?>
		</ul>
	<?php
	}
	?>

<?php
$attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
echo form_open('', $attributes);
?>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<?php if (element('is_admin', $view)) { ?><th class="text-center"><input onclick="if (this.checked) all_boardlist_checked(true); else all_boardlist_checked(false);" type="checkbox" /></th><?php } ?>
					<th class="text-center col-lg-1"><?=$siteTitle['boardF1']?></th>
					<th><?=$siteTitle['boardF2']?></th>
					<th class="text-center col-lg-2"><?=$siteTitle['boardF3']?></th>
					<th class="text-center col-lg-1"><?=$siteTitle['boardF4']?></th>
				</tr>
			</thead>
			<tbody>
			<?php
			if (element('notice_list', element('list', $view))) {
				foreach (element('notice_list', element('list', $view)) as $result) {
			?>
				<tr>
					<?php if (element('is_admin', $view)) { ?><th scope="row" class="text-center"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /></th><?php } ?>
					<td class="text-center"><span class="badge bg-success">공지</span></td>
					<td>
						<?php if (element('post_reply', $result)) { ?><span class="label label-primary" style="margin-left:<?php echo strlen(element('post_reply', $result)) * 10; ?>px">Re</span><?php } ?>
						<a href="<?php echo element('post_url', $result); ?>" style="
							<?php
							if (element('title_color', $result)) {
								echo 'color:' . element('title_color', $result) . ';';
							}
							if (element('title_font', $result)) {
								echo 'font-family:' . element('title_font', $result) . ';';
							}
							if (element('title_bold', $result)) {
								echo 'font-weight:bold;';
							}
							if (element('post_id', element('post', $view)) === element('post_id', $result)) {
								echo 'font-weight:bold;';
							}
							?>
						" title="<?php echo html_escape(element('title', $result)); ?>"><?php echo html_escape(element('title', $result)); ?></a>
						<?php if (element('is_mobile', $result)) { ?><span class="fa fa-wifi"></span><?php } ?>
						<?php if (element('post_file', $result)) { ?><span class="fa fa-download"></span><?php } ?>
						<?php if (element('post_secret', $result)) { ?><span class="fa fa-lock"></span><?php } ?>
						<?php if (element('ppo_id', $result)) { ?><i class="fa fa-bar-chart"></i><?php } ?>
						<?php if (element('post_comment_count', $result)) { ?><span class="label label-warning">+<?php echo element('post_comment_count', $result); ?></span><?php } ?>
					<td class="text-center"><?php echo element('display_datetime', $result); ?></td>
					<td class="text-center"><?php echo number_format(element('post_hit', $result)); ?></td>
				</tr>
<?php
	}
}
if (element('list', element('data', element('list', $view)))) {
	foreach (element('list', element('data', element('list', $view))) as $result) {
?>
				<tr>
					<?php if (element('is_admin', $view)) { ?><td scope="row" class="text-center"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /></td><?php } ?>
					<td class="text-center"><?php echo element('num', $result); ?></td>
					<td>
<?php if (element('category', $result)) { ?>

<? if (element('bca_value', element('category', $result))=='언론보도') { ?>
							<a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?category_id=<?php echo html_escape(element('bca_key', element('category', $result))); ?>"><span class="badge bg-info"><?php echo html_escape(element('bca_value', element('category', $result))); ?></span></a>

							<? if (isset($result['post_link'][0]['pln_url'])) {?><a href="<?=$result['post_link'][0]['pln_url']?>" target="blank"><? } ?>
<? } else { ?>
							<a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?category_id=<?php echo html_escape(element('bca_key', element('category', $result))); ?>"><span class="badge bg-success"><?php echo html_escape(element('bca_value', element('category', $result))); ?></span></a>
						<a href="<?php echo element('post_url', $result); ?>" style="
							<?php
							if (element('title_color', $result)) {
								echo 'color:' . element('title_color', $result) . ';';
							}
							if (element('title_font', $result)) {
								echo 'font-family:' . element('title_font', $result) . ';';
							}
							if (element('title_bold', $result)) {
								echo 'font-weight:bold;';
							}
							if (element('post_id', element('post', $view)) === element('post_id', $result)) {
								echo 'font-weight:bold;';
							}
							?>
						" title="<?php echo html_escape(element('title', $result)); ?>">
<?php } ?>
						<?php if (element('post_reply', $result)) { ?><span class="badge bg-success" style="margin-left:<?php echo strlen(element('post_reply', $result)) * 10; ?>px">Re</span><?php } ?>



<? } else { ?>
						<a href="<?php echo element('post_url', $result); ?>" style="
							<?php
							if (element('title_color', $result)) {
								echo 'color:' . element('title_color', $result) . ';';
							}
							if (element('title_font', $result)) {
								echo 'font-family:' . element('title_font', $result) . ';';
							}
							if (element('title_bold', $result)) {
								echo 'font-weight:bold;';
							}
							if (element('post_id', element('post', $view)) === element('post_id', $result)) {
								echo 'font-weight:bold;';
							}
							?>
						" title="<?php echo html_escape(element('title', $result)); ?>">
						<?php if (element('post_reply', $result)) { ?><span class="badge bg-success" style="margin-left:<?php echo strlen(element('post_reply', $result)) * 10; ?>px">Re</span><?php } ?>

<? } ?>
						<?php echo html_escape(element('title', $result)); ?></a>
						<?php if (element('is_mobile', $result)) { ?><span class="fa fa-wifi"></span><?php } ?>
						<?php if (element('post_file', $result)) { ?><span class="fa fa-download"></span><?php } ?>
						<?php if (element('post_secret', $result)) { ?><span class="fa fa-lock"></span><?php } ?>
						<?php if (element('is_hot', $result)) { ?><span class="badge bg-danger">Hot</span><?php } ?>
						<?php if (element('is_new', $result)) { ?><span class="badge bg-success">New</span><?php } ?>
						<?php if (element('ppo_id', $result)) { ?><i class="fa fa-bar-chart"></i><?php } ?>

					<td class="text-center"><?php echo element('display_datetime', $result); ?></td>
					<td class="text-center">
<? if (element('bca_value', element('category', $result))=='언론보도') { ?>·<? } else { ?>
						<?php echo number_format(element('post_hit', $result)); ?></td>
<? } ?>
				</tr>
<?php
	}
}
if ( ! element('notice_list', element('list', $view)) && ! element('list', element('data', element('list', $view)))) {
?>
				<tr>
					<td colspan="6" class="p-5 text-center">게시물이 없습니다</td>
				</tr>
<?php } ?>
			</tbody>
		</table>
	</div>
<?php echo form_close(); ?>

	<div class="border_button">
		<div class="float-start mr10">
			<a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-dark"><?=$siteTitle['boardT2']?></a>
<?php if (element('search_list_url', element('list', $view))) { ?>
			<a href="<?php echo element('search_list_url', element('list', $view)); ?>" class="btn btn-dark"><?=$siteTitle['boardT3']?></a>
<?php } ?>
		</div>
<?php if (element('is_admin', $view)) { ?>
			<div class="float-start">
				<button type="button" class="btn btn-dark admin-manage-list ms-2"><i class="fa fa-cog big-fa"></i> <?=$siteTitle['boardT5']?></button>
				<div class="btn-admin-manage-layer admin-manage-layer-list" style="display:none;">
<?php if (element('is_admin', $view) === 'super') { ?>
						<div class="item" onClick="document.location.href='<?php echo admin_url('board/boards/write/' . element('brd_id', element('board', element('list', $view)))); ?>';"><i class="fa fa-cog"></i> 게시판설정</div>
						<div class="item" onClick="post_multi_copy('copy');"><i class="fa fa-files-o"></i> 복사하기</div>
						<div class="item" onClick="post_multi_copy('move');"><i class="fa fa-arrow-right"></i> 이동하기</div>
						<div class="item" onClick="post_multi_change_category();"><i class="fa fa-tags"></i> 카테고리변경</div>
<?php } ?>
					<div class="item" onClick="post_multi_action('multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');"><i class="fa fa-trash-o"></i> 선택삭제하기</div>
					<div class="item" onClick="post_multi_action('post_multi_secret', '0', '선택하신 글들을 비밀글을 해제하시겠습니까?');"><i class="fa fa-unlock"></i> 비밀글해제</div>
					<div class="item" onClick="post_multi_action('post_multi_secret', '1', '선택하신 글들을 비밀글로 설정하시겠습니까?');"><i class="fa fa-lock"></i> 비밀글로</div>
					<div class="item" onClick="post_multi_action('post_multi_notice', '0', '선택하신 글들을 공지를 내리시겠습니까?');"><i class="fa fa-bullhorn"></i> 공지내림</div>
					<div class="item" onClick="post_multi_action('post_multi_notice', '1', '선택하신 글들을 공지로 등록 하시겠습니까?');"><i class="fa fa-bullhorn"></i> 공지올림</div>
					<div class="item" onClick="post_multi_action('post_multi_blame_blind', '0', '선택하신 글들을 블라인드 해제 하시겠습니까?');"><i class="fa fa-exclamation-circle"></i> 블라인드해제</div>
					<div class="item" onClick="post_multi_action('post_multi_blame_blind', '1', '선택하신 글들을 블라인드 처리 하시겠습니까?');"><i class="fa fa-exclamation-circle"></i> 블라인드처리</div>
					<div class="item" onClick="post_multi_action('post_multi_trash', '', '선택하신 글들을 휴지통으로 이동하시겠습니까?');"><i class="fa fa-trash"></i> 휴지통으로</div>
				</div>
			</div>
<?php } ?>
<?php if (element('write_url', element('list', $view))) { ?>
			<div class="float-end">
				<a href="<?php echo element('write_url', element('list', $view)); ?>" class="btn btn-success"><?=$siteTitle['boardT4']?></a>
			</div>
<?php } ?>
	</div>
	<center class="mt-5 text-center">
	<nav aria-label="Page navigation"><?php echo element('paging', element('list', $view)); ?></nav>
	</center>
</div>

<script type="text/javascript">
$("ul.pagination").find("li").addClass("page-item")
$("ul.pagination").find("li").find("a").addClass("page-link");
</script>

<?php echo element('footercontent', element('board', element('list', $view))); ?>

<?php
if (element('highlight_keyword', element('list', $view))) {
	$this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
$("ul.pagination").find("li").addClass("page-item")
$("ul.pagination").find("li").find("a").addClass("page-link");
	//<![CDATA[
$('#fboardlist').highlight([<?php echo element('highlight_keyword', element('list', $view));?>]);
//]]>
</script>
<?php } ?>
