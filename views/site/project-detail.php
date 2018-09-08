<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>ENDACORE</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="/css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="/css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="/css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="/css/style-udin.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Header -->
	<header>
		<!-- Nav -->
		<nav id="nav" class="navbar nav-transparent fixed-nav">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand" style="padding-left: 20px;">
						<a href="/">
							<img class="logo"  src="/<?= $setting->navbar_logo ?>"  alt="endarcore">
							<img class="logo-alt"  src="/<?= $setting->navbar_logo ?>"  alt="endarcore">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
				<li class=""><a href="/#home">Home</a></li>
				<li class=""><a href="/#about">About</a></li>
				<li class=""><a href="/#blog">Blog</a></li>
				<li class="active"><a href="/projects">Project</a></li>
				<li class="has-dropdown"><a href="/#contact">Contact</a>
					<ul class="dropdown">
						<li class=""><a href="/#contact">Download CV</a></li>
					</ul>
				</li>
				<!-- <li><a href="#contact">Contact</a></li> -->
			</ul>	
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		


	<!-- Portfolio -->
	<div id="portfolio" class="section md-padding bg-grey" style="border-bottom: solid 1px darkgrey">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
                    <h2 class="titleproject"><?= $project->judul ?></h2>
                    <h5 class="textcolor titledesc"><?= $project->short_desc ?></h5>
				</div>
				<!-- /Section header -->

                <!-- Ilustrasi Projek -->
         <div class="col-md-6 project">
					<!-- <img class="img-responsive" src="./img/work1.jpg" alt=""> -->
					<div class="col-md-12" style="text-align: center;">
						<div id="about-slider" class="owl-carousel owl-theme">
							<?php foreach($project->gambars as $g):?>
							<img class="img-responsive imgw" src="/<?= $g->gambar_file ?>" alt="">
							<?php endforeach;?>
						</div>
					</div>
                </div>
                <div class="col-md-6">
                    <p>Client &ensp;&ensp;&ensp;: <?= $project->client ?></p>
                    <p>Tanggal &ensp;: <?= Yii::$app->formatter->asDate($project->date) ?></p>
                    <p>Deskripsi :</p>
                    <p>
						<?= $project->long_desc ?>
					</p>
                </div>
				
								

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Portfolio -->


	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-footer" style="border-top: 3px solid #999999">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<!-- footer logo -->
					<div class="footer-logo" >
							<a href="/"><img class="img-responsive"  src="/<?= $setting->footer_logo ?>"  alt="endarcore" style="margin: 0 auto;"></a>				
					</div>
					<!-- /footer logo -->
					<!-- footer copyright -->
					<div class="footer-copyright">
						<p style="display: none;">Copyright © 2017. All Rights Reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
						<p>Copyright © <?= date('Y') ?>. All Rights Reserved.</p>
					</div>
					<!-- /footer copyright -->

				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="/js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
	<script type="text/javascript" src="/js/clamp.min.js"></script>

	<!-- Script Clamping -->
	<script>
		var textclamp1 = document.getElementById("deskripsiprojek1");
		var textclamp2 = document.getElementById("deskripsiprojek2");
		var textclamp3 = document.getElementById("deskripsiprojek3");
		var textclamp4 = document.getElementById("deskripsiprojek4");
		var textclamp5 = document.getElementById("deskripsiprojek5");
		var textclamp6 = document.getElementById("deskripsiprojek6");
		$clamp(textclamp1, {clamp: 6});
		$clamp(textclamp2, {clamp: 6});
		$clamp(textclamp3, {clamp: 6});
		$clamp(textclamp4, {clamp: 6});
		$clamp(textclamp5, {clamp: 6});
		$clamp(textclamp6, {clamp: 6});
	</script>

</body>

</html>
