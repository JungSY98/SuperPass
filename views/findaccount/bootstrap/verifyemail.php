<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="row justify-content-center m-0">
<div class="col-sm-6 mt-5 mb-5 pt-5 pb-5">
	<div class="card card-default">
		<div class="card-heading">이메일 인증</div>
		<div class="card-body">
			<?php echo element('message', $view); ?>
			<p class="btn_final">
				<a href="<?php echo site_url(); ?>" class="btn btn-danger btn-sm" title="<?php echo html_escape($this->cbconfig->item('site_title'));?>">홈페이지로 이동</a>
			</p>
		</div>
	</div>
</div>
</div>
