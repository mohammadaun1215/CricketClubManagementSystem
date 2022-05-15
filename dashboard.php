<?php   
session_start();  
include 'connection.php';
if(!isset($_SESSION["username"])){  
  header("location:login.php");  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/mscrollbar/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
</head>

<body class="hold-transition sidebar-mini layout-footer-fixed layout-navbar-fixed sidebar-collapse layout-fixed">
<div class="wrapper">
    <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center dark-mode">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark text-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <form action="code.php" method="post">
          <input type="submit" value="Sign Out" 
          class="btn btn-outline-danger btn-xs btn-rounded waves-effect waves-light" 
          name="btn_logout" style="margin-right:10px;">
        </form>
        
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Pak Cricket Club</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= $_SESSION['picture']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['username'];?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item ">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin.php" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
              Administrator
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="member.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
              Members
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="photo.php" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
              Photos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="video.php" class="nav-link">
              <i class="nav-icon fas fa-video"></i>
              <p>
              Videos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ground.php" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
              Ground
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="news.php" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
              News
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="contact.php" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
              ContactUs
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="event.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
              Event
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="booking.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
              Booking
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="batch.php" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
              Batch
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="database.php" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
              Database
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php 
                  $count1 = mysqli_query($con,"select count(*) as no from ground");
                  while ($d=mysqli_fetch_assoc($count1)) {
                    echo'<h3 style="margin-left:20px;">'.$d['no'].'</h3>';
                  }?>
                <p>Registered Grounds</p>
              </div>
              <div class="icon">
                <i class="fas fa-building"></i>
              </div>
              <a href="ground.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php 
                  $count2 = mysqli_query($con,"select count(*) as no from batch");
                  while ($d=mysqli_fetch_assoc($count2)) {
                    echo'<h3 style="margin-left:20px;">'.$d['no'].'</h3>';
                  }?>
                <p>Registered Batches</p>
              </div>
              <div class="icon">
                <i class="fas fa-graduation-cap"></i>
              </div>
              <a href="batch.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php 
                  $count3 = mysqli_query($con,"select count(*) as no from member");
                  while ($d=mysqli_fetch_assoc($count3)) {
                    echo'<h3 style="margin-left:20px;">'.$d['no'].'</h3>';
                  }?>

                <p>Member Registered</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="member.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php 
                  $count4 = mysqli_query($con,"select count(*) as no from booking where is_approved = 0");
                  while ($d=mysqli_fetch_assoc($count4)) {
                    echo'<h3 style="margin-left:20px;">'.$d['no'].'</h3>';
                  }?>

                <p>Pending Requests</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="booking.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="container" style="margin-bottom: 20px;">
          <form method="POST" action="code.php">
            <div class="row">
              <div class="col-md-1" style="text-align: center;">
                <label style="margin-top: 5px;">Notice : </label>
              </div>
                <div class="col-md-9">
                    <input type="text" class="form-control form-control-border border-width-2" placeholder="Enter Notice" name="notice" required="true">
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-danger btn-block" name="notice_btn">Post notice</button>
                  </div>
            </div>
          </form>
        </div>
        

        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Recap Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>

                    <div class="progress-group">
                      Add Products to Cart
                      <span class="float-right"><b>160</b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Complete Purchase
                      <span class="float-right"><b>310</b>/400</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Visit Premium Page</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Send Inquiries
                      <span class="float-right"><b>250</b>/500</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">TOTAL REVENUE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">TOTAL COST</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">GOAL COMPLETIONS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Send Email</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="code.php" enctype='multipart/form-data'>
                    <div class="form-group row">
                      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">From</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control form-control-sm" name="from" placeholder="Enter sender email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Subject</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" name="subject" placeholder="Enter email subject">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Body</label>
                      <div class="col-sm-10">
                        <textarea class="form-control form-control-sm" name="body" rows="2" placeholder="Enter email body text"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label col-form-label-sm">To</label>

                      <div class="col-sm-10">
                        <div class="select2-red">
                        <select onchange="checkOptions(this)" class="select2 " multiple="multiple" data-placeholder="Select Emails" data-dropdown-css-class="select2-red" style="width: 100%;" name="emails[]" required="true">
                            <option value="member">All Members</option>
                            <option value="admin">All Admin</option>
                            <option value="subscribe">All Subscribers</option>
                            <option value="batch_reg">Batch Student</option>
                            <option value="other">Other</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-2"></div>
                      <div class="col-sm-10" >
                        <input type="email" id='otherInput' style="display: none;" class="form-control form-control-sm" placeholder="Other Email Address">

                        <div class="select2-red" id='batches' style="display: none;">
                        <select  class="select2 " multiple="multiple" data-placeholder="Select Batch" data-dropdown-css-class="select2-red" style="width: 100%;" name="batches[]" required="true">
                            <?php
                              $result = mysqli_query($con,"select name from batch"); 
                              while($table = mysqli_fetch_array($result)) { 
                                echo "<option value='".$table[0]."'>".$table[0]."</option>";  
                              }
                            ?>
                          </select>
                        </div>
                      </div>

                    </div>
                    <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-paperclip"></i></span>
                            </div>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input " name="file" required="true">
                              <label class="custom-file-label">Attachment (Optional)</label>
                            </div>
                          </div>
                        </div>
                    
                      <div class="card-footer">
                        <button type="submit" class="btn btn-danger btn-block" name="send_email">Send</button>
                      </div>
                  </form>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
      
  <!-- Main Footer -->
  <footer class="main-footer text-sm dark-mode">
    <strong>Copyright &copy; 2020-<?php echo date("Y");?> <a href="index.php" target="_blank" style="color: #42D9E8;">PakCricketClub</a> </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block" >
      <a href="https://www.facebook.com/login/web/" target="_blank"><i class="fab fa-facebook" style="color: white;  border-radius: 50%; margin-right: 10px; font-size: 18px;"></i></a>
      <a href="https://twitter.com/login" target="_blank"><i class="fab fa-twitter" style="color: white;  border-radius: 50%; margin-right: 10px; font-size: 18px;"></i></a>
      <a href="https://www.google.com.pk/" target="_blank"><i class="fab fa-google" style="color: white;  border-radius: 50%; margin-right: 10px; font-size: 18px;"></i></a>
      <a href="https://github.com/" target="_blank"><i class="fab fa-github" style="color: white;  border-radius: 50%; margin-right: 10px; font-size: 18px;"></i></a>
    </div>
  </footer>

</div>
<a class="gotopbtn"><i class="fas fa-arrow-up"></i></a>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/pages/dashboard2.js"></script>
<script src="plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>

  <script>
    (function($){
      $(window).on("load",function(){
        
        $("body").mCustomScrollbar({
          autoHideScrollbar:true,
          theme:"inset-2-dark"
        });
      });
    })(jQuery);
  
    $(function () {
    bsCustomFileInput.init();
  });
    
$(function () {
    $('.select2').select2()
  });

var otherInput;
var batches;
function checkOptions(select) {
  otherInput = document.getElementById('otherInput');
  batches = document.getElementById('batches');

  if (select.options[select.selectedIndex].value == "other") {
     otherInput.style.display = 'block';
     batches.style.display = 'none';
  }
  else if(select.options[select.selectedIndex].value == "batch_reg"){

    batches.style.display = 'block';
    otherInput.style.display = 'none';

  }
  else if(select.options[select.selectedIndex].value == ""){

    otherInput.style.display = 'none';
    batches.style.display = 'none';
  }
  else{

     otherInput.style.display = 'none';
     batches.style.display = 'none';
  }
}
  </script>
</body>
</html>
