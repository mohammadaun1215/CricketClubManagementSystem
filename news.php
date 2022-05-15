<?php   
session_start();  
include("connection.php");
if(!isset($_SESSION["username"])){  
    header("location:login.php");  
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | News</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/mscrollbar/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="hold-transition sidebar-mini layout-footer-fixed layout-navbar-fixed sidebar-collapse layout-fixed">
<!-- Site wrapper -->
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
            <a href="news.php" class="nav-link active">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>News</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">News</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="content">
      <div class="container">
             <!-- Default box -->
      <div class="card card-success">
        <div class="card-header">
        <button type="button" class="btn btn-light btn-xs btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#staticBackdrop">
              <i class="fas fa-plus"> Add News </i>
            </button>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body ">
          <table id="myTable" class="table table-striped table-bordered table-responsive text-nowrap" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>
                          #
                      </th>
                      <th>
                          Title
                      </th>
                      <th>
                          Date
                      </th>
                      <th>
                          Detail
                      </th>
                      <th>
                          Image
                      </th>
                      <th>
                          Actions
                      </th>
                  </tr>
              </thead>
                      <?php
              $query = "select * from news";
              $result = mysqli_query($con, $query);
              if (mysqli_num_rows($result) > 0) 
              {
                  while($row = mysqli_fetch_assoc($result)) 
                    {
                      echo '
                      <tr>
                          <td>'.$row['news_id'].'</td>
                          <td>'.$row['title'].'</td>
                          <td>'.$row['date'].'</td>
                          <td>'.$row['detail'].'</td>
                          <td><img src='.$row['image'].' alt="news_image" class="rounded mx-auto d-block" width="50px" height="50px;"></td>
                          <td>
                              <a class="btn btn-info btn-sm editbtn" href="#" ><i class="fas fa-pencil-alt"></i> Edit</a>
                              <a class="btn btn-danger btn-sm deletebtn" href="#"><i class="fas fa-trash"></i> Delete</a>
                          </td>
                      </tr>';
                        }
                    } 
                  ?>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->  
      </div>
    </div>
  <!-- ################################################################################################################################## -->
      <!-- insert Modal -->
      <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="staticBackdropLabel">Add News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="code.php" enctype='multipart/form-data'>
                  <div class="modal-body">
                    
                          <div class="form-group ">
                              <label>Title</label>
                              <div class="input-group">
                              <input type="text" class="form-control" name="title" placeholder="Enter News Title"  required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Date</label>
                              <div class="input-group">
                              <input type="datetime-local" class="form-control" name="date" required="true" placeholder="Enter News DateTime"required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Detail</label>
                              <div class="input-group">
                              <textarea class="form-control" name="detail" placeholder="Enter News detail" rows="2" required="true"></textarea>
                              </div>
                          </div>
                          <div class="form-group">
                            <label>Image</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input"  name="file" required="true">
                                <label class="custom-file-label" >Choose file</label>
                              </div>
                            </div>
                          </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                      <button type="submit" name="insert_news" class="btn btn-primary">Save Data</button>
                  </div>
                  </div>
                </form>
              </div>
          </div>
        </div>
  <!-- ########################################################################################################################### -->
  <!-- Update Modal -->
    <!-- /.content -->
    <div class="modal fade" id="editmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header bg-success">
                <h5 class="modal-title" id="staticBackdropLabel">Update News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form method="POST" action="code.php" enctype='multipart/form-data'>
              <div class="modal-body">
                
                          <input type="hidden" name="update_id" id="update_id">
                      <div class="form-group">
                          <label>Title</label>
                          <div class="input-group">
                           <input type="text" class="form-control" id="title" name="title" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Date</label>
                          <div class="input-group">
                           <input type="datetime-local" class="form-control" id="date" name="date" >
                          </div>
                          
                      </div>
                      <div class="form-group">
                          <label>Detail</label>
                          <div class="input-group">
                           <textarea class="form-control" name="detail" id="detail" rows="2"></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="file">
                            <label class="custom-file-label">Choose file</label>
                          </div>
                        </div>
                      </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button type="submit" name="update_news" class="btn btn-primary">Update Data</button>
              </div>
              </div>
            </form>
          </div>
        </div>
     </div>
   <!-- /.content-wrapper -->
    <!--###############################################################################################################-->
    <div class="modal fade" id="deletemodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success">
                  <h5 class="modal-title" id="staticBackdropLabel">Delete News</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <form method="POST" action="code.php" >
                <div class="modal-body">
                <input type="hidden" name="delete_id" id="delete_id">
                <h4> Do you want to delete this News ?</h4>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                    <button type="submit" name="delete_news" class="btn btn-primary">YES! Delete it</button>
                </div>
                </div>
              </form>
            </div>
         </div>
     </div>

  <!--###############################################################################################################-->
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
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
$(document).ready(function (){
  $('.deletebtn').on('click', function(){
    $('#deletemodal').modal('show');

    $tr = $(this).closest('tr');

    var data1 = $tr.children("td").map(function(){
      return $(this).text();
    }).get();

    console.log(data1);

    $('#delete_id').val(data1[0]);

  });
});

$(document).ready(function (){
  $('.editbtn').on('click', function(){
    $('#editmodal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function(){
      return $(this).text();
    }).get();

    console.log(data);

    $('#update_id').val(data[0]);
    $('#title').val(data[1]);
    $('#date').val(data[2]);
    $('#detail').val(data[3]);
  });
});

$(function () {
  bsCustomFileInput.init();
});


$(document).ready( function () {
    $('#myTable').DataTable();
});
(function($){
      $(window).on("load",function(){
        
        $("body").mCustomScrollbar({
          autoHideScrollbar:true,
          theme:"inset-2-dark"
        });
      });
    })(jQuery);
  //window.location.reload(true);
</script>
</body>
</html>
