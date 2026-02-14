<div class="text-left divSuperpassDesc">
	<div class="container">
		<div class="p-3" style="background-color:var(--key-green);color:white;">
			<!-- <img src="/assets/images/superpass_head.jpg" alt="Stamp Tour Details" style="max-width:100%;height:auto;"/> -->
			<a class="navbar-brand" href="/"><span>DDP</span> DONGDAEMUN <span>SUPERPASS</span></a>
			<p class="mt-3">
<? if ($langField == 'KR') { ?>
			DDP, 두타몰, 현대아울렛 동대문점, 태극당 및 지역 상인이 함께하는 지역 상권 활성화 프로젝트 일환으로 동대문 지역 방문객(관광객) 대상 쇼핑몰과 상점에서 할인 혜택을 제공하는 쿠폰 서비스입니다.
<? } else { ?>
			It is a coupon service that offers discounts at shopping malls and local stores in the Dongdaemun area, as part of a local business revitalization project in collaboration with DDP, Doota Mall, Hyundai City Outlet Dongdaemun, Taegukdang, and local merchants.
<? } ?>
			</p>
		</div>
		<hr>

		<h5 class="text-center mt-3">Sponsor</h5>
		<!-- BranchD List -->
<?
	foreach($branchD as $k => $bD) {
		$address = $langField == 'KR' ? $bD['sAddr1KR'].' '.$bD['sAddr2KR'] : $bD['sAddr2EN'].' '.$bD['sAddr1EN'];
		$chkLocation = $_SERVER['DOCUMENT_ROOT']."/uploads/branch/";
		if ($bD['sMainIMG_Source'] && file_exists($chkLocation.$bD['sMainIMG_Source'])) {
			$pic = '/uploads/branch/'.$bD['sMainIMG_Source'];
		} else if (element(0, $bD['imgD']) && file_exists($chkLocation.element("file_name", element(0, $bD['imgD'])))) {
			$pic = '/uploads/branch/'.element("file_name", element(0, $bD['imgD']));
		} else {
			$pic = '/assets/image/no-image.jpg';
		}
?>
		<div class="sponserList mb-2">
			<div class="sponserIMG" style="background-image:url('<?=$pic?>');"></div>
			<div class="sponserDesc">
				<h5><?=$bD['sNameKR']?><br><?=$bD['sNameEN']?></h5>
				<address class="mb-0">
					<?=$bD['sContact']?>
<? if ($bD['sLink1']) { ?>
					<span class="float-end"><a href="<?=prep_url($bD['sLink1'])?>" target="_blank" class="font-white"><i class="fa fa-home"></i></a></span>
<? } ?>
<? if ($bD['sLink2']) { ?>
					<span class="float-end me-2"><a href="https://www.instagram.com/<?=$bD['sLink2']?>" target="_blank" class="font-white"><i class="fa fa-instagram"></i></a></span>
<? } ?>
				</address>
			</div>
		</div>
<? } ?>
		<!-- StoreD List -->
<?
/*
	foreach($storeD as $k => $bD) {
		$address = $langField == 'KR' ? $bD['sAddr1KR'].' '.$bD['sAddr2KR'] : $bD['sAddr2EN'].' '.$bD['sAddr1EN'];
		$chkLocation = $_SERVER['DOCUMENT_ROOT']."/uploads/store/";
		if ($bD['sMainIMG_Source'] && file_exists($chkLocation.$bD['sMainIMG_Source'])) {
			$pic = '/uploads/store/'.$bD['sMainIMG_Source'];
		} else if (element(0, $bD['imgD']) && file_exists($chkLocation.element("file_name", element(0, $bD['imgD'])))) {
			$pic = '/uploads/store/'.element("file_name", element(0, $bD['imgD']));
		} else {
			$pic = '/assets/image/no-image.jpg';
		}
?>
		<div class="sponserList mb-2">
			<div class="sponserIMG" style="background-image:url('<?=$pic?>');"></div>
			<div class="sponserDesc">
				<h5><?=$bD['sName'.$langField]?></h5>
				<address class="mb-0"><?=$address?> / <?=$bD['sContact']?></address>
			</div>
		</div>
<? } */ ?>
	</div>
</div>