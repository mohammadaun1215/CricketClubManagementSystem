<?php 
include 'connection.php';
?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="zxx"> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang="zxx"> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang="zxx"> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cricket Club | Gallery</title>
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
	  <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel/dist/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="dist/css/responsive.css">
	<link rel="stylesheet" href="dist/css/style.css">
	<script src="dist/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<!-- Slider -->               
        <link rel="stylesheet" href="dist/css/owl.carousel.min.css"/> 
        <link rel="stylesheet" href="dist/css/owl.theme.default.min.css"/> 
        <link rel="stylesheet" href="dist/css/slick.css"/> 
        <link rel="stylesheet" href="dist/css/slick-theme.css"/>  

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
</head>
<body>
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<?php include'header.php';?>
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
							<h1>pictures</h1>
						</div>
						<ol class="tg-breadcrumb">
							<li><a href="#">Home</a></li>
							<li class="active">Gallery</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Banner End
		*************************************-->
		
       
			<!--************************************
					Pre Score Histroty Start
			*************************************-->
			<section class="tg-main-section tg-haslayout">
				<div class="container">
					<div class="tg-section-name">
						<h2>our pictures</h2>
					</div>
					<div class="col-sm-11 col-xs-11 pull-right">
						<div class="row">
							<div class="container" style='width: 100% !important;'>
								<div class="row">
									<section class="section">
										<div class="container-fluid">
										    <div class="row">							
										    	<?php
									              $query = "select * from photo limit 3";
									              $result = mysqli_query($con, $query);
									              if (mysqli_num_rows($result) > 0) 
									              {
									                  while($row = mysqli_fetch_assoc($result)) 
									                    {
									                    	$d= date("Y-m-d h:i:a", strtotime($row['upload_date']));
									              ?>
										            <div class="col-lg-4 col-md-6">
										                <div class="rounded position-relative overflow-hidden d-block">
										                    <div class="img">
										                        <img src="<?= $row['image']?>"  class="img-fluid" style="height: 300px !important; width: 100%;">
										                    </div>
										                    <div class="text-center p-4 bg-light">
										                        <h5><a href="javascript:void(0)" class="text-dark"><?= $row['title']?></a></h5>
										                            <p class="text-muted"><?= $row['description']?></p>
										                             upload datetime : <?= $d?>
										                    </div>
										                 </div>
										            </div>
										            <?php 
										             }
								                    } 
								                    else {
								                        echo "NO Result Found!";
								                    }
								                  ?>
										    </div>
										</div>
									</section>
								</div>
							</div>
						</div>
					</div>
					<?php $pagen?>
				</div>
			</section>


		

			<!--************************************
					Pre Score Histroty End
			*************************************-->
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
								<i class="icon-icon_search2"></i>
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
	<script src="plugins/OwlCarousel/dist/owl.carousel.min.js"></script>
	<!-- SLIDER -->
        <script src="dist/js/owl.carousel.min.js "></script>
        <script src="dist/js/owl.init.js "></script>
        <script src="dist/js/slick.min.js"></script> 
        <script src="dist/js/slick.init.js"></script> 

</body>

</html>