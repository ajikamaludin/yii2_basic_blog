<?php
use yii\helpers\Inflector as flack;
use yii\helpers\Html;
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
	<link type="text/css" rel="stylesheet" href="<?= Url::to(['css/style.css'])?>" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Header -->
	<header id="home">
		<!-- Background Image -->
		<div class="bg-img" style="background-image: url(<?= Url::to(['img/background1.jpg'])?>);">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Nav -->
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="index.html">
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
					<li><a href="<?= Url::to('#home') ?>">Home</a></li>
					<li><a href="<?= Url::to('#about') ?>">About</a></li>
					<li><a href="<?= Url::to('#blog') ?>">Blog</a></li>
					<li><a href="#project" onclick="location.href='<?= Url::to(['projects']) ?>'">Project</a></li>
					<li class="has-dropdown"><a href="<?= Url::to('#contact') ?>">Contact</a>
						<ul class="dropdown">
							<li><a href="<?= Url::to('#contact') ?>">Download</a></li>
						</ul>
					</li>
					<!-- <li><a href="#contact">Contact</a></li> -->
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		<!-- home wrapper -->
		<div class="home-wrapper">
			<div class="container">
				<div class="row">

					<!-- home content -->
					<div class="col-md-10 col-md-offset-1">
						<div class="home-content">
							<h1 class="white-text"><?= $setting->welcome_title ?></h1>
							<p class="white-text">Welcome to website</p>
							<a href="<?= $setting->link_home ?>"><button class="main-btn" style="color: black;">More</button></a>
							<!-- <button class="main-btn">Learn more</button> -->
						</div>
					</div>
					<!-- /home content -->

				</div>
			</div>
		</div>
		<!-- /home wrapper -->

	</header>
	<!-- /Header -->

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
						<!-- Row -->
						<div class="row">
							<!-- profile content -->
							<div class="col-md-5">
								<div style="border-radius: 50%;overflow: hidden; width: 250px; height: 250px; margin: 0 auto">
									<img src="<?= Url::to([$profile->foto_file]) ?>" height="100%">
								</div>
								
								<h4 style="text-align: center; padding-top: 5%;"><?= $profile->nama ?></h4>
								<p style="text-align: center; padding-bottom: 3%; color: #FAFAFA;"><i><?= $profile->short_desc ?></i></p>
							</div>
							<!-- /profile content -->

							<!-- About slider -->
							<div class="col-md-7" style="padding-left: 5%;">
								<div style="padding: 0 10px">
									<p style="text-align: justify; color: black; padding-top: 20px;"><?= $profile->long_desc ?></p>
									<a href="profile">See detail</a>
								</div>
								
								
							</div>

						</div>
			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Profile -->


	<!-- blog -->
	<div id="blog" class="section md-padding bg-dark-grey" style="border: 0px;">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Recents Blog</h2>
				</div>
				<!-- /Section header -->

				<?php foreach($posts as $post): ?>
				<!-- blog -->
				<div class="col-md-4">
					<div class="blog">
						<div class="blog-img">
							<a href="<?= Url::to(["blog/$post->slug"]) ?>"><img class="img-responsive" src="<?= Url::to([$post->gambar]) ?>" alt=""></a>
						</div>
						<div class="blog-content">
							<ul class="blog-meta">
								<li class="date"><i class="fa fa-user"></i><?= $profile->nama ?></li>
								<li class="date"><i class="fa fa-clock-o"></i><?= Yii::$app->formatter->asDate($post->updated_at, 'long') ?></li>
								<li class="date"><i class="fa fa-comments"></i>0</li>
							</ul>
							<a href="<?= Url::to(["blog/$post->slug"]) ?>"><h3 class="blog-title"><?= $post->judul ?></h3></a>

							<?= Html::tag('p', (substr($post->body,0,300)), ['class' => 'content']) ?>
							
							<!-- <br><a href="blog/<?= ($post->slug) ?>"><u>Read more</u></a> -->
						</div>
					</div>
				</div>
				<!-- /blog -->
				<?php endforeach; ?>

			</div>
			<!-- /Row -->
			<div style="text-align: center; margin-top: 5%;">
				<a href="<?= Url::to(['blogs']) ?>"><button class="main-btn" style="color: black;">View More</button></a>
			</div>
			
		</div>
		<!-- /Container -->

	</div>
	<!-- /blog -->

	<!-- Project -->
	<div id="project" class="section md-padding bg-grey" style="border: 0px;">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Project</h2>
				</div>
				<!-- /Section header -->

				<!-- service -->
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div style="text-align: center;">
						<div id="about-slider" class="owl-carousel owl-theme">
							<?php foreach($projects as $project): ?>
							<img class="img-responsive" src="<?= Url::to([$project->gambar_file]) ?>" alt="">
							<?php endforeach;?>
						</div>
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
				<!-- /service -->

			</div>
			<!-- /Row -->
			<div style="text-align: center; margin-top: 5%;">
				<a href="<?= Url::to(['projects']) ?>"><button class="main-btn" style="color: #171719">View More</button></a>
			</div>
		</div>
		<!-- /Container -->

	</div>
	<!-- /Project -->


	<!-- Contact -->
	<div id="contact" class="section md-padding bg-dark-grey">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section-header -->
				<div class="section-header text-center">
					<h2 class="title">Contact Us</h2>
				</div>
				<!-- /Section-header -->

				<!-- contact -->

				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-instagram" style="color: #cacace;"></i>
						<h3>Instagram</h3>
						<p><?= $profile->instagram_account ?></p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-envelope" style="color: #cacace;"></i>
						<h3>Email</h3>
						<p><?= $profile->email ?></p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<a href="<?= Url::to([$profile->cv_file]) ?>"><i class="fa fa-download" style="color: #cacace;"></i></a>
						<a href="<?= Url::to([$profile->cv_file]) ?>"><h3>Download</h3></a>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact form -->
				<div class="col-md-8 col-md-offset-2">
					<form class="contact-form">
						<input type="text" class="input" placeholder="Name">
						<input type="email" class="input" placeholder="Email">
						<input type="text" class="input" placeholder="Subject">
						<textarea class="input" placeholder="Message"></textarea>
						<button class="main-btn" style="color: black;">Send message</button>
					</form>
				</div>
				<!-- /contact form -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Contact -->


	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-footer">

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

	<script type="text/javascript">
		// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 500, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
	</script>

</body>

</html>
