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
  <title>Admin | Database</title>

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

<style type="text/css">
    .project-tab {
    padding: 10%;
    margin-top: -8%;
    }
    .project-tab #tabs{
        background: #007b5e;
        color: #eee;
    }
    .project-tab #tabs h6.section-title{
        color: #eee;
    }
    .project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: #0062cc;
        background-color: transparent;
        border-color: transparent transparent #f3f3f3;
        border-bottom: 3px solid !important;
        font-size: 16px;
        font-weight: bold;
    }
    .project-tab .nav-link {
        border: 1px solid transparent;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
        color: #0062cc;
        font-size: 16px;
        font-weight: 600;
    }
    .project-tab .nav-link:hover {
        border: none;
    }
    .project-tab thead{
        background: #f3f3f3;
        color: #333;
    }
    .project-tab a{
        text-decoration: none;
        color: #333;
        font-weight: 600;
    }
</style>
</head>

<body class="hold-transition sidebar-mini layout-footer-fixed layout-navbar-fixed sidebar-collapse layout-fixed">
<div class="wrapper">  

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
            <a href="dashboard.php" class="nav-link">
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
            <a href="database.php" class="nav-link active">
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
            <h1 class="m-0">Backup/Restore Database</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Database</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Backup Database</h3>
              </div>
              <div class="card-body">
                  <form method="post" action="code.php" enctype='multipart/form-data'>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label>Host Name</label>
                            <input type="text" class="form-control form-control-border border-width-2" placeholder="Enter Host Name" name="hostname" required="true">
                          </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control form-control-border border-width-2" placeholder="Enter User Name" name="username" required="true">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                              <label>Password</label>
                              <input type="Password" class="form-control form-control-border border-width-2" placeholder="Enter Password" name="Password">
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label>Database Name</label>
                            <input type="text" class="form-control form-control-border border-width-2" placeholder="Enter Database Name" name="dbname" required="true">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Select Table (All or table name)</label>
                        <div class="select2-red">
                          <select class="select2" multiple="multiple" data-placeholder="Select Table" data-dropdown-css-class="select2-red" style="width: 100%;" name="tblname[]" required="true">
                            <option>All</option>
                            <?php
                              $result = mysqli_query($con,"show tables"); 
                              while($table = mysqli_fetch_array($result)) { 
                                echo "<option value='".$table[0]."'>".$table[0]."</option>";  
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-danger btn-block" name="backup_btn">Backup</button>
                      </div>
                  </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Restore Database</h3>
              </div>
              <div class="card-body">
                  <form method="post" action="code.php" enctype='multipart/form-data'>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label>Host Name</label>
                            <input type="text" class="form-control form-control-border border-width-2" placeholder="Enter Host Name" name="hostname2" required="true">
                          </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control form-control-border border-width-2" placeholder="Enter User Name" name="username2" required="true">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                              <label>Password</label>
                              <input type="Password" class="form-control form-control-border border-width-2" placeholder="Enter Password" name="Password2" >
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label>Database Name</label>
                            <input type="text" class="form-control form-control-border border-width-2" placeholder="Enter Database Name" name="dbname2" required="true">
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                          <label>Database File (.sql)</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input " name="file" required="true">
                              <label class="custom-file-label">Choose file</label>
                            </div>
                          </div>
                        </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-danger btn-block" name="restore_btn">Restore</button>
                      </div>
                  </form>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
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
  </footer>     <i class="fab fa-github"></i>
        </button>
    </div>
  </footer>

</div>
<a class="gotopbtn"><i class="fas fa-arrow-up"></i></a>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
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
</script>

</body>
</html>
