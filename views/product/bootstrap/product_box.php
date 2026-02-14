<div class="container-fluid max1920">

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
		<div class="productITEM col-lg-4 col-sm-6 lazy">
			<h5><?=$pD['brandName'.$lang]?></h5>
			<div class="productPic" style="background-image:url('/uploads/product/<?=$pD['picD'][0]['year']?>/<?=$pD['no']?>/<?=$pD['picD'][0]['echoFileName']?>');">
				<a class="productLink" href="/product/view/<?=$pD['picD'][0]['year']?>/<?=$pD['no']?>/" title="<?=$pD['pName'.$lang] ? $pD['pName'.$lang] : $pD['pNameKR']?> _ Detail View">
				<p class="productName"><?=$pD['pName'.$lang] ? $pD['pName'.$lang] : $pD['pNameKR']?></p>
				</a>
			</div>
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