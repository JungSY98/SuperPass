<div class="container">

	<div class="row" id="productYear">
		<div class="text-center">
			<a href="/product/lists/2024/" class="btn btn-dark font-green btnProductYear">2024</a>
			<a href="/product/lists/2023/"class="btn btn-dark font-green btnProductYear">2023</a>
		</div>
	</div>
	

	<div class="row pt-4" id="viewType">
		<div class="col-12 text-end">
			<a href="/product/lists/<?=$year?>/?viewType=box"><i class="fa fa-th-large"></i></a>
			<a href="/product/lists/<?=$year?>/?viewType=list"><i class="fa fa-th-list"></i></a>
		</div>
	</div>

	<div class="productGrid row">
<? foreach($productD as $pKey => $pD) { ?>
		<div class="productITEM col-12">
			
			<a class="productLink2" href="/product/view/<?=$pD['picD'][0]['year']?>/<?=$pD['no']?>/" title="<?=$pD['pName'.$lang]?> _ Detail View">
			<div class="row">
				<div class="col-lg-3">
					<div class="productPic lazy" style="background-image:url('/uploads/product/<?=$pD['picD'][0]['year']?>/<?=$pD['no']?>/<?=$pD['picD'][0]['echoFileName']?>');"></div>
				</div>
				<div class="col-lg-9 pt-3">
					<h5><?=$pD['brandName'.$lang]?></h5>
					<p class="productNameList"><?=$pD['pName'.$lang] ? $pD['pName'.$lang] : $pD['pNameKR']?></p>
					<div class="productExplainList"><?=$pD['pDesc'.$lang] ? $pD['pDesc'.$lang] : $pD['pDescKR']?></div>
					<hr class="pHR">
				</div>
			</div>
			</a>
		</div>
<? } ?>
</div>



<script src="/assets/lazy/jquery.lazy.js"></script>
<script src="/assets/js/masonry.pkgd.min.js"></script>
<script>
$(".lazy").lazy();
/*
$('.productGrid').masonry({
	columnWidth: '.productPic',
	itemSelector: '.productPic',
	percentPosition: true
});
*/
</script>