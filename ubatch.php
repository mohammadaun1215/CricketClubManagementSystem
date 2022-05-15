<?php include 'connection.php';?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="zxx"> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang="zxx"> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang="zxx"> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cricket Club | Batches</title>
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
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<?php
		include("header.php");
		?>
		<!--************************************
				Banner Start
		*************************************-->
		<div class="tg-banner tg-haslayout">
			<div class="tg-imglayer">
				<img src="upload/bg-pattran.png" alt="image desctription">
			</div>
			<div class="container">
				<div class="row">
					<div class="tg-banner-content tg-haslayout">
						<div class="tg-pagetitle">
								<h1>Batches</h1>
						</div>
						<ol class="tg-breadcrumb">
							<li><a href="#">Home</a></li>
							<li class="active">Batches</li>
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
		<main id="tg-main" class="tg-main tg-paddingbottom-zero tg-haslayout">
			<section class="tg-main-section tg-paddingbottom-zero tg-haslayout">
				<div class="container">
					<div class="tg-section-name">
						<h2>available batches</h2>
					</div>
					<div class="col-sm-11 col-xs-11 pull-right">
						<div class="row">
							<div class="tg-contactus tg-haslayout">
								<div class="row">
									<?php
										$grounds=mysqli_query($con, "SELECT * FROM batch ");
										while($g=mysqli_fetch_array($grounds))
										{
											$s = date("h:i:a", strtotime($g['start_time']));
											$e = date("h:i:a", strtotime($g['end_time']));
										?>
									<div class="col-md-4 col-sm-6 col-xs-6">
										<article class="tg-post">
											<div class="tg-posttitle"><h3><a href="#"><?= $g['name'];?></a></h3></div>
											<div class="tg-description">
												<p>Batch start date : <?= $g['start_date'];?><br>
												Batch timing : <?=$s;?> To <?=$e;?><br>
												<?php
												$id= $g['ground_id'];
						                        $q2 = "select name from ground where ground_id='$id'";
						                          $result2 = mysqli_query($con,$q2);
						                          while ($d=mysqli_fetch_assoc($result2)) {
						                            echo 'Location : '.$d['name'].'<br>';
						                          }
						                         ?>
												No of seats : <?= $g['no_of_seats'];?></p>
											</div>
											<a class="tg-btn" href="batch_reg.php?bid=<?=$g['batch_id'];?>">Register</a>
											
										</article><br>
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
</body>

</html>