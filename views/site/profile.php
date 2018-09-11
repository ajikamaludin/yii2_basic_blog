<?php
use yii\helpers\Url;
?>
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
						<a href=".">
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
					<li class="active"><a href="#">About</a></li>
					<li><a href="<?= Url::to(['#blog']) ?>">Blog</a></li>
					<li class=""><a href="<?= Url::to(['projects']) ?>">Project</a></li>
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

	<!-- Profile -->
	<div id="about" class="section md-padding bg-grey" style="border: 0px;">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Profile</h2>
				</div>
                
                <!-- profile content -->
					<div style="border-radius: 50%;overflow: hidden; width: 300px; height: 300px; margin: 0 auto; margin-bottom: 30px;">
						<img src="<?= Url::to([$profile->foto_file]) ?>" height="100%">
					</div>
							<!-- /profile content -->
						<!-- Row -->
						<div class="row" style="margin-right: 3px; margin-left: 3px;">
							<!-- About slider -->
							<div class="" style="padding-left: 3%;">
								<div style="padding: 0 10px">
                                    <div class="row">
                                        <div class="col-md-2 col-xs-5" style="padding-right: 0px;">
                                            <p>Nama Lengkap</p>
                                            <p>Tanggal Lahir</p>
                                            <p>Pekerjaan Sekarang</p>
                                            <p class="hidden-xs">Tentang Saya</p>
                                            <p class="visible-xs">Tentang Saya &ensp;&ensp;:</p>
                                        </div>
                                        <div class="col-md-10 col-xs-7" style="padding-left: 0px;">
                                                <p>: <?= $profile->nama ?></p>
                                                <p>: <?= $profile->tgl_lahir ?></p>
                                                <p>: <?= $profile->pekerjaan ?> </p>
                                                <p class="hidden-xs">:</p>
                                        </div>
                                    </div>
									<p style="text-align: justify; color: black;">
										<?= $profile->long_desc ?>
									</p>
								</div>
							</div>

                        </div>
                        <!-- /Row -->
            </div>
            <!-- /Row -->
            
            <hr>
            <div style="margin-top: 30px;">
                <h4 style="text-align: center;">Riwayat Pekerjaan Saya</h4>
                <div class="row" style="">
                    <div class="col-md-5">
						<?php foreach($pekerjaan as $kerja): ?>
						<p>- <?= $kerja->nama ?></p>
						<?php endforeach; ?>
                    </div>
                </div>
            </div>

		</div>
		<!-- /Container -->

	</div>
	<!-- /Profile -->


	


	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-footer" style="border-top: 3px solid #999999">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<!-- footer logo -->
					<div class="footer-logo" >
						<a href="index.html"><img class="img-responsive" src="<?= Url::to([$setting->footer_logo]) ?>" alt="endarcore" style="margin: 0 auto;"></a>						
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
