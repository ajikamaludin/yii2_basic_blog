<?php
//
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
	<link type="text/css" rel="stylesheet" href="<?= Url::to(['css/style-aji.css'])?>" />
	<link type="text/css" rel="stylesheet" href="<?= Url::to(['css/blog.css'])?>" />
	<link type="text/css" rel="stylesheet" href="<?= Url::to(['css/pagination.css'])?>" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
  <header>
		
	<!-- Nav -->
	<nav id="nav" class="navbar nav-transparent fixed-nav">
		<div class="container">

			<div class="navbar-header">
				<!-- Logo -->
				<div class="navbar-brand">
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
				<li><a href="<?= Url::to(['#about']) ?>">About</a></li>
				<li class="active"><a href="#blog">Blog</a></li>
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
	<!-- Nav -->
	<!--Section 1 : Blog-->
	<div class="header-wrapper sm-padding bg-dark-grey" style="padding-top: 90px;">
		<div class="section-header text-center">
			<h2 class="title">Blog Page</h2>
		</div>
	</div>
	<!--Section 1 : Blog-->
	</header>
	<div class="blog_content bg-custom">
		<div class="container">
			<div class="row">
				
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 blog_right">
					<div class="row row-flex">	
						<?php
							if($message != null){
								echo "<h2> ". $message ." </h2>";
							}
						?>
						<?php foreach($posts as $post): ?>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_item">
							<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
								<div class="img-force-wrapper">
									<img class="img-force" src="<?= Url::to([$post->gambar]) ?>" alt="blog_1">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
								<div class="item-content">
									<div class="content-title">
										<a href="<?= Url::to(["blog/$post->slug"]) ?>"><?= $post->judul ?></a>
									</div>
									<div class="content-meta">
										<?= ($profile->nama) ?> | <?= \Yii::$app->formatter->asDate($post->updated_at) ?>
									</div>
									<div class="row content-description">
										<p>
											<?= substr($post->body,0,300) ?>
										</p>
									</div>
									<div class="blog_more">
										<a href="<?= Url::to(["blog/$post->slug"]) ?>" class="button litle">READ MORE</a>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>

				<aside class="col-xs-12 col-sm-3 col-md-3 col-lg-3 blog_left">
					<div class="search-box">
						<form action="<?= Url::to(['blogs']) ?>" method="get">
							<input type="text" class="search-input" name="q" placeholder="Search">
						</form>
					</div>

					<div class="about-author">
						<div class="tag-title">
							<p>About Author</p>
						</div>
						<div class="author-picture">
							<img src="<?= Url::to([$profile->foto_file]) ?>" alt="">
						</div>
						<div class="author-name">
							<p><?= $profile->nama ?></p>
						</div>
						<div class="author-short">
							<p><?= $profile->short_desc ?></p>
						</div>
						<div class="author-description">
							<p>  
							<?= $profile->long_desc ?>
							</p>
						</div>
					</div>

					<div class="tag-box">	
						<div class="tag-title">
							<p>Categories</p>
						</div>
						<div class="tag-list">
							<?php foreach($tags as $tag): ?>
							<p onclick="location.href='<?= Url::to('blogs?tag='.$tag->nama) ?>'"> <?= $tag->nama ?> </p>
							<?php endforeach;?>
						</div>
					</div>
				</aside>
			</div>
			<div class="row">
				<!-- Pagination -->
				<div style="text-align: center; margin: 0px; border: 0px;">

					<?php
					if($pagination != null){
						echo LinkPager::widget([
							'pagination' => $pagination,
						]);
					}
					?>
			
				</div>
				<!-- Pagination -->
			</div>
		</div>	
	</div>

	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-footer">

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
	<!-- jQuery Plugins -->
	<script type="text/javascript" src="<?= Url::to(['js/jquery.min.js']) ?>"></script>
	<script type="text/javascript" src="<?= Url::to(['js/bootstrap.min.js']) ?>"></script>
	<script type="text/javascript" src="<?= Url::to(['js/owl.carousel.min.js']) ?>"></script>
	<script type="text/javascript" src="<?= Url::to(['js/jquery.magnific-popup.js']) ?>"></script>
	<script type="text/javascript" src="<?= Url::to(['js/main.js']) ?>"></script>
</body>
</html>