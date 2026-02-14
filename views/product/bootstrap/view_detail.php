<div class="container-fluid p-0 max1920">
	<div class="productTopIMG" id="productTopIMG" style="background-image:url('<?=$topIMG_tag?>')">
		<h1><?=str_replace("(", "<br>(", ($productD['pName'.$lang])? $productD['pName'.$lang] : $productD['pNameKR'])?></h1>
	</div>

	<div  id="divProductContent">

		<div class="row" id="productYear">
			<div class="col-lg-2 offset-lg-4">
				<button class="btn btn-dark font-green btnProductYear d-none">2024</button>
			</div>
			<div class="col-lg-2">
				<button class="btn btn-dark font-green btnProductYear d-none">2023</button>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-3" id="divProductLeft">
				<h5>OVERVIEW</h5>

				<div class="divBrandLink">
<? if (element("bWebsite", $productD) || element("bizTel", $productD) || element("bizEmail", $productD) || element("bSNS1", $productD) || element("bSNS2", $productD) || element("bSNS3", $productD) || element("bSNS4", $productD)) { ?>
					<p>사이트 바로가기</p>
<? } ?>
					<div class="row">
						<div class="col">
<? if (element("bWebsite", $productD)) { ?>
							<a href="<?=prep_url(element("bWebsite", $productD))?>" target="_blank"><i class="fa fa-home"></i></a>
<? } ?>
<? if (element("bizTel", $productD)) { ?>
							<a href="tel:<?=element("bizTel", $productD)?>"><i class="fa fa-phone"></i></a>
<? } ?>
<? if (element("bizEmail", $productD)) { ?>
							<a href="mailto:<?=element("bizEmail", $productD)?>"><i class="fa fa-envelope-o"></i></a>
<? } ?>
<? if (element("bSNS1", $productD)) { ?>
							<a href="https://www.instagram.com/<?=str_replace("@", "", element("bSNS1", $productD))?>" target="_blank"><i class="fa fa-instagram"></i></a>
<? } ?>
<? if (element("bSNS2", $productD)) { ?>
							<a href="https://www.facebook.com/<?=element("bSNS2", $productD)?>" target="_blank"><i class="fa fa-facebook"></i></a>
<? } ?>
<? if (element("bSNS3", $productD)) { ?>
							<a href="https://blog.naver.com/<?=element("bSNS3", $productD)?>" target="_blank" class="aBlog"><img src="/assets/images/btnBlog.png"></a>
<? } ?>
<? if (element("bSNS4", $productD)) { 
	if (preg_match("/(\r?\n)/", element("bSNS4", $productD))) { 
		$sns = explode(PHP_EOL, element("bSNS4", $productD));
		foreach($sns as $kk => $sD) {
			echo '							<a href="'.prep_url($sD).'" target="_blank"><i class="fa fa-external-link"></i></a>'."\n";
		}
	} else {
?>
							<a href="<?=prep_url(element("bSNS4", $productD))?>" target="_blank"><i class="fa fa-external-link"></i></a>
<? } } ?>

						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="divProductConent">
<? // 설명
	$pDesc = element("pDesc".$langType1, $productD) ? element("pDesc".$langType1, $productD) : element("pDescKR", $productD);
?>
					<div class="divProductDesc"><?=nl2br($pDesc)?></div>
					<div class="divProductIMG">
<?
	foreach($productD['picD'] as $pK => $picD) { 
		$origFileName = $picD['file_name'];
		$file = explode(".", $origFileName);
		$fileName = element(0, $file)."_resize.".element(1, $file);
		$chkLocation = $_SERVER['DOCUMENT_ROOT']."/uploads/product/".$picD['year']."/".$picD['productNo']."/".$fileName;
		$echoFileName = (file_exists($chkLocation)) ? $fileName : $origFileName;
?>
						<div class="productDetailIMG" style="background-image:url('');">
							<img src="<?="/uploads/product/".$picD['year']."/".$picD['productNo']."/".$echoFileName?>" class="w-100 viewDetailIMG">
						</div>
<? } ?>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="offset-lg-3 col-lg-9" id="divBrandView">
				<h5>BRAND</h5>
				<p><?=element(1, element(0, $productD['bizExplain'.$lang]))?></p>
			</div>
		</div>
	</div>


	<div class="productBottom text-center sticky-bottom">
		<div class="productBottomWrap">
			<div class="productBottomList">
				<ul class="pBottomList">
<? foreach($productList as $pK => $pD) { ?>
					<li><a href="/product/view/<?=$pD['year']?>/<?=$pD['no']?>/"><?=$pD['pName'.$lang] ? $pD['pName'.$lang] : $pD['pNameKR']?></a></li>
<? } ?>
				</ul>
			</div>
			<button class="btn btn-dark font-green" onclick="location = '/'; ">HOME</button>
			<button class="btn btn-dark font-green" onclick="fnViewList()">PRODUCT</button>
		</div>
	</div>

</div>


<script>
function fnViewList() {
	if ( $(".productBottomList").css("display")=="none") {
		$(".productBottomList").fadeIn();
	} else {
		$(".productBottomList").fadeOut();
	}
}
$("#divProductContent, #productTopIMG").on("click", function() {
	if ( $(".productBottomList").css("display")=="block") {
		$(".productBottomList").fadeOut();
	}
});
</script>
