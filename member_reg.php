<?php include'connection.php';?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="zxx"> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang="zxx"> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang="zxx"> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cricket Club | Member Register</title>
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
								<h1>Member Registrations</h1>
						</div>
						<ol class="tg-breadcrumb">
							<li><a href="#">Home</a></li>
							<li class="active">Member Registrations</li>
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
						<h2>Member registrations</h2>
					</div>
					<div class="col-sm-11 col-xs-11 pull-right">
						<div class="row">
							<div class="tg-contactus tg-haslayout">
								<div class="row">
									<div class="col-md-5 col-sm-12 col-xs-12">
										<div class="tg-contactinfobox">
											<div class="tg-section-heading"><h2>Member registrations</h2></div>
											<div class="tg-description">
												<p>By filling this form you can become our club member, or you can visit club for further details. You will be notified through email after submiting form confirmation.</p>
											</div>
											<ul class="tg-contactinfo">
												<li>
													<i class="fa fa-map-marker"></i>
													<address>Pakistan, Karachi, Nazimabad</address>
												</li>
												<li>
													<i class="fa fa-phone"></i>
													<span>+92 123 456 789 - 11</span>
												</li>
												<li>
													<i class="fa fa-envelope-o"></i>
													<a href="info%40domain.html">crickclub@domain.com</a>
												</li>
												<li>
													<i class="fa fa-skype"></i>
													<a href="info%40domain.html">cric_club_php</a>
												</li>
												<li>
													<i class="fa fa-facebook-f"></i>
													<a href="info%40domain.html">facebook.com/cric-club-php</a>
												</li>
												<li>
													<i class="fa fa-twitter"></i>
													<a href="info%40domain.html">twitter.com/cric_club_php</a>
												</li>
												<li>
													<i class="fa fa-laptop"></i>
													<a href="#">cric-club.ga</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-md-7 col-sm-12 col-xs-12">
										<form action="code.php" method="post" class="tg-commentform help-form" id="tg-commentform" enctype="multipart/form-data">
											<fieldset>
												<div class="form-group">
													<label>Enter full name</label>
													<input type="text" required="" placeholder="member name" class="form-control" name="name">
												</div>
												<div class="form-group">
													<label>Enter father name</label>
													<input type="text" required="" placeholder="father name" class="form-control" name="fname">
												</div>
												<div class="form-group">
													<label>Enter email address</label>
													<input type="email" required="" placeholder="email" class="form-control" name="email">
												</div>
												<div class="form-group">
													<label>Date of birth</label>
													<input type="date" required="" class="form-control" name="dob">
												</div>
												
                                                <div class="form-group">
                                                	<label>Enter Mobile number</label>
													<input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "11" required="" placeholder="mobile" class="form-control" name="mobile">
												</div>
												
                                                <div class="form-group">
                                                	<label>Enter city name</label>
													<input type="text" required="" placeholder="city" class="form-control" name="city">
												</div>
												
												<div class="form-group">
													<label>Enter home Address</label>
													<input type="text" required="" placeholder="address" class="form-control" name="address">
												</div>

												<div class="form-group">
							                        <label>Select member role</label>
							                        <div class="select2-red">
							                          <select class="form-control" name="role" required="true">
							                            <option disabled="" selected="">...select...</option>
							                             <option >Wicket keeper</option>
							                             <option >Bowler</option>
							                             <option >Batsmen</option>
							                             <option >All rounder</option>
							                          </select>
							                        </div>
							                      </div>
												
												<div class="form-group">
													<label>Enter educational qualification</label>
													<input type="text" required="" placeholder="education" class="form-control" name="edu">
												</div>

												<div class="">
													<label>Member image</label>
													<input type="file" name="file" style="height: 100px;">
												</div>

												<div class="form-group">
													<button type="submit" name="member_reg" class="tg-btn">Submit</button>
												</div>
											</fieldset>
										</form>
									</div>
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