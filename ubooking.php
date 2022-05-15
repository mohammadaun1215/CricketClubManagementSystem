<?php include'connection.php';
?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="zxx"> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang="zxx"> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang="zxx"> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cricket Club | Ground Booking</title>
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
								<h1>ground booking</h1>
						</div>
						<ol class="tg-breadcrumb">
							<li><a href="#">Home</a></li>
							<li class="active">Ground Bookings</li>
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
						<h2>ground bookings</h2>
					</div>
					<div class="col-sm-11 col-xs-11 pull-right">
						<div class="row">
							<div class="tg-contactus tg-haslayout">
								<div class="row">
									<div class="col-md-5 col-sm-12 col-xs-12">
										<div class="tg-contactinfobox">
											<div class="tg-description">
												<p>By filling this form you can book your ground, Your request will be recieved to our site Admin and you will be notified through email when your registration is approved.</p>
											</div>
											<?php
											$id = $_GET['gid'];
											$q=mysqli_query($con, "SELECT * from ground where ground_id=$id");
											while($row=mysqli_fetch_array($q))
											{$n = $row['name'];
											?>
											<article class="tg-post">
												<figure class="tg-postimg">
													<img src="<?= $row['image'];?>" class="rounded mx-auto d-block" height="200px" alt="image description"style="border: 10px solid transparent;">
													<figcaption>
														<ul class="tg-postmetadata">
															<li><a href="#"><?=$row['location'];?></a></li>
														</ul>
													</figcaption>
												</figure>
												<div class="tg-posttitle">
													<h3><?=$row['name'];?></h3>
												</div>
												<div class="tg-description">
													<p><?=$row['description'];?></p><br>
													<h5>Ground Seating Capacity : <?=$row['capacity'];?></h5>
													<h5>Ground Booking Cost : <?=$row['booking_cost'];?></h5>
													<br>
												</div>

											</article>
											<?php
											}
											?>
										</div>
									</div>
									<div class="col-md-7 col-sm-12 col-xs-12">
										<form action="code.php" method="POST" class="tg-commentform">
											<fieldset>
												<div class="form-group">
													<label>Full Name</label>
													<input type="text" required="true" placeholder="Name*" class="form-control" name="cusname">
												</div>
												<div class="form-group">
													<label>Email address</label>
													<input type="email" required="true" placeholder="Email*" class="form-control" name="cusemail">
												</div>
												<div class="form-group">
													<label>Mobile Number</label>
													<input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "11" required="true" placeholder="mobile no*" class="form-control" name="cusmob">
												</div>
												<div class="form-group">
													<label>Registration date</label>
													<input type="date" required="true" placeholder="date" class="form-control" name="cusdate">
												</div>

												<input type="hidden" value="<?=$n;?>" name="gname" >

												<div class="form-group">
												<button type="submit" class="tg-btn" name="booking_btn">Submit</button>
												</div>
											</fieldset>
										</form>
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