<?php
if(!isset($_COOKIE['email'])){  
    header("location:login.php");  
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Lockscreen</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition lockscreen">
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
  <h1><a href="#" ><b>Pak </b>Cricket Club</a></h1> 
  </div>
  <!-- User name -->
  <div class="lockscreen-name" style="margin-left: 50px;"> <?= $_COOKIE['email'];?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?= $_COOKIE['img']; ?>" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="post" action="code.php">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="Re-Enter Password" name="password" required="true">

        <div class="input-group-append">
          <button type="submit" class="btn" name="relogin"> 
           <i class="fas fa-arrow-right text-muted"></i>
          </button> 
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="login.php">Or sign in as a different user</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2020-<?php echo date("Y");?> <b><a href="index.php" class="text-black">PakCricketClub</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
