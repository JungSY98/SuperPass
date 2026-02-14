<div class="container pt-5 pb-5">
	<h3 class="h3Board"><?php echo element('fgr_title'.$isEn, element('faqgroup', $view)); ?></h3>
	<hr>
	<form class="text-center" action="<?php echo current_url(); ?>" onSubmit="return faqSearch(this)">
		<div class="input-group searchInputGroup">
			<span class="input-group-text"><a href="/faq/registranion2024"><?=$siteTitle['listAll']?></a></span>
			<span class="input-group-text"><?=$siteTitle['faqSearch']?></span>
			<label for="faqkeyword"><span class="ir-text"><?=$siteTitle['faqSearch']?></span></label>
			<input type="text" id="faqkeyword" name="skeyword" value="<?php echo html_escape($this->input->get('skeyword')); ?>" class="form-control" placeholder="Search" />
			<button class="btn btn-dark p-3" type="submit"><i class="fa fa-search"></i> <span class="ir-text"<?=$siteTitle['faqSearch']?></span></button>
		</div>
	</form>
<script type="text/javascript">
//<![CDATA[
function faqSearch(f) {
	var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
	if (skeyword.length < 2) {
		alert('2글자 이상으로 검색해 주세요');
		f.skeyword.focus();
		return false;
	}
	return true;
}
//]]>
</script>
</div>



<div class="container list-group mt-2" id="accordion" role="tablist" aria-multiselectable="true">
<h4 class="faqLIttit ir-text">전체</h4>
<?php
$i = 0;
if (element('list', element('data', $view))) {
	foreach (element('list', element('data', $view)) as $result) {
?>
	<button class="btn btn-light  text-start btnCate btn<?=substr(md5(element("faq_cate", $result)),0,5)?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq_<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseExample"><?=strip_tags(element('title', $result))?></button>

	<div class="collapse mb-10 itemCate cate<?=substr(md5(element("faq_cate", $result)),0,5)?> " id="faq_<?php echo $i; ?>">
		<div class="card card-body"><?php echo element('content', $result); ?></div>
	</div>
<?php
		$i++;
	}
}
if ( ! element('list', element('data', $view))) {
?>
	<div class="card card-body">내용이 없습니다.</div>
<?php
}
?>
</div>

<nav><?php echo element('paging', $view); ?></nav>

<?php if ($this->member->is_admin() === 'super') { ?>
	<div class="text-center m-3">
		<a href="<?php echo admin_url('page/faq'); ?>?fgr_id=<?php echo element('fgr_id', element('faqgroup', $view)); ?>" class="btn btn-dark " target="_blank" title="FAQ 수정">FAQ 수정</a>
	</div>
<?php } ?>


<script>
function fnViewCate(type, obj) {
	$(".faqCate li").removeClass("active");
	$(".faqCate button").removeClass("active");
	$(".faqCate button").attr('title','');
	$("div.itemCate").removeClass("show");
	
	$(obj).addClass("active");
	$(obj).attr('title','현재 선택됨');
	if (type=='all') {
		$(".btnCate").slideDown(); // , .itemCate
	} else {
		$(".btnCate").slideUp(); // , .itemCate
		$(".btn"+type).slideDown(); // , .cate"+type
	}
}

document.title = 'FAQ < 창업센터 | 서울디자인창업센터'
</script>