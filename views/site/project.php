<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>ENDARCORE</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="<?= Url::to(['css/bootstrap.min.css'])?>" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="<?= Url::to(['css/owl.carousel.css'])?>" />
	<link type="text/css" rel="stylesheet" href="<?= Url::to(['css/owl.theme.default.css'])?>" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="<?= Url::to(['css/magnific-popup.css'])?>" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="<?= Url::to(['css/font-awesome.min.css'])?>">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?= Url::to(['css/style-udin.css'])?>" />
	<link type="text/css" rel="stylesheet" href="<?= Url::to(['css/pagination.css'])?>" />

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
							<img class="logo" src="<?= Url::to([$setting->navbar_logo]) ?>" alt="endarcore">
							<img class="logo-alt" src="<?= Url::to([$setting->navbar_logo]) ?>" alt="endarcore">
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
				<li><a href="<?= Url::to(['#home']) ?>">Home</a></li>
				<li><a href="<?= Url::to(['#about']) ?>">About</a></li>
				<li><a href="<?= Url::to(['#blog']) ?>">Blog</a></li>
				<li class="active"><a href="#">Project</a></li>
				<li class="has-dropdown"><a href="<?= Url::to(['#contact']) ?>">Contact</a>
					<ul class="dropdown">
						<li><a href="<?= Url::to(['#contact']) ?>">Download</a></li>
					</ul>
				</li>
				<!-- <li><a href="#contact">Contact</a></li> -->
			</ul>	
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		


	<!-- Portfolio -->
	<div id="portfolio" class="section md-padding bg-grey" style="border-bottom-width: 0px;">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">My Project</h2>
				</div>
				<!-- /Section header -->

				<!-- Work -->
				<?php foreach($projects as $p): ?>
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="<?= ($p->gambars != null) ? Url::to([$p->gambars[0]->gambar_file]) : Url::to(['img/blog3.jpg']) ?>" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<span><?= $p->judul ?></span>
						<p id="deskripsiprojek1">
							<?= $p->short_desc ?>
						</p>
						<div class="work-link">
							<a href="<?= Url::to(['project/'.$p->id]) ?>" class="btn">Read More</a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<!-- /Work -->

								

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Portfolio -->

	<!-- Pagination -->
	<div style="text-align: center; margin: 0px; border-bottom: solid 1px darkgrey;border-top: 0px; padding-bottom: 50px;" class="bg-grey">

		<?php
			echo LinkPager::widget([
				'pagination' => $pagination,
				'options' => [
					'class' => 'pagination',
				]
			]);
		?>

	</div>
	<!-- Pagination -->

	


	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-footer" style="border-top: 3px solid #999999">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<!-- footer logo -->
					<div class="footer-logo" >
						<a href="."><img class="img-responsive" src="<?= Url::to([$setting->footer_logo]) ?>" alt="endarcore" style="margin: 0 auto;"></a>
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
	<script type="text/javascript" src="<?= Url::to(['js/jquery.min.js']) ?>"></script>
	<script type="text/javascript" src="<?= Url::to(['js/bootstrap.min.js']) ?>"></script>
	<script type="text/javascript" src="<?= Url::to(['js/owl.carousel.min.js']) ?>"></script>
	<script type="text/javascript" src="<?= Url::to(['js/jquery.magnific-popup.js']) ?>"></script>
	<script type="text/javascript" src="<?= Url::to(['js/main.js']) ?>"></script>

</body>

</html>
