<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Reset Password </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<?php
include("connection.php");
  //Reset Password
if (isset($_POST['change_pass'])) {
    if(isset($_GET['token']))
    {
        $token = $_GET['token'];
        $newpassword = mysqli_real_escape_string($con,$_POST['password']);
        $pas = password_hash($newpassword, PASSWORD_BCRYPT);

        $updatequery = "UPDATE admin SET password='$pas' WHERE token='$token'";
        $query = mysqli_query($con,$updatequery);
        if ($query) {

            echo "<script>alert('Your password has been updated Successfuly.');
            window.location.href='login.php';</script>";
        }
        else
        {
            echo "<script>alert('Password Updation Failed.');
            window.location.href='reset_password.php';</script>";
        }
    }
    else
    {
        echo "<script>alert('Token is not set.');
        window.location.href='login.php';</script>";
    }
}

  ?>
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h1><a href="#" ><b>Pak </b>Cricket Club</a></h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
      <form action="" method="post" onsubmit="return validateForm()" name="myform">
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" required="true" name="password" required="true">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirm Password" required="true" name="cpassword" required="true">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="change_pass">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script type="text/javascript">
  function validateForm() {
  var x = document.forms["myform"]["password"].value;
  var y = document.forms["myform"]["cpassword"].value;
  if (x !== y) {
    alert("Password and Confirm password should match!");
    return false;
  }
}
</script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
