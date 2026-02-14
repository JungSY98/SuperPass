<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="row justify-content-center m-0">
<div class="col-sm-6 mt-5 mb-5 pt-5 pb-5">
	<div class="card card-default">
		<div class="card-body">
			<?php
			echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
			echo show_alert_message(element('error_message', $view), '<div class="alert alert-dismissible alert-warning"><button type="button" class="close alertclose" >&times;</button>', '</div>');
			echo show_alert_message(element('success_message', $view), '<div class="alert alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
			if ( ! element('error_message', $view) && ! element('success_message', $view)) {
				echo show_alert_message(element('info', $view), '<div class="alert alert-info">', '</div>');
				$attributes = array('class' => 'form-horizontal', 'name' => 'fresetpw', 'id' => 'fresetpw');
				echo form_open(current_full_url(), $attributes);
			?>
				<legend><?=$siteTitle['siteTitle1']?></legend>
				<p><?=$siteTitle['siteTitle11']?></p>
				<div class="form-group row mt-3">
					<label class="col-lg-3 control-label"><?=$siteTitle['LoginTxt1']?></label>
					<div class="col-md-9"><?php echo element('mem_userid', $view); ?></div>
				</div>
				<div class="form-group row mt-3">
					<label class="col-lg-3 control-label"><?=$siteTitle['siteTitle2']?></label>
					<div class="col-md-9">
						<input type="password" name="new_password" id="new_password" class="form-control w-100" placeholder="Password" />
					</div>
				</div>
				<div class="form-group row mt-3">
					<label class="col-lg-3 control-label"><?=$siteTitle['siteTitle3']?></label>
					<div class="col-md-9">
						<input type="password" name="new_password_re" id="new_password_re" class="form-control w-100" placeholder="Password" />
					</div>
				</div>
				<div class="form-group row mt-4">
					<div class="col-md-12">
						<button type="submit" class="btn btn-siteprimary w-100"><?=$siteTitle['siteTitle1']?></button>
					</div>
				</div>
			<?php
				echo form_close();
			}
			?>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
//<![CDATA[
$(function() {
	$('#fresetpw').validate({
		rules: {
			new_password : { required:true, minlength:<?php echo element('password_length', $view); ?> },
			new_password_re : { required:true, minlength:<?php echo element('password_length', $view); ?>, equalTo : '#new_password' }
		}
	});
});
//]]>
</script>
