<?php 
include("connection.php");
include("email.php");
include 'res_bak_db.php';
date_default_timezone_set('Asia/Karachi');

//Login
if(isset($_POST['btn_login']))
{
    if(!empty($_POST['email']) && !empty($_POST['pass'])) { 

        $email=mysqli_real_escape_string($con,$_POST['email']);  
        $pass=mysqli_real_escape_string($con,$_POST['pass']);  
      
        $query=mysqli_query($con,"SELECT * FROM admin WHERE email='$email' AND status='active'");  
        $email_count=mysqli_num_rows($query);  

        if($email_count!=0)  
        {  
            $email_pass = mysqli_fetch_assoc($query);
            $db_pass = $email_pass['password'];
            $pass_decode = password_verify($pass, $db_pass);

            if ($pass_decode) {
                if(isset($_POST['rememberme'])) {
                session_start();
                setcookie('emailcookie',$email,time()+86400);
                setcookie('passwordcookie',$pass,time()+86400);

                $_SESSION['username']=$email_pass['username'];
                $_SESSION['email']=$email_pass['email'];
                $_SESSION['password']=$email_pass['password'];
                $_SESSION['picture']=$email_pass['image'];

                header('location: dashboard.php');
                }
                else {
                    session_start();

                    $_SESSION['username']=$email_pass['username'];
                    $_SESSION['email']=$email_pass['email'];
                    $_SESSION['password']=$email_pass['password'];
                    $_SESSION['picture']=$email_pass['image'];

                    header('location: dashboard.php');
                }
            } 
            else {
                echo "<script>alert('Invalid Password.');
                window.location.href='login.php';
                </script>";
            }
        } 
        else {  
            echo "<script>alert('Invalid Email Address.');
            window.location.href='login.php';
            </script>";  
        }  
    } 
    else {  
        echo "<script>alert('All fields are required');
        window.location.href='login.php';
        </script>";  
    }  
}

//logout
if (isset($_POST['btn_logout'])) {
    session_start();
    setcookie('emailcookie','',time()-86400);
    setcookie('passwordcookie','',time()-86400);
    $email = $_SESSION['email'];
    $pass = $_SESSION['password'];
    $img = $_SESSION['picture'];

    setcookie("email",$email);
    setcookie('pass',$pass);
    setcookie('img',$img);
    unset($_SESSION['username']);  
    session_destroy(); 
    header("location:logout.php");
}

//Relogin
if (isset($_POST['relogin'])) {

    $pass=mysqli_real_escape_string($con,$_POST['password']); 
    $e = $_COOKIE['email'];
    $query=mysqli_query($con,"SELECT * FROM admin WHERE email='$e' AND status='active'");  
    $email_count=mysqli_num_rows($query);  

    if($email_count!=0)  
    {  
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['password'];
        $pass_decode = password_verify($pass, $db_pass);

        if ($pass_decode) {

            session_start();

            $_SESSION['username']=$email_pass['username'];
            $_SESSION['email']=$email_pass['email'];
            $_SESSION['password']=$email_pass['password'];
            $_SESSION['picture']=$email_pass['image'];

            setcookie("email",'');
            setcookie('pass','');
            setcookie('img','');
            header('location: dashboard.php');
        }
        else 
        {
            setcookie("email",'');
            setcookie('pass','');
            setcookie('img','');
            echo "<script>alert('Invalid Password.');
            window.location.href='login.php';
            </script>";
        }
    }
    else 
    {  
        setcookie("email",'');
        setcookie('pass','');
        setcookie('img','');
        echo "<script>alert('Invalid Email Address.');
        window.location.href='login.php';
        </script>";  
    }
}

