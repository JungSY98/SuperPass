<section class="aboutC1 ">

	<div id="productYear">
		<div class="text-center">
			<a href="/about/2024/" class="btn btn-dark font-green btnProductYear">2024</a>
			<a href="/about/2023/"class="btn btn-dark font-green btnProductYear">2023</a>
		</div>
	</div>

	<div class="container max1920" id="aboutContent">
		<div class="row">
			<div class="col-xl-5 p-0 aboutPoster align-middle">
				<img src="/assets/images/aboutPoster.jpg" class="w-100">
			</div>
			<div class="col-xl-7 aboutExpBox  p-0">
				<img src="/assets/images/aboutLogo.png" class="aboutLogo">

				<h4>그린칩스 페스티벌 2024<br>GREENCHIPS FESTIVAL 2024</h4>

				<p class="fPeriod">2024.10. 17(Thu) ~ 10. 27(Sun) </p>
				<p class="fPlace">Seongsu Project-Rent OLDTOWN, SEOCHON LOUNGE, DDP Art Hall Exhibition Hall 1</p>

				<p class="fBrand">2024 GREENCHIPS Participating Brands</p>
				<p class="fBrandList"><?
	foreach($brandD as $k => $bD) { 
		if ($k > 0)  echo ", ";
		echo $bD['bizName'.$lang];
	}
?></p>

			</div>
		</div>
		<div class="aboutMark">
			<div class="row">
				<div class="divEmblem col-lg-5">
					<div class="">
						<h5>EMBLEM</h5>
						<img src="/assets/images/aboutEmblem.png" alt="2024 EMBLEM">
					</div>
				</div>
				<div class="divSignature col-lg-7">
					<div class="">
						<h5>SIGNATURE</h5>
						<img src="/assets/images/aboutSignature.png" alt="2024 SIGNATURE">
					</div>
				</div>
			</div>
		</div>

		<div class="container max1920">
			<div class="divAboutExplain">
				<p>The Seoul Metropolitan Government and the Seoul Design Foundation launched the ‘Sustainable Design Products and Services Market Development Support Project’ for the first time in 2023. This initiative aims to discover excellent design companies with sustainable design products, support them in exploring domestic and international sales channels, strengthen their competitiveness, and promote the design industry.<br>The project aims to help participating brands secure market competitiveness, achieve high sales and added value, and enhance their survival capabilities through consulting, hosting online and offline pop-ups, and providing marketing support.</p>

				<p>To maximize the marketing impact of the ‘Sustainable Design Products and Services Market Development Support Project,’ the joint marketing brand ‘GREENCHIPS’ was developed. The name GREENCHIPS signifies the idea of proposing ‘sustainable living with ease, just like eating chips.’ It conveys that creating a sustainable environment can be as enjoyable as eating potato chips. This friendly, everyday image of the joint marketing brand aims to bring sustainable design closer to citizens in their daily lives.</p>
			</div>
		</div>



	</div>


</section>
