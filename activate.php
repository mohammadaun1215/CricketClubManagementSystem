<?php
session_start();
include("connection.php");

if(isset($_GET['token']))
{
	$token = $_GET['token'];
	$updatequery = "UPDATE admin SET status='active' WHERE token='$token'";
	$query = mysqli_query($con,$updatequery);
	if ($query) {
		setcookie('emailcookie','',time()-86400);
		setcookie('passwordcookie','',time()-86400);
		unset($_SESSION['username']);  
		session_destroy();
		echo "<script>alert('Account Activated Successfuly.');
		window.location.href='login.php';</script>";
	}
	else
	{
		echo "<script>alert('Account Activation Failed.');
		window.location.href='admin.php';</script>";
	}
}
else
{
	echo "<script>alert('Token is not set.');
		window.location.href='admin.php';</script>";
}

?>