//Insert Admin
if (isset($_POST['insert_admin'])) {
    $name = mysqli_real_escape_string($con,$_POST['username']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $pas = password_hash($password, PASSWORD_BCRYPT);
    $token = bin2hex(random_bytes(15));

    $emailquery = "SELECT * FROM admin WHERE email='$email'";
    $query=mysqli_query($con,$emailquery);
    $emailcount = mysqli_num_rows($query);
    if ($emailcount>0) {
        echo "<script>alert('This Email Already Exist.');
                    window.location.href='admin.php';</script>";
    } 
    else {        
        if(!empty($_FILES['file']['name'])){
            if (file_exists("upload/".$_FILES['file']['name'])) {
               $store = $_FILES['file']['name'];
               echo "<script>alert('This Image Already Exist select different.');
                        window.location.href='admin.php';</script>";
            } else {
                $names=$_FILES['file']['name'];
                $tmp_name=$_FILES['file']['tmp_name'];
                $location='upload/';
                $path=$location.$names;
                
                if(move_uploaded_file($tmp_name,$path))
                {
                   if(mysqli_query($con, "INSERT INTO `admin`(`username`, `email`, `mobile`, `password`, `image`, `token`, `status`) VALUES('$name','$email','$mobile','$pas','$path','$token','Inactive')"))
                    {
                        $b = "Hi, $name. Click here to activate your account  
                        http://localhost:82/AdminLTE/activate.php?token=$token";
                        send_email($email,"Account Activation",$b);
                        echo "<script>alert('Data Inserted Successfuly. Check your email to activate your account.');
                        window.location.href='admin.php';</script>";
                    }
                    else
                    {
                        echo("Error description: " . $mysqli -> error);
                    }
                }
            } 
        }
        else {
            if(mysqli_query($con, "INSERT INTO `admin`(`username`, `email`, `mobile`, `password`, `image`, `token`, `status`) VALUES('$name','$email','$mobile','$pas','upload/default.jpg','$token','Inactive')"))
            {
                $b = "Hi, $name. Click here to activate your account 
                http://localhost:82/AdminLTE/activate.php?token=$token";
                send_email($email,"Account Activation",$b);
                echo "<script>alert('Data Inserted Successfuly. Check your email to activate your account.');
                window.location.href='admin.php';</script>";
            }
            else
            {
                echo("Error description: " . $mysqli -> error);
            }
        }
        }
}

//Update Admin
if (isset($_POST['update_admin'])) {

    $eid = mysqli_real_escape_string($con,$_POST['update_id']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $mobile = mysqli_real_escape_string($con,$_POST['mobile']);

    if(!empty($_FILES['file']['name'])){
        if (file_exists("upload/".$_FILES['file']['name'])) {
            $store = $_FILES['file']['name'];
            echo "<script>alert('This Image Already Exist select different.');
                    window.location.href='admin.php';</script>";
        } else {
            $names=$_FILES['file']['name'];
            $tmp_name=$_FILES['file']['tmp_name'];
            $location='upload/';
            $path=$location.$names;
            
            if(move_uploaded_file($tmp_name,$path))
            {
                if(mysqli_query($con,"UPDATE admin SET username='$name', email='$email', mobile='$mobile', image='$path' WHERE admin_id='$eid'"))
                {
                    echo "<script>alert('Data update Successfuly.');
                    window.location.href='admin.php';</script>";
                }
                else
                {
                    echo("Error description: " . $mysqli -> error);
                }
            }
        } 
    }
    else {
        $query = "SELECT image FROM admin WHERE admin_id='$eid'";
        $result = mysqli_query($con, $query);
        $omg = "";
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $omg = $row['image'];
            }
        }
        if(mysqli_query($con, "UPDATE admin SET username='$name', email='$email', mobile='$mobile', image='$omg' WHERE admin_id='$eid'"))
        {
            echo "<script>alert('Data update Successfuly.');
            window.location.href='admin.php';</script>";
        }
        else
        {
            echo("Error description: " . $mysqli -> error);
        }
    }
}

//Delete Admin
if (isset($_POST['delete_admin'])) {

    $a = $_POST['delete_id'];
    
    $query = "DELETE FROM admin WHERE admin_id='$a'";
    $query_run = mysqli_query($con,$query);
    if ($query_run) {
        echo "<script>alert('Admin Deleted Successfuly.');
                window.location.href='admin.php';</script>";
    } else {
        echo("Admin Not Deleted. Error description: " . $mysqli -> error);
    }
}

//Forgot Password
if (isset($_POST['forgot_pass'])) {
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $emailquery = "SELECT * FROM admin WHERE email='$email'";
    $query = mysqli_query($con,$emailquery);
    $emailcount = mysqli_num_rows($query);
    if ($emailcount){

        $userdata = mysqli_fetch_array($query);
        $name = $userdata['username'];
        $token = $userdata['token'];

        $b = "Hi, $name. Click here to Reset your Password  
              http://localhost:82/AdminLTE/reset_password.php?token=$token";
              send_email($email,"Password Reset",$b);
              echo "<script>alert('Email Send Successfuly. Check your email to Reset your Password.');
              window.location.href='login.php';</script>";
    } 
    else {
       echo "<script>alert('Email is not registered. First register this email.');
            window.location.href='login.php';</script>";
    }
    

 } 

//Delete member
if (isset($_POST['delete_member'])) {

    $a = $_POST['delete_id'];
    
    $query = "DELETE FROM member WHERE member_id='$a'";
    $query_run = mysqli_query($con,$query);
    if ($query_run) {
        echo "<script>alert('Member Deleted Successfuly.');
                window.location.href='member.php';</script>";
    } else {
        echo("Member Not Deleted. Error description: " . $mysqli -> error);
    }
}

