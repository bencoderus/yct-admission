<?php
require('../inc/init.php');
session_start();
if(isset($_SESSION['user'])){
header("Location: dashboard");
exit(); }
if(isset($_POST['submit']))
{
$email=strtolower($_POST['email']);
$pass=$_POST['pass'];
$pass=md5($pass);
$sql="SELECT * FROM student_db WHERE email='$email' and password='$pass'";
$check=mysqli_query($con, $sql);
$count=mysqli_num_rows($check);
if ($count==1)
{
$_SESSION["user"]=$email;
header("Location: dashboard"); 
}
else
{
$msg="Invalid username and password";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Aspirant dashboard</title>
    
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
      <div class="text-center mb-4"><?php

if(isset($_GET['infomsg']))
{
  $infomsg=cleaninput($_GET['infomsg']);
  echo " <div class='alert alert-warning'><b>$infomsg</b></div><br>";

}

?>    
      <i class="fa fa-user-circle fa-5x"></i>
        <h1 class="h3 mb-3 font-weight-normal">ASPIRANT PORTAL</h1>
        <p>Hello aspirant, provide your details below</p>
      </div>
      <?php
      if(!empty($msg))
      {
      	echo "<br><div class='alert alert-danger'>$msg</div>";
      }
      ?>

      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email" required>
      </div>

      <div class="form-group">
        <input type="password" name="pass" class="form-control" placeholder="Password" required>
      </div>

      <button class="btn btn-success btn-block" name="submit" type="submit">Proceed to portal</button>
    <p/><p>Dont have an account? <a href="apply.php"><b>Apply for admission</b></a></p>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2020 Yabatech</p>
    </form>
</body>
</html>