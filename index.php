<?php
include("connection.php");
?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="zxx"> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang="zxx"> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang="zxx"> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cricket Club | HomePage</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="upload/apple-touch-icon.png">
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
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--************************************
			Wrapper Start
	*************************************-->
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Mobile Menu Start
		*************************************-->
		<div id="tg-navigationm-mobile" class="tg-navigationm-mobile tg-navigation collapse navbar-collapse">
			<span id="tg-close" class="tg-close fas fa-times"></span>
			<div class="tg-colhalf">
				                    <ul>
                                    	<li><a href="buyticket.html">Home</a></li>
                                    	<li>
                                            <a href="#">Registrations</a>
                                            <ul class="tg-dropdown-menu">

                                                <li><a href="batch.php">Batch Registrations</a></li>
                                                <li><a href="playerreg.php">Member Registrations</a></li>
                                            </ul>
                                        </li>
                                    	<li><a href="buyticket.html">Photos</a></li>
                                    	<li><a href="buyticket.html">Videos</a></li>
                                    	<li><a href="contactus.html">Ground</a></li>
                                    	<li><a href="contactus.html">News</a></li>
                                    	<li><a href="contactus.html">Event</a></li>
                                    	<li><a href="buyticket.html">About</a></li>
                                    	<li><a href="contactus.html">Contactus</a></li>
                                    </ul>
			</div>
		</div>
		<!--************************************
				Mobile Menu End
		*************************************-->
		<?php include'header.php';?>
		<!--************************************
				Home Slider Start
		*************************************-->
		<div class="tg-sliderbox">
			<div class="tg-imglayer">
				<img src="upload/bg-pattran.png" alt="image desctription">
			</div>
			<div id="tg-home-slider" class="tg-home-slider tg-haslayout">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="container">
							<figure class="floating">
								<img src="upload/slider.png" alt="image description">
							</figure>
							<div class="tg-slider-content">
								<h1>Join <span>Our Club</span></h1>
								<div class="tg-btnbox">
									<h2>Register Now</h2>
									<a class="tg-btn" href="contactus.php"><span>contact us</span></a>
									<a class="tg-btn" href="uground.php"><span>grounds</span></a>
								</div>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="container">
							<figure class="floating">
								<img src="upload/slider.png" alt="image description">
							</figure>
							<div class="tg-slider-content">
								<h1>Join <span>Our Club</span></h1>
								<div class="tg-btnbox">
									<h2>Register Now</h2>
									<a class="tg-btn" href="contactus.php"><span>contact us</span></a>
									<a class="tg-btn" href="uground.php"><span>grounds</span></a>
								</div>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="container">
							<figure class="floating">
								<img src="upload/slider.png" alt="image description" >
							</figure>
							<div class="tg-slider-content">
								<h1>Join <span>Our Club</span></h1>
								<div class="tg-btnbox">
									<h2>Register Now</h2>
									<a class="tg-btn" href="contactus.php"><span>contact us</span></a>
									<a class="tg-btn" href="uground.php"><span>grounds</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tg-btn-next">
					<span>next</span>
					<span class="fa fa-angle-down"></span>
				</div>
				<div class="tg-btn-prev">
					<span>prev</span>
					<span class="fa fa-angle-down"></span>
				</div>
			</div>
		</div>
		<!--************************************
				Home Slider End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<?php
			$grounds=mysqli_query($con, "SELECT * FROM notice ORDER BY notice_id DESC LIMIT 1");
			while($g=mysqli_fetch_array($grounds))
			{
				$d = date('Y-m-d h:i:a',strtotime($g['notice_datetime']))
			?>
			<div class="container"><marquee style="font-size: 25px;" class="bg-info" height="28px"><span><i class="fas fa-bell"> </i></span> <?= $g['notice_detail'];?> Posted at : <?= $d;?></marquee></div>
			<?php
			}
			?>
			<!--************************************
					About Us Start
			*************************************-->
			<section class="tg-main-section tg-haslayout">
				<div class="container">
					<div class="tg-section-name">
						<h2>About our Clubs</h2>
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
											<div class="tg-section-heading"><h2>Clubs available :: Register your's now !</h2></div>
											<div class="tg-description">
												<p>Club cricket is a mainly amateur, but still formal, form of the sport of cricket, usually involving teams playing in competitions at weekends or in the evening. There is a great deal of variation in game format although the Laws of Cricket are observed.</p>
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
					Points Table Start
			*************************************-->
			<section class=" tg-haslayout tg-bgstyletwo">
				<div class="tg-bgboxone"></div>
				<div class="tg-bgboxtwo"></div>
				<div class="tg-bgpattrant">
					<div class="container">
						<div class="row">
							<div class="tg-pointstablewrapper">
								<div class="col-sm-8 col-xs-12">
									<div class="tg-pointstable">
										<div class="tg-section-heading"><h2>Events List</h2></div>
										<div id="tg-pointstable-slider" class="tg-pointstable-slider"><?php
													$grounds=mysqli_query($con, "SELECT * FROM event LIMIT 2");
													while($g=mysqli_fetch_array($grounds))
													{
													?>
													<div class="col-sm-6 col-xs-12">
														<article class="tg-post">
															<figure class="tg-postimg">
																<a href="#">
																	<img src="<?= $g['image'];?>" alt="image description" class="img-fluid" style="height: 155px !important; width: 100%;">
																</a>
																<figcaption>
																	<ul class="tg-postmetadata">
																		<li><a href="#">by admin</a></li>
																		<li><a href="#"><?= $d;?></a></li>
																	</ul>
																</figcaption>
															</figure>
															<div class="tg-posttitle"><h3 style="color: gold;"><?= $g['title'];?></h3></div>
															<div class="tg-description">
																<p style="color: white;"><?= $g['detail'];?></p>
															</div>
															<a class="tg-btn" href="uevent.php">Read more</a>
														</article>
													</div>
													<?php
													}
													?>
										</div>
										
									</div>
								</div>
								<div class="col-sm-4 col-xs-12 hidden-xs">
									<figure>
										<img src="upload/ground-list-img.png" alt="image description">
									</figure>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Points Table End
			*************************************-->
			<!--************************************
					Blog Start
			*************************************-->
			<section class="tg-main-section tg-haslayout">
				<div class="container">
					<div class="tg-section-name">
						<h2>Latest blog / news</h2>
					</div>
					<div class="col-sm-11 col-xs-11 pull-right">
						<div class="row">
							<div class="tg-blogpost">
								<div class="row">
									<?php
										$grounds=mysqli_query($con, "SELECT * FROM news LIMIT 2");
										while($g=mysqli_fetch_array($grounds))
										{
											$d = date('Y-m-d h:i:a', strtotime($g['date']));
										?>
									<div class="col-sm-6 col-xs-12">
										<article class="tg-post">
											<figure class="tg-postimg">
												<a href="#">
													<img src="<?= $g['image'];?>" alt="image description" width="300px">
												</a>
												<figcaption>
													<ul class="tg-postmetadata">
														<li><a href="#">by admin</a></li>
														<li><a href="#"><?= $d;?></a></li>
													</ul>
												</figcaption>
											</figure>
											<div class="tg-posttitle"><h3><a href="#"><?= $g['title'];?></a></h3></div>
											<div class="tg-description">
												<p><?= $g['detail'];?></p>
											</div>
											<a class="tg-btn" href="unews.php">Read more</a>
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
					Blog End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
		<?php include 'footer.php'; ?>
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<!--************************************
			Search Start
	*************************************-->
	<div class="tg-searchbox">
		<a id="tg-close-search" class="tg-close-search" href="javascript:void(0)"><span class="fas fa-times"></span></a>
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

	<script type="text/javascript">
	
	</script>
</body>


</html>