//Insert/Update Photo
if (isset($_POST['saved_photo'])) {
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $desc = mysqli_real_escape_string($con,$_POST['description']);
    $eid =mysqli_real_escape_string($con,$_POST['update_id']);

    if (!empty($eid)) {
        if(!empty($_FILES['file']['name'])){
                $names=$_FILES['file']['name'];
                $tmp_name=$_FILES['file']['tmp_name'];
                $location='upload/';
                $path=$location.$names;
                    
                if(move_uploaded_file($tmp_name,$path))
                {
                    if(mysqli_query($con,"UPDATE photo SET title='$title', description='$desc', image='$path' WHERE photo_id='$eid'"))
                    {
                    echo "<script>alert('Data update Successfuly.');
                    window.location.href='photo.php';</script>";
                    }
                    else
                    {
                        echo("Error description: " . $mysqli -> error);
                    }
                }
                else
                {
                    echo("image uploding failed");
                }
            } 
        else {
            if(mysqli_query($con, "UPDATE photo SET title='$title', description='$desc' WHERE photo_id='$eid'"))
            {
                echo "<script>alert('Data update Successfuly.');
                window.location.href='photo.php';</script>";
            }
            else
            {
                echo("Error description: " . $mysqli -> error);
            }
        }
    } 
    else 
    {
        $date = date("Y-m-d h:i:s");

        if(!empty($_FILES['file']['name']))
        {
            $names=$_FILES['file']['name'];
            $tmp_name=$_FILES['file']['tmp_name'];
            $location='upload/';
            $path=$location.$names;
                        
            if(move_uploaded_file($tmp_name,$path))
            {
                if(mysqli_query($con, "INSERT INTO photo(`title`, `description`, `upload_date`, `image`) VALUES ('$title','$desc','$date','$path')"))
                {
                    echo "<script>alert('Photo Inserted Successfuly');
                    window.location.href='photo.php';</script>";
                }
                else
                {
                    echo("Error description: " . $mysqli -> error);
                }
            }
        }
        else
        {
            echo "<script>alert('Select Photo.');
                    window.location.href='photo.php';</script>";
        }
    }
}

//Delete Photo
if (isset($_POST['delete_photo'])) {
    $a = $_POST['delete_id'];
    
    $query = "DELETE FROM photo WHERE photo_id='$a'";
    $query_run = mysqli_query($con,$query);
    if ($query_run) {
        echo "<script>alert('Photo Deleted Successfuly.');
                window.location.href='photo.php';</script>";
    } else {
        echo("Photo Not Deleted. Error description: " . $mysqli -> error);
    }
}

//Backup Database
if (isset($_POST['backup_btn'])) {
    try {
            $mysqlUserName = $_POST['username'];
            $mysqlPassword = $_POST['Password'];
            $mysqlHostName = $_POST['hostname'];
            $DbName = $_POST['dbname'];
            $tables = $_POST['tblname'];

            if (in_array('All', $tables)) {
                Backup_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,false,false);
            } else {
                Backup_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,$tables,"selectedtbl.sql");
            }

        } catch (Exception $e) {
            echo 'Message: '.$e->getMessage();
        }
}

//Restore Database
if (isset($_POST['restore_btn'])) {
        try {
            $mysqlUserName = $_POST['username2'];
            $mysqlPassword = $_POST['Password2'];
            $mysqlHostName = $_POST['hostname2'];
            $DbName = $_POST['dbname2'];
            $test2 = $_FILES['file']['tmp_name'];
            //$ext = basename($_FILES["file"]["name"]);

            //echo $test2;
            //echo "<br/>$ext";

            restoreDatabaseTables($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,$test2);
            echo "<script>alert('Database retore Successfuly');
                  window.location.href='database.php';</script>";

        }
         catch (Exception $e) {
        echo 'Message: '.$e->getMessage();
        }
}

//Insert Ground
if (isset($_POST['insert_ground'])) {

    $gname = mysqli_real_escape_string($con,$_POST['gname']);
    $locat = mysqli_real_escape_string($con,$_POST['location']);
    $capacity = mysqli_real_escape_string($con,$_POST['capacity']);
    $cost = mysqli_real_escape_string($con,$_POST['cost']);
    $description = mysqli_real_escape_string($con,$_POST['description']);

    if(!empty($_FILES['file']['name'])){

        $names=$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        $location='upload/';
        $path=$location.$names;
                
        if(move_uploaded_file($tmp_name,$path))
        {
            if(mysqli_query($con, "INSERT INTO `ground`(`name`, `location`, `capacity`, `booking_cost`, `description`, `image`) VALUES('$gname','$locat','$capacity','$cost','$description','$path')"))
            {
                echo "<script>alert('Ground Inserted Successfuly.');
                window.location.href='ground.php';</script>";
            }
            else
            {
                echo("Error description: " . $mysqli -> error);
            }
        }

    }
}

//Update Ground
if (isset($_POST['update_ground'])) {

    $uid = mysqli_real_escape_string($con,$_POST['update_id']);
    $gname = mysqli_real_escape_string($con,$_POST['gname']);
    $locat = mysqli_real_escape_string($con,$_POST['location']);
    $capacity = mysqli_real_escape_string($con,$_POST['capacity']);
    $cost = mysqli_real_escape_string($con,$_POST['cost']);
    $description = mysqli_real_escape_string($con,$_POST['description']);

    if(!empty($_FILES['file']['name'])){

            $names=$_FILES['file']['name'];
            $tmp_name=$_FILES['file']['tmp_name'];
            $location='upload/';
            $path=$location.$names;
            
            if(move_uploaded_file($tmp_name,$path))
            {
                if(mysqli_query($con, "UPDATE `ground` SET `name`='$gname',`location`='$locat',`capacity`='$capacity',`booking_cost`='$cost',`description`='$description',`image`='$path' WHERE ground_id='$uid'"))
                {
                    echo "<script>alert('Ground update Successfuly.');
                    window.location.href='ground.php';</script>";
                }
                else
                {
                    echo("Error description: " . $mysqli -> error);
                }
            }
    }
    else {
        if(mysqli_query($con, "UPDATE `ground` SET `name`='$gname',`location`='$locat',`capacity`='$capacity',`booking_cost`='$cost',`description`='$description' WHERE ground_id='$uid'"))
        {
            echo "<script>alert('Ground update Successfuly.');
            window.location.href='ground.php';</script>";
        }
        else
        {
            echo("Error description: " . $mysqli -> error);
        }
    }
}

//Delete Ground
if (isset($_POST['delete_ground'])) {
    $a = $_POST['delete_id'];
    
    $query = "DELETE FROM ground WHERE ground_id='$a'";
    $query_run = mysqli_query($con,$query);
    if ($query_run) {
        echo "<script>alert('Ground Deleted Successfuly.');
                window.location.href='ground.php';</script>";
    } else {
        echo("Ground Not Deleted. Error description: " . $mysqli -> error);
    }
}

//Insert Batch
if (isset($_POST['insert_batch'])) {
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $stime = mysqli_real_escape_string($con,$_POST['stime']);
    $etime = mysqli_real_escape_string($con,$_POST['etime']);
    $gname = mysqli_real_escape_string($con,$_POST['gname']);
    $seats = mysqli_real_escape_string($con,$_POST['seats']);
    $id = 0;

    $result = mysqli_query($con,"select ground_id from ground where name='$gname'"); 
    while($g = mysqli_fetch_array($result)) { 
        $id =$g[0];  
    }

    if(mysqli_query($con,"INSERT INTO `batch`(`name`,`start_date`,`start_time`, `end_time`,`ground_id`,`no_of_seats`) VALUES ('$name','$date','$stime','$etime',$id,'$seats')"))
    {
        echo "<script>alert('Batch Inserted Successfuly.');window.location.href='batch.php';</script>";
    }
    else
    {
        echo "Error description: " . mysqli_error($con);
    }
}

//Delete Batch
if (isset($_POST['delete_batch'])) {
    $a = $_POST['delete_id'];

    $query = "DELETE FROM batch_reg WHERE batch_id='$a'";
    $query_run = mysqli_query($con,$query);
    if ($query_run) {

        $query = "DELETE FROM batch WHERE batch_id='$a'";
        $query_run = mysqli_query($con,$query);
        if ($query_run) {

            echo "<script>alert('Batch Deleted Successfuly.');
                    window.location.href='batch.php';</script>";
        } else {
            echo("Batch Not Deleted. Error description: " . $mysqli -> error);
        }

    } else {
        echo("Batch Registration Not Deleted. Error description: " . $mysqli -> error);
    }
}

//Update Batch
if (isset($_POST['update_batch'])) {
    $uid = mysqli_real_escape_string($con,$_POST['update_id']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $stime = mysqli_real_escape_string($con,$_POST['stime']);
    $etime = mysqli_real_escape_string($con,$_POST['etime']);
    $gname = mysqli_real_escape_string($con,$_POST['ground']);
    $seats = mysqli_real_escape_string($con,$_POST['seats']);
    $id = 0;

    $result = mysqli_query($con,"select ground_id from ground where name='$gname'"); 
    while($g = mysqli_fetch_array($result)) { 
        $id =$g[0];  
    }

    if(mysqli_query($con,"UPDATE `batch` SET `name`='$name',`start_date`='$date',`start_time`='$stime',`end_time`='$etime',`ground_id`='$id',`no_of_seats`='$seats' WHERE batch_id='$uid'"))
    {
        echo "<script>alert('Batch Updated Successfuly.');window.location.href='batch.php';</script>";
    }
    else
    {
        echo "Error description: " . mysqli_error($con);
    }
}

//Delete Booking
if (isset($_POST['delete_booking'])) {
    $a = $_POST['delete_id'];
    
    $query = "DELETE FROM booking WHERE booking_id='$a'";
    $query_run = mysqli_query($con,$query);
    if ($query_run) {
        echo "<script>alert('Booking Deleted Successfuly.');
                window.location.href='booking.php';</script>";
    } else {
        echo("Booking Not Deleted. Error description: " . $mysqli -> error);
    }
}

//Approved Booking
if (isset($_POST['approved_booking'])) {
    $a = $_POST['booking_id'];

    $result = mysqli_query($con,"SELECT is_approved FROM booking WHERE booking_id='$a'");
    while($g = mysqli_fetch_array($result)) { 
        $id3 =$g[0];  
    }
    if($id3 == 1)
    {
        echo "<script>alert('This booking is already approved.');
                window.location.href='booking.php';</script>";
    }
    else
    {
        $query = "UPDATE `booking` SET `is_approved`='1' WHERE booking_id='$a'";
        $query_run = mysqli_query($con,$query);
        if ($query_run) {
            echo "<script>alert('Booking Approved Successfuly.');
                window.location.href='booking.php';</script>";
        } else {
            echo("Booking Not Approved. Error description: " . $mysqli -> error);
        }
    }
}

//Insert Event
if (isset($_POST['insert_event'])) {

    $title = mysqli_real_escape_string($con,$_POST['title']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $detail = mysqli_real_escape_string($con,$_POST['detail']);
    $ground = mysqli_real_escape_string($con,$_POST['gname']);
    $id = 0;

    if(!empty($_FILES['file']['name'])){

        $names=$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        $location='upload/';
        $path=$location.$names;
                
        if(move_uploaded_file($tmp_name,$path))
        {
            $result = mysqli_query($con,"select ground_id from ground where name='$ground'"); 
            while($g = mysqli_fetch_array($result)) { 
                $id =$g[0];  
            }
            if(mysqli_query($con, "INSERT INTO `event`( `title`, `date`, `detail`, `image`, `ground_id`) VALUES ('$title','$date','$detail','$path','$id')"))
            {
                echo "<script>alert('Event Inserted Successfuly.');
                window.location.href='event.php';</script>";
            }
            else
            {
                echo "Error description: " . mysqli_error($con);
            }
        }

    }
}

//Update Event
if (isset($_POST['update_event'])) {

    $eid = mysqli_real_escape_string($con,$_POST['update_id']);
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $detail = mysqli_real_escape_string($con,$_POST['detail']);
    $ground = mysqli_real_escape_string($con,$_POST['gname']);
    $id = 0;

    if (empty($date)) {

        if(!empty($_FILES['file']['name'])){

        $names=$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        $location='upload/';
        $path=$location.$names;
            
            if(move_uploaded_file($tmp_name,$path))
            {
                $result = mysqli_query($con,"select ground_id from ground where name='$ground'"); 
                while($g = mysqli_fetch_array($result)) { 
                    $id =$g[0];  
                }
                if(mysqli_query($con, "UPDATE `event` SET `title`='$title',`detail`='$detail',`image`='$path',`ground_id`='$id' WHERE `event_id`='$eid'"))
                {
                    echo "<script>alert('Event updated Successfuly.');
                    window.location.href='event.php';</script>";
                }
                else
                {
                    echo "Error description: " . mysqli_error($con);
                }
            }
        }
        else {
                $result = mysqli_query($con,"select ground_id from ground where name='$ground'"); 
                while($g = mysqli_fetch_array($result)) { 
                    $id =$g[0];  
                }
            if(mysqli_query($con, "UPDATE `event` SET `title`='$title',`detail`='$detail',`ground_id`='$id' WHERE `event_id`='$eid'"))
            {
                echo "<script>alert('Event updated Successfuly.');
                window.location.href='event.php';</script>";
            }
            else
            {
                echo "Error description: " . mysqli_error($con);
            }
        }
    } else {

        if(!empty($_FILES['file']['name'])){

        $names=$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        $location='upload/';
        $path=$location.$names;
            
            if(move_uploaded_file($tmp_name,$path))
            {
                $result = mysqli_query($con,"select ground_id from ground where name='$ground'"); 
                while($g = mysqli_fetch_array($result)) { 
                    $id =$g[0];  
                }
                if(mysqli_query($con, "UPDATE `event` SET `title`='$title',`date`='$date',`detail`='$detail',`image`='$path',`ground_id`='$id' WHERE `event_id`='$eid'"))
                {
                    echo "<script>alert('Event updated Successfuly.');
                    window.location.href='event.php';</script>";
                }
                else
                {
                    echo "Error description: " . mysqli_error($con);
                }
            }
        }
        else {
                $result = mysqli_query($con,"select ground_id from ground where name='$ground'"); 
                while($g = mysqli_fetch_array($result)) { 
                    $id =$g[0];  
                }
            if(mysqli_query($con, "UPDATE `event` SET `title`='$title',`date`='$date',`detail`='$detail',`ground_id`='$id' WHERE `event_id`='$eid'"))
            {
                echo "<script>alert('Event updated Successfuly.');
                window.location.href='event.php';</script>";
            }
            else
            {
                echo "Error description: " . mysqli_error($con);
            }
        }
    }
}

//Delete Event
if (isset($_POST['delete_event'])) {
    $a = $_POST['delete_id'];
    
    $query = "DELETE FROM event WHERE event_id='$a'";
    $query_run = mysqli_query($con,$query);
    if ($query_run) {
        echo "<script>alert('Event Deleted Successfuly.');
                window.location.href='event.php';</script>";
    } else {
        echo("Event Not Deleted. Error description: " . $mysqli -> error);
    }
}

//Insert News
if (isset($_POST['insert_news'])) {

    $title = mysqli_real_escape_string($con,$_POST['title']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $detail = mysqli_real_escape_string($con,$_POST['detail']);

    if(!empty($_FILES['file']['name'])){

        $names=$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        $location='upload/';
        $path=$location.$names;
                
        if(move_uploaded_file($tmp_name,$path))
        {  
            if(mysqli_query($con, "INSERT INTO `news`( `title`, `date`, `detail`, `image`) VALUES ('$title','$date','$detail','$path')"))
            {
                echo "<script>alert('News Inserted Successfuly.');
                window.location.href='news.php';</script>";
            }
            else
            {
                echo "Error description: " . mysqli_error($con);
            }
        }

    }
}

//Update News
if (isset($_POST['update_news'])) {

    $eid = mysqli_real_escape_string($con,$_POST['update_id']);
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $detail = mysqli_real_escape_string($con,$_POST['detail']);


    if (empty($date)) {

        if(!empty($_FILES['file']['name'])){

        $names=$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        $location='upload/';
        $path=$location.$names;
            
            if(move_uploaded_file($tmp_name,$path))
            {
                if(mysqli_query($con, "UPDATE `news` SET `title`='$title',`detail`='$detail',`image`='$path'WHERE `news_id`='$eid'"))
                {
                    echo "<script>alert('News updated Successfuly.');
                    window.location.href='news.php';</script>";
                }
                else
                {
                    echo "Error description: " . mysqli_error($con);
                }
            }
        }
        else {
            if(mysqli_query($con, "UPDATE `news` SET `title`='$title',`detail`='$detail' WHERE `news_id`='$eid'"))
            {
                echo "<script>alert('News updated Successfuly.');
                window.location.href='news.php';</script>";
            }
            else
            {
                echo "Error description: " . mysqli_error($con);
            }
        }
    } else {

        if(!empty($_FILES['file']['name'])){

        $names=$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        $location='upload/';
        $path=$location.$names;
            
            if(move_uploaded_file($tmp_name,$path))
            {
                if(mysqli_query($con, "UPDATE `news` SET `title`='$title',`date`='$date',`detail`='$detail',`image`='$path' WHERE `news_id`='$eid'"))
                {
                    echo "<script>alert('News updated Successfuly.');
                    window.location.href='news.php';</script>";
                }
                else
                {
                    echo "Error description: " . mysqli_error($con);
                }
            }
        }
        else {

            if(mysqli_query($con, "UPDATE `news` SET `title`='$title',`date`='$date',`detail`='$detail' WHERE `news_id`='$eid'"))
            {
                echo "<script>alert('News updated Successfuly.');
                window.location.href='news.php';</script>";
            }
            else
            {
                echo "Error description: " . mysqli_error($con);
            }
        }
    }
}

//Delete News
if (isset($_POST['delete_news'])) {
    $a = $_POST['delete_id'];
    
    $query = "DELETE FROM news WHERE news_id='$a'";
    $query_run = mysqli_query($con,$query);
    if ($query_run) {
        echo "<script>alert('News Deleted Successfuly.');
                window.location.href='news.php';</script>";
    } else {
        echo("News Not Deleted. Error description: " . $mysqli -> error);
    }
}

//Insert Video
if(isset($_POST['insert_video'])){

        $title = mysqli_real_escape_string($con,$_POST['title']);
        $desc = mysqli_real_escape_string($con,$_POST['detail']);
        $date = date("Y-m-d h:i:s");

        
        if( !empty($_FILES['file']['name'])){
            $targetDir = "upload/";
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;

            $extension = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
            $extensions_arr = array("mp4","avi","3gp","mov","mpeg","mkv","flv");

            if(in_array($extension,$extensions_arr)){

                $names=$_FILES['file']['name'];
                $tmp_name=$_FILES['file']['tmp_name'];
                $location='upload/';
                $path=$location.$names;

                if(move_uploaded_file($tmp_name,$path))
                {
                   if(mysqli_query($con,"INSERT INTO `video`(`title`,`upload_date`,`description`,`video`) VALUES ('$title','$date','$desc','$path')"))
                    {
                        echo "<script>alert('Video Inserted Successfuly.');
                        window.location.href='video.php';</script>";
                    }
                    else
                    {
                        echo "Error description: " . mysqli_error($con);
                    }
                }
                else
                {
                    echo"Could not upload file: " . mysqli_error($con);
                }
            }else
            {
               echo "Invalid file extension.". mysqli_error($con);
            }
       }   
} 

//Delete Video
if (isset($_POST['delete_video'])) {
    $a = $_POST['delete_id'];
    
    $query = "DELETE FROM video WHERE video_id='$a'";
    $query_run = mysqli_query($con,$query);
    if ($query_run) {
        echo "<script>alert('Video Deleted Successfuly.');
                window.location.href='video.php';</script>";
    } else {
        echo("Video Not Deleted. Error description: " . $mysqli -> error);
    }
}

//Update Video
if (isset($_POST['update_video'])) {

    $uid = mysqli_real_escape_string($con,$_POST['update_id']);
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $detail = mysqli_real_escape_string($con,$_POST['detail']);

    if(!empty($_FILES['file']['name'])){

            $names=$_FILES['file']['name'];
            $tmp_name=$_FILES['file']['tmp_name'];
            $location='upload/';
            $path=$location.$names;
            
            if(move_uploaded_file($tmp_name,$path))
            {
                if(mysqli_query($con, "UPDATE `video` SET `title`='$title',`description`='$detail',`video`='$path' WHERE `video_id`='$uid'"))
                {
                    echo "<script>alert('Video update Successfuly.');
                    window.location.href='video.php';</script>";
                }
                else
                {
                    echo "Error description: ". mysqli_error($con);
                }
            }
    }
    else {
        if(mysqli_query($con, "UPDATE `video` SET `title`='$title',`description`='$detail' WHERE `video_id`='$uid'"))
        {
            echo "<script>alert('Video update Successfuly.');
            window.location.href='video.php';</script>";
        }
        else
        {
            echo "Error description: " . mysqli_error($con);
        }
    }
}

//Subscribe Button
if (isset($_POST['subscribe'])) {

    $email = mysqli_real_escape_string($con,$_POST['email']);

        if(mysqli_query($con, "INSERT INTO `subscribe`( `sub_email`) VALUES ('$email')"))
        {
            $b = "This message confirm that you have successfully filled your subscription and we will share future updates through your emails. Thank you :)";
            send_email($email,"Subscription confirmation message",$b);
            echo "<script>alert('Subscription Successfuly. Thank you!');
            window.location.href='index.php';</script>";
        }
        else
        {
            echo("Error description: " . $mysqli -> error);
        }
}

//insert notice
if (isset($_POST['notice_btn'])) {

    $notice = mysqli_real_escape_string($con,$_POST['notice']);
    $date = date('Y-m-d H:i:s');

    if(mysqli_query($con, "INSERT INTO `notice`(`notice_detail`, `notice_datetime`) VALUES ('$notice','$date')"))
    {
        echo "<script>alert('Notice Successfuly Posted.');
        window.location.href='dashboard.php';</script>";
    }
    else
    {
        echo("Error description: " . $mysqli -> error);
    }
}

//send email
if (isset($_POST['send_email'])) {

    $from = mysqli_real_escape_string($con,$_POST['from']);
    $subject = mysqli_real_escape_string($con,$_POST['subject']);
    $body = mysqli_real_escape_string($con,$_POST['body']);
    
}

//insert batch registration
if (isset($_POST['batch_reg'])) {

    $cname = mysqli_real_escape_string($con,$_POST['cname']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $dob = mysqli_real_escape_string($con,$_POST['dob']);
    $bname = mysqli_real_escape_string($con,$_POST['bname']);
    $id = 0;
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dob), date_create($today));
    $age = $diff->format('%y');

    $result = mysqli_query($con,"select batch_id from batch where name='$bname'"); 
        while($g = mysqli_fetch_array($result)) { 
            $id =$g[0];  
        }

    if(mysqli_query($con, "INSERT INTO `batch_reg`(`user_name`, `user_email`, `user_age`, `batch_id`) VALUES ('$cname','$email','$age','$id')"))
    {
        $b = "This message confirm that you have successfully filled your batch registration form for further detail visit club during day time Thank you :)";
            send_email($email,"Batch registration confirmation message",$b);
        echo "<script>alert('Your batch registration is Successfull.');
        window.location.href='ubatch.php';</script>";
    }
    else
    {
        echo "Error description: ". mysqli_error($con);
    }    
}

//insert member
if (isset($_POST['member_reg'])) {

    $name = mysqli_real_escape_string($con,$_POST['name']);
    $fname = mysqli_real_escape_string($con,$_POST['fname']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $dob = mysqli_real_escape_string($con,$_POST['dob']);
    $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
    $city = mysqli_real_escape_string($con,$_POST['city']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $date = date('Y-m-d H:i:s');
    $role = mysqli_real_escape_string($con,$_POST['role']);
    $edu = mysqli_real_escape_string($con,$_POST['edu']);


    if(!empty($_FILES['file']['name'])){

        $names=$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        $location='upload/';
        $path=$location.$names;
                
        if(move_uploaded_file($tmp_name,$path))
        {  
            if(mysqli_query($con, "INSERT INTO `member`(`name`,`father_name`,`email`,`date_of_birth`,`mobile`,`city`,`address`,`registration_date`,`role`,`educational_qualification`,`image`) VALUES ('$name','$fname','$email','$dob','$mobile','$city','$address','$date','$role','$edu','$path')"))
            {
                $b = "This message confirm that you have successfully filled your member registration form for further detail visit club during day time Thank you :)";
                send_email($email,"Member registration confirmation message",$b);
                echo "<script>alert('Member Registered Successfuly.');
                window.location.href='member_reg.php';</script>";
            }
            else
            {
                echo "Error description: " . mysqli_error($con);
            }
        }

    }
}

//insert contact
if (isset($_POST['contact_btn'])) {

    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $message = mysqli_real_escape_string($con,$_POST['message']);
    $date = date('Y-m-d H:i:s');

    if(mysqli_query($con, "INSERT INTO `contactus`(`name`,`email`,`date`,`message`)VALUES('$name','$email','$date','$message')"))
    {

        echo "<script>alert('Your Message Successfull recived. we will reply you through email. Thank You');
        window.location.href='contactus.php';</script>";
    }
    else
    {
        echo "Error description: ". mysqli_error($con);
    }    
}

//contactus reply
if (isset($_POST['reply_btn'])) {
    try {
        $email = mysqli_real_escape_string($con,$_POST['email']);
    $subject = mysqli_real_escape_string($con,$_POST['subject']);
    $message = mysqli_real_escape_string($con,$_POST['message']);

    send_email($email,$subject,$message);
    echo "<script>alert('Reply Successfuly send.');
        window.location.href='contact.php';</script>";
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

//ground booking
if (isset($_POST['booking_btn'])) {

    $name = mysqli_real_escape_string($con,$_POST['cusname']);
    $email = mysqli_real_escape_string($con,$_POST['cusemail']);
    $mobile = mysqli_real_escape_string($con,$_POST['cusmob']);
    $date = mysqli_real_escape_string($con,$_POST['cusdate']);
    $gname = mysqli_real_escape_string($con,$_POST['gname']);
    $id = 0;
    $bookdate= 0;

    $result = mysqli_query($con,"select ground_id from ground where name='$gname'"); 
    while($g = mysqli_fetch_array($result)) { 
        $id =$g[0];  
    }

    $result = mysqli_query($con, "SELECT `date` FROM `booking` WHERE `ground_id` = $id"); 
    while($g = mysqli_fetch_array($result)) { 
        $bookdate =$g[0];  
    }

    if($date == $bookdate)
    {
        echo "<script>alert('Sorry! This ground is already book for this date please select other date.');
            window.location.href='uground.php';</script>";
    }
    else
    {
        if(mysqli_query($con, "INSERT INTO `booking`(`customer_name`, `customer_email`, `customer_mobile`, `date`, `is_approved`, `ground_id`) VALUES ('$name','$email','$mobile','$date','0','$id')"))
        {
            echo "<script>alert('Your request is recieve to our site Admin and we will be notified you through email when your registration is approved. Thank You');
            window.location.href='uground.php';</script>";
        }
        else
        {
            echo "Error description: ". mysqli_error($con);
        }  
    }    
}

?>


