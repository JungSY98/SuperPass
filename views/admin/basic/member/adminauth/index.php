<div class="box">
	<div class="box-header">

		<select name="adminMember" class="form-control mb-5" onchange="location = '/admin/member/adminauth/?viewID='+this.value;">
			<option value="">설정할 회원을  선택하세요</option>
<? foreach($memberD as $key => $mD) { if ($mD['mem_userid']=='admin') continue; ?>
			<option value="<?=$mD['mem_userid']?>" <?=$viewID==$mD['mem_userid']?"selected":""?>><?=$mD['mem_userid']?> _ <?=$mD['mem_username']?></option>
<? } ?>
		</select>

		<div class="row row-cols-1 row-cols-sm-4" id="divAdminAuth">
<? foreach(element('admin_page_menu', $layout) as $k => $setD) { ?>
			<div class="col">
				<h5><?=$setD['__config'][0]?></h5>
				<hr>
				<ul class="ul">
<? foreach(element('menu', $setD) as $k2 => $menuD) { ?>
					<li>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-check form-switch">
									<input class="form-check-input adminAuth" type="checkbox" name="auth['<?=$k2?>']" value="<?=$k2?>" role="switch" id="flexSwitchCheck<?=$k2?>" <?=element($k2, $adminAuthD)?"checked":""?>>
									<label class="form-check-label" for="flexSwitchCheck<?=$k2?>"> <?=$menuD[0]?></label>
								</div>
							</div>
						</div>
					</li>
<? } ?>
				</ul>
			</div>
<? } ?>
		</div>


	</div>
</div>

<script>
$(".adminAuth").on("change", function() {
	var isOn = ($(this).prop("checked")==true) ? 'on' : 'off';
	$.ajax({
		url: "/admin/member/adminauth/ajaxSetAdminAuth/",
		type: "POST",
		dataType: "html",
		data: {
			'viewID' : '<?=$viewID?>',
			'adminRole' : $(this).val(),
			'isOn' : isOn,
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		},
		success: function(data){
			console.log(data);
		}
	});
});
</script>
