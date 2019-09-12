<?php
session_start();
require('../inc/init.php');

$check=mysqli_query($con, "SELECT * FROM admin");
$count=mysqli_num_rows($check);
if ($count > 0)
{
  header("Location: ../404");
}

if(isset($_POST['submit']))
{
    //COLLECT VALUES
$email=$_POST['email'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$date=time();
$cpass=$_POST['cpass'];

//VALIDATE EMAIL
$checkemail=mysqli_query($con, "SELECT email FROM admin WHERE email='$email'");
$countemail=mysqli_num_rows($checkemail);

//VALIDATE USERNAME
$checkuser=mysqli_query($con, "SELECT email FROM admin WHERE username='$user'");
$countuser=mysqli_num_rows($checkuser);
if ($countuser > 0)
{
$msg="Username already exist!";
}
elseif ($countemail > 0)
{
$msg="Email already exist!";
}
else
{


if($pass===$cpass)
{
    $pass=md5($pass);
$insert="INSERT INTO admin(email, password, username, date) VALUES('$email', '$pass', '$user', '$date')";
$send=mysqli_query($con, $insert);
if($send)
{
$_SESSION["admin"]=$user;
$msg="Registration was successful!";
header("Location: dashboard?msg=$msg");
}
else
{
    $msg="Registration failed!";
}
}
else
{
    //INVALID PASS
    $msg="Password doesnt match!";
}

}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Portal</title>
    
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<link rel='stylesheet' href='../css/theme.css'>
<link rel='stylesheet' href='../css/login.css'>
<link rel='stylesheet' href='../css/font-awesome.css' media='all' />
<meta name='viewport' content='width=device-width, initial-scale=1'>
	<script src='../js/jquery-3.3.1.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
</head>
<body>
    
    <form class="form-signin" action="" method="POST">
      <div class="text-center mb-4">
      <i class="fa fa-user-circle fa-5x"></i>
        <h1 class="h3 mb-3 font-weight-normal">ADMIN SIGNUP</h1>
        <p>Hello, please provide your details below</p>
      </div>
      <?php
      if(!empty($msg))
      {
      	echo "<br><div class='alert alert-warning'>$msg</div>";
      }
      ?>

      <div class="form-group">
      <label>Email:</label>
        <input type="email" name="email" class="form-control" placeholder="Email" required>
      </div>


      <div class="form-group">

<label>Username:</label>
  <input type="text" name="user" maxlength="20" class="form-control" placeholder="Username" required>
</div>


      <div class="form-group">

<label>Password:</label>
  <input type="password" name="pass" class="form-control" placeholder="Password" required>
</div>
      <div class="form-group">

<label>Confirm Password:</label>
  <input type="password" name="cpass" class="form-control" placeholder="Retype Password" required>
</div>

      <button class="btn btn-success btn-block" name="submit" type="submit">Become an admin</button>
    <p/>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2020 Yabatech</p>
    </form>
</body>
</html>
