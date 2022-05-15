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
	<title>Cricket Club | Videos</title>
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
<style type="text/css">
  .owl-carousel .item-video{
    height: 500px;

  }
 .overlay {
  min-height: 50vh;
  display: flex;
  align-items: center;
  justify-content: center;
	}
	.overlay h4 {
    background: #000 none repeat scroll 0 0;
    color: tan;
    font-weight: 600;
    margin: 2rem 3rem 0;
    mix-blend-mode: overlay;
    padding: 5px 15px;
    text-align: center;
	}
	video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  -o-object-fit: cover;
     object-fit: cover;
  -o-object-position: center;
     object-position: center;
	}
</style>
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
				<img src="upload/bg-pattran.png" alt="image desctription">
			</div>
			<div class="container">
				<div class="row">
					<div class="tg-banner-content tg-haslayout">
						<div class="tg-pagetitle">
							<h1>videos</h1>
						</div>
						<ol class="tg-breadcrumb">
							<li><a href="#">Home</a></li>
							<li class="active">Videos</li>
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
						<h2>our videos</h2>
					</div>
					
					<div class="col-sm-11 col-xs-11 pull-right">
						<div class="row">
							<div class="container" style='width: 100% !important;'>
								<div class="row">
													<div class="owl-carousel owl-theme"> 
					                  <?php
					                    $query = "select * from video";
					                    $result = mysqli_query($con, $query);
					                    if (mysqli_num_rows($result) > 0) 
					                    {
					                        while($row = mysqli_fetch_assoc($result)) 
					                          {
					                    ?>
					                  <div class="item-video">
					                    <div class="container">
					                      <video controls preload="auto" width="100%" height="500px">
					                        <source src="<?= $row['video']?>" />
					                      </video>
					                       <div class="overlay">
					                        <h4><?=$row['title'];?></h4>
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
							</div>
						</div>
					</div>
				</div>
			</section>
		
			<!--************************************
					Pre Score Histroty End
			*************************************-->
            
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
	<script type="text/javascript">
      $('.owl-carousel').owlCarousel({
          items:1,
          autoplayHoverPause:true,
          loop:true,
          margin:10,
          video:true,
          responsiveClass:true,
          center:true
      }); 

	</script>
</body>

</html>