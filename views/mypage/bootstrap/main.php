<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="mypage">
	<ul class="nav nav-tabs">
		<li class="nav-item"><a class="nav-link active" href="<?php echo site_url('mypage'); ?>" title="마이페이지">마이페이지</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo site_url('mypage/loginlog'); ?>" title="나의 로그인기록">로그인기록</a></li>
		<li class="nav-item"><a class="nav-link " href="<?php echo site_url('membermodify'); ?>" title="정보수정">정보수정</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo site_url('membermodify/memberleave'); ?>" title="탈퇴하기">탈퇴하기</a></li>
	</ul>
	
	<div class="row">
		<div class="col-sm-6">
			<div class="form-horizontal mt-5">
<? if (!empty($brandD)) {?>
				<div class="page-header">
					<h4><?=element("bizNameKR", $brandD)?> _ <?=element("bizNameEN", $brandD)?></h4>
				</div>
<? } ?>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-horizontal mt-5">
				<div class="page-header">
					<h4>마이페이지</h4>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 control-label">아이디</label>
					<div class="col-sm-9">
						<p class="form-control-static"><?php echo html_escape($this->member->item('mem_userid')); ?></p>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 control-label">이메일 주소</label>
					<div class="col-sm-9">
						<p class="form-control-static"><?php echo html_escape($this->member->item('mem_email')); ?></p>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label">이름</label>
					<div class="col-sm-9">
						<p class="form-control-static"><?php echo html_escape($this->member->item('mem_username')); ?></p>
					</div>
				</div>

				<?php if (element('use', element('mem_homepage', element('memberform', $view)))) { ?>
					<div class="form-group row">
						<label class="col-sm-3 control-label">홈페이지</label>
						<div class="col-sm-9">
							<p class="form-control-static"><?php echo $this->member->item('mem_homepage') ? html_escape($this->member->item('mem_homepage')) : '미등록'; ?></p>
						</div>
					</div>
				<?php } ?>
				<?php if (element('use', element('mem_birthday', element('memberform', $view)))) { ?>
					<div class="form-group row">
						<label class="col-sm-3 control-label">생일</label>
						<div class="col-sm-9">
							<p class="form-control-static"><?php echo html_escape($this->member->item('mem_birthday')); ?></p>
						</div>
					</div>
				<?php } ?>
				<div class="form-group row">
					<label class="col-sm-3 control-label">포인트</label>
					<div class="col-sm-9">
						<p class="form-control-static"><?php echo number_format($this->member->item('mem_point')); ?></p>
					</div>
				</div>
				<?php
				/* if (element('member_group_name', $view)) {
				 * 회원에게 자신이 어떤 그룹에 속해있는지 보여주고 싶으면 여기 주석을 해제해주세요
				 * 웹사이트 운영 정책에 따라 결정해주시면 됩니다
				?>
					<div class="form-group row">
					<label class="col-sm-3 control-label">회원그룹</label>
					<div class="col-sm-9">
						<p class="form-control-static"><?php echo element('member_group_name', $view); ?></p>
					</div>
					</div>
				<?php } */ ?>
				<div class="form-group row">
					<label class="col-sm-3 control-label">가입일</label>
					<div class="col-sm-9">
						<p class="form-control-static"><?php echo display_datetime($this->member->item('mem_register_datetime'), 'full'); ?></p>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 control-label">최근 로그인</label>
					<div class="col-sm-9">
						<p class="form-control-static"><?php echo display_datetime($this->member->item('mem_lastlogin_datetime'), 'full'); ?></p>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-9 offset-sm-3 mt20">
						<a href="<?php echo site_url('membermodify'); ?>" class="btn btn-dark btn-sm w-100" title="회원정보 변경">회원정보 변경</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
