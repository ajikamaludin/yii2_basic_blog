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
	<link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="/css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="/css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="/css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="/css/style-aji.css" />
	<link type="text/css" rel="stylesheet" href="/css/blog.css" />

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
					<a href="/">
						<img class="logo" src="/<?= $setting->navbar_logo ?>" alt="endarcore">
						<img class="logo-alt" src="/<?= $setting->navbar_logo ?>" alt="endarcore">
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
				<li class="active"><a href="/blogs">Blog</a></li>
				<li class=""><a href="/projects">Project</a></li>
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
	<!-- Nav -->
	</header>
	<div class="blog_content bg-custom">
		<div class="container">
			<div class="row">
				
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 blog_right">
					<div class="row row-flex">						
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_single">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div>
									<img class="img-force" src="http://di-demo.owl-themes.net/images/blogpost/col_2_9.jpg" alt="blog_1">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="item-content">
									<div class="single-title">
										<?= $post->judul ?>
									</div>
									<div class="content-meta">
										<?= ($profile->nama) ?> | <?= \Yii::$app->formatter->asDate($post->updated_at) ?>
									</div>
									<div class="row content-full">
										<p>
										<?= ($post->body) ?>
										</p>
									</div>
									<p style="font-weight:bold;font-size: 16px;" >Categories : </p>
									<div class="tag-list">
										<?php foreach($tags as $t): ?>
										<p><?= $t ?></p>
										<?php endforeach; ?>
									</div>
									<!-- <div class="comment">
										<div class="row comment-item">
											<div class="col-md-3 img-comment">
												<img src="http://di-demo.owl-themes.net/images/blogpost/col_2_9.jpg" alt="">
											</div>
											<div class="col-md-9">
												<div class="comment-name">
													<p>Harish SS</p>
												</div>
												<div class="comment-fill">
													Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi sapiente distinctio nobis harum facere dicta quod. Vitae, minus
												</div>
											</div>
										</div>
									</div> -->
									<!-- <div class="comment-input">
										<div class="comment-title">
											Leave a comment
										</div>
										<div class="comment-form">
											<div class="row">
												<div class="col-md-6">
													<input type="text" class="form-control form-comment"  placeholder="name">
												</div>
												<div class="col-md-6">
													<input type="text" class="form-control form-comment"  placeholder="email">
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<textarea name="comment" id="" class="form-control form-comment"  cols="30" rows="10"></textarea>
													<input type="submit" class="form-control btn btn-comment">
												</div>
											</div>
										</div>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>

				<aside class="col-xs-12 col-sm-3 col-md-3 col-lg-3 blog_left">

					<div class="about-author">
						<div class="tag-title">
							<p>About Author</p>
						</div>
						<div class="author-picture">
							<img src="/<?= $profile->foto_file ?>" alt="">
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
						<div class="rec-title">
							<p style="font-size:20px;font-weight:bold;">Recommended for you</p>
						</div>
						<div class="blog-list">
							<?php foreach($recommands as $r): ?>
							<a href="/blog/<?= $r->slug ?>" ><p><?= $r->judul ?></p></a>
							<?php endforeach; ?>
						</div>
					</div>
				</aside>
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
					<div class="footer-logo">
							<a href="/"><img class="img-responsive" src="/<?= $setting->navbar_logo ?>"  alt="endarcore" style="margin: 0 auto;"></a>				
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
		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
		<script type="text/javascript" src="/js/jquery.magnific-popup.js"></script>
		<script type="text/javascript" src="/js/main.js"></script>
</body>
</html>