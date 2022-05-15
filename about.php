<?php include 'connection.php';?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="zxx"> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang="zxx"> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang="zxx"> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cricket Club | About Us</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="dist/css/normalize.css">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="dist/css/transitions.css">
	<link rel="stylesheet" href="dist/css/prettyPhoto.css">
	<link rel="stylesheet" href="dist/css/swiper.min.css">
	<link rel="stylesheet" href="dist/css/jquery-ui.css">
	<link rel="stylesheet" href="dist/css/animate.css">
	<link rel="stylesheet" href="dist/css/owl.theme.css">
	<link rel="stylesheet" href="dist/css/owl.carousel.css">
	<link rel="stylesheet" href="dist/css/customScrollbar.css">
	<link rel="stylesheet" href="dist/css/icomoon.css">
	<link rel="stylesheet" href="dist/css/main.css">
	<link rel="stylesheet" href="dist/css/color.css">
	<link rel="stylesheet" href="dist/css/responsive.css">
	<script src="dist/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
	<?php
	include("header.php");
	?>
		<!--************************************
				Banner Start
		*************************************-->
		<div class="tg-banner tg-haslayout">
			<div class="tg-imglayer">
				<img src="images/bg-pattran.png" alt="image desctription">
			</div>
			<div class="container">
				<div class="row">
					<div class="tg-banner-content tg-haslayout">
						<div class="tg-pagetitle">
							<h1>about us</h1>
						</div>
						<ol class="tg-breadcrumb">
							<li><a href="#">Home</a></li>
							<li class="active">About Us</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Banner End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					About Us Start
			*************************************-->
			<section class="tg-main-section tg-haslayout">
				<div class="container">
					<div class="tg-section-name">
						<h2>About cricket club</h2>
					</div>
					<div class="col-sm-11 col-xs-11 pull-right">
						<div class="row">
							<div class="tg-aboutussection">
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12">
										<figure>
											<img src="upload/img-aboutus.jpg" alt="image description">
										</figure>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<div class="tg-contentbox">
											<div class="tg-section-heading"><h2>About Cricket Club</h2></div>
											<div class="tg-description">
												<p>Club cricket is a mainly amateur, but still formal, form of the sport of cricket, usually involving teams playing in competitions at weekends or in the evening. There is a great deal of variation in game format although the Laws of Cricket are observed.</p>
											</div>
											<div class="tg-btnbox">
												<a class="tg-btn" href="batch.php"><span>Register you Batch</span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					About Us End
			*************************************-->
			<!--************************************
					Statistics Start
			*************************************-->
			<section class="tg-main-section tg-haslayout tg-bgdark">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<div class="tg-statistics">
							<?php
								
								$grounds=mysqli_query($con, "SELECT COUNT(*) as tltgrounds FROM booking");
								while($g=mysqli_fetch_array($grounds))
								{
								?>								
								<div class="tg-statistic tg-goals">
									<span class="tg-icon far fa-star"></span>
									<h2><span class="tg-statistic-count" data-from="0" data-to="<?=$g['tltgrounds'];?>" data-speed="8000" data-refresh-interval="50"><?=$g['tltgrounds'];?></span></h2>
									<h3>Ground Bookings</h3>
								</div>
									<?php
									}
									?>

									<?php
									$plyrcount=mysqli_query($con, "SELECT COUNT(*) as plyreg FROM member");
									while($plyrreg=mysqli_fetch_array($plyrcount))
									{
									?>
								<div class="tg-statistic tg-activeplayers">
									<span class="tg-icon far fa-user"></span>
									<h2><span class="tg-statistic-count" data-from="0" data-to="<?=$plyrreg['plyreg'];?>" data-speed="8000" data-refresh-interval="50"><?=$plyrreg['plyreg'];?></span></h2>
									<h3>Registered Members</h3>
								</div>
									<?php
									}
									?>

									<?php
									$batchregcount=mysqli_query($con, "SELECT COUNT(*) as batchreg FROM batch");
									while($batchcount=mysqli_fetch_array($batchregcount))
									{
									?>
								<div class="tg-statistic tg-activeteams">
									<span class="tg-icon fas fa-graduation-cap"></span>
									<h2><span class="tg-statistic-count" data-from="0" data-to="<?=$batchcount['batchreg'];?>" data-speed="8000" data-refresh-interval="50"><?=$batchcount['batchreg'];?></span></h2>
									<h3>Registered Batchs</h3>
								</div>
									<?php
									}
									?>

									<?php
									$grounds=mysqli_query($con, "SELECT COUNT(*) as tltgrounds FROM ground");
									while($g=mysqli_fetch_array($grounds))
									{
									?>
								<div class="tg-statistic tg-earnedawards">
									<span class="tg-icon far fa-building"></span>
									<h2><span class="tg-statistic-count" data-from="0" data-to="<?=$g['tltgrounds'];?>" data-speed="8000" data-refresh-interval="50"><?=$g['tltgrounds'];?></span></h2>
									<h3>Ground Available</h3>
								</div>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Statistics End
			*************************************-->
			<!--************************************
					Pre Score Histroty Start
			*************************************-->
			<section class="tg-main-section tg-haslayout">
				<div class="container">
					<div class="tg-section-name">
						<h2>our grounds</h2>
					</div>
					<div class="col-sm-11 col-xs-11 pull-right">
						<div class="row">
							<div class="tg-prohistory tg-border-top tg-haslayout">
								<div class="row">
									<?php
									$grounds=mysqli_query($con, "SELECT * FROM ground LIMIT 4");
									while($g=mysqli_fetch_array($grounds))
									{
									?>
									<div class="col-md-3 col-sm-6 col-xs-6">
										<article class="tg-post">
											<figure class="tg-postimg">
												<img src="<?= $g['image'];?>" alt="image description">
												<figcaption>
													<ul class="tg-postmetadata">
														<li><a href="#">Ground Capacity <?= $g['capacity'];?></a></li>
													</ul>
												</figcaption>
											</figure>
											<div class="tg-posttitle">
												<h3><a href="#"><?= $g['name'];?></a></h3>
											</div>
											<div class="tg-description">
												<p><?= $g['description'];?></p>
											</div>
										</article>
									</div>
									<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Pre Score Histroty End
			*************************************-->
			
			<!--************************************
					Testimonials Start
			*************************************-->
			<section class="tg-testimonial tg-haslayout tg-bgdark">
				<div class="container">
					<div class="row">
						<div id="tg-testimonial-slider" class="tg-testimonial-slider tg-haslayout">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<figure>
										<img src="upload/about-us-train.png" alt="image description">
									</figure>
									<div class="tg-contentbox">
										<div class="tg-section-heading">
											<h2>Join our training club</h2>
										</div>
										<div class="tg-description">
											<p>Group Coaching can be arranged with the coach for dates that are suitable for both of you.All cricketers need to bring their own equipment. GKC will have coaching equipment and tools for each lesson. All players to wear training shoes and their GKC shirt and cap to all lessons.</p>
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Testimonials End
			*************************************-->
			<!--************************************
					Our Sponser Start
			*************************************-->
			<section class="tg-main-section tg-haslayout">
				<div class="container">
					<div class="tg-section-name">
						<h2>our sponsers</h2>
					</div>
					<div class="col-sm-11 col-xs-11 pull-right">
						<div class="row">
							<div class="tg-latestresult tg-oursponsers">
								<div class="row">
									<div class="col-md-5 col-sm-12 col-xs-12">
										<div class="tg-contentbox">
											<div class="tg-section-heading"><h2>you can see the list of our club sponsers here</h2></div>
											<div class="tg-description">
												<p>Sponsoring something (or someone) is the act of supporting an event, activity, person, or organization financially or through the provision of products or services. The individual or group that provides the support, similar to a benefactor, is known as sponsor.</p>
											</div>
											
										</div>
									</div>
									<div class="col-md-7 col-sm-12 col-xs-12">
										<div id="tg-upcomingmatch-slider" class="tg-upcomingmatch-slider tg-upcomingmatch">
											<div class="swiper-wrapper">
												<div class="swiper-slide">
													<div class="tg-match">
														<div class="tg-matchdetail">
															<div class="tg-box">
																<strong class="tg-teamlogo">
																	<img src="upload/sponser/img-01.png" alt="image description">
																</strong>
															</div>
															<div class="tg-box">
																<span>sponsored in 2021</span>
																<h3>Cricket league</h3>
															</div>
														</div>
													</div>
												</div>
												<div class="swiper-slide">
													<div class="tg-match">
														<div class="tg-matchdetail">
															<div class="tg-box">
																<strong class="tg-teamlogo">
																	<img src="upload/sponser/img-02.png" alt="image description">
																</strong>
															</div>
															<div class="tg-box">
																<span>sponsored in 2021</span>
																<h3>Cricket league</h3>
															</div>
														</div>
													</div>
												</div>
												<div class="swiper-slide">
													<div class="tg-match">
														<div class="tg-matchdetail">
															<div class="tg-box">
																<strong class="tg-teamlogo">
																	<img src="upload/sponser/img-03.png" alt="image description">
																</strong>
															</div>
															<div class="tg-box">
																<span>sponsored in 2021</span>
																<h3>Cricket league</h3>
															</div>
														</div>
													</div>
												</div>
												<div class="swiper-slide">
													<div class="tg-match">
														<div class="tg-matchdetail">
															<div class="tg-box">
																<strong class="tg-teamlogo">
																	<img src="upload/sponser/img-01.png" alt="image description">
																</strong>
															</div>
															<div class="tg-box">
																<span>sponsored in 2021</span>
																<h3>Cricket league</h3>
															</div>
														</div>
													</div>
												</div>
												<div class="swiper-slide">
													<div class="tg-match">
														<div class="tg-matchdetail">
															<div class="tg-box">
																<strong class="tg-teamlogo">
																	<img src="images/sponser/img-02.png" alt="image description">
																</strong>
															</div>
															<div class="tg-box">
																<span>sponsored in 2021</span>
																<h3>Cricket league</h3>
															</div>
														</div>
													</div>
												</div>
												<div class="swiper-slide">
													<div class="tg-match">
														<div class="tg-matchdetail">
															<div class="tg-box">
																<strong class="tg-teamlogo">
																	<img src="images/sponser/img-03.png" alt="image description">
																</strong>
															</div>
															<div class="tg-box">
																<span>sponsored in 2021</span>
																<h3>Cricket league</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Our Sponser End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
		<?php
		include("footer.php");
		?>
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<!--************************************
			Search Start
	*************************************-->
	<div class="tg-searchbox">
		<a id="tg-close-search" class="tg-close-search" href="javascript:void(0)"><span class="fas fa-search"></span></a>
		<div class="tg-searcharea">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<form class="tg-form-search">
							<fieldset>
								<input type="search" class="form-control" placeholder="keyword">
								<i class="fas fa-search"></i>
							</fieldset>
						</form>
						<p>Start typing and press Enter to search</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--************************************
			Search End
	*************************************-->
	<script src="dist/js/vendor/jquery-library.js"></script>
	<script src="dist/js/vendor/bootstrap.min.js"></script>
	<script src="dist/js/customScrollbar.min.js"></script>
	<script src="dist/js/owl.carousel.js"></script>
	<script src="dist/js/isotope.pkgd.js"></script>
	<script src="dist/js/prettyPhoto.js"></script>
	<script src="dist/js/swiper.min.js"></script>
	<script src="dist/js/jquery-ui.js"></script>
	<script src="dist/js/countTo.js"></script>
	<script src="dist/js/appear.js"></script>
	<script src="dist/js/main.js"></script>
</body>

</html>