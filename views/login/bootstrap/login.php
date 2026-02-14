<?php
	if ($this->cbconfig->item('use_sociallogin')) 	$this->managelayout->add_js(base_url('assets/js/social_login.js'));
?>
<meta property="og:image" content="https://superpass.sfw.kr/assets/images/ddpSuperPass.png">
<style>
body {
	background:url("/assets/images/bgLogin.jpg") no-repeat center center;
	background-size:cover;
	height:100vh;
}
.card {
	overflow:hidden;
	background: rgba( 255, 255, 255, 0.2 );
	box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
	backdrop-filter: blur( 7px );
	-webkit-backdrop-filter: blur( 7px );
	border-radius: 20px;
	border: 1px solid rgba( 255, 255, 255, 0.18 );
}
.card-header, .card-body {

}
.card-body input {
	background: rgba(255, 255, 255, 0);
	-webkit-backdrop-filter: blur(5px);
	backdrop-filter: blur(5px);
}
.card, .card-header, .card-footer {
	background-color:transparent;
}
</style>

<div class="row">
	<div class="col-xl-4 offset-xl-4">

		<div class="card font-white mt-4">
			<div class="card-header">
				<h2 class="text-center pt-4 pb-4 mb-0 font-white"><a href="/" class="font-white">DONGDAEMUN<br>SUPERPASS</a></h2>
			</div>
			<div class="card-body pb-5">

<?php
if ($this->cbconfig->item('use_sociallogin')) {
	//if (!in_array($_SERVER['REMOTE_ADDR'], $superIP)) {
?>
				<div class="divSocialLogin p-3 text-center">
					<h5 class="mb-4">Social Login</h5>
<?php if ($this->cbconfig->item('use_sociallogin_google')) {?>
					<a href="javascript:;" onClick="social_connect_on('google');" title="구글 로그인">
						<div class="loginGoole">
							<div class="row">
								<div class="col-2 align-middle">
									<img src="<?php echo base_url('assets/images/logo_google.png'); ?>" class="w-100" alt="구글 로그인" title="구글 로그인" />
								</div>
								<div class="col-10 text-center align-middle">Login with Google</div>
							</div>
						</div>
					</a>
<?php } ?>
<?php if ($this->cbconfig->item('use_sociallogin_naver')) {?>
					<a href="javascript:;" onClick="social_connect_on('naver');" title="네이버 로그인"><img src="<?php echo base_url('assets/images/social_naver.png'); ?>" width="22" height="22" alt="네이버 로그인" title="네이버 로그인" /></a>
<?php } ?>
<?php if ($this->cbconfig->item('use_sociallogin_kakao')) {?>
					<a href="javascript:;" onClick="social_connect_on('kakao');" title="카카오 로그인"><img src="<?php echo base_url('assets/images/kakao_login_medium_wide.png'); ?>" alt="카카오 로그인" title="카카오 로그인" /></a>
<?php } ?>
				</div>

<?php //} // end if not superIP?>
<? } // end use_sociallogin ?>
<?php
	if (in_array($_SERVER['REMOTE_ADDR'], $superIP)) {
		echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
		echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
		echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
		$attributes = array('class' => 'form-horizontal mt-5', 'name' => 'flogin', 'id' => 'flogin');
		echo form_open(current_full_url(), $attributes);
?>
				<input type="hidden" name="url" value="<?php echo html_escape($this->input->get_post('url')); ?>" />
				<h5 class="card-title text-center">Manager - Log In</h5>
				<div class="row">
					<div class="col-lg-12">
						<label class="control-label" for="mem_userid"><?=$siteTitle['LoginTxt1']?></label>
						<input type="text" id="mem_userid" name="mem_userid" class="form-control" value="<?php echo set_value('mem_userid'); ?>" accesskey="L" />
					</div>
				</div>
				<div class="row pt-2">
					<div class="col-lg-12">
						<label class="control-label" for="mem_password"><?=$siteTitle['LoginTxt2']?></label>
						<input type="password" class="form-control" name="mem_password" id="mem_password" />
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="row pt-4 pb-3">
					<div class="col-lg-12">
						<div class="btn-group w-100">
							<button type="submit" class="btn btn-dark"><?=$siteTitle['btnLogin']?></button>
<? /*
							<a href="<?php echo site_url('findaccount'); ?>" class="btn btn-light" title="<?=$siteTitle['btnFindID']?>"><?=$siteTitle['btnFindID']?></a>
*/ ?>
						</div>
					</div>
				</div>
			</div>
<? } // end if is superIP ?>
		</div>
	</div>
</div>

<?php echo form_close(); ?>

<script type="text/javascript">
//<![CDATA[
$(function() {
	$('#flogin').validate({
		rules: {
			mem_userid : { required:true, minlength:3 },
			mem_password : { required:true, minlength:4 }
		}
	});
});
$(document).on('change', "input:checkbox[name='autologin']", function() {
	if (this.checked) {
		$('.autologinalert').show(300);
	} else {
		$('.autologinalert').hide(300);
	}
});
//]]>
</script>
