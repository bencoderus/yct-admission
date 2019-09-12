<?php
session_start();
require('../inc/init.php');

if(isset($_SESSION['user'])){
  header("location: completereg");
}


if(isset($_POST['submit']))
{
    //COLLECT VALUES
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$pass=$_POST['pass'];
$date=time();
$cpass=$_POST['cpass'];
$checkuser=mysqli_query($con, "SELECT email FROM student_db WHERE email='$email'");
$countuser=mysqli_num_rows($checkuser);
if ($countuser > 0)
{
$msg="Email already exist!";
}
elseif(strlen($pass) < 6)
{
$msg="Password is too short!";
}
else
{


if($pass===$cpass)
{
    $pass=md5($pass);
$insert="INSERT INTO student_db(email, password, mobile, regdate) VALUES('$email', '$pass', '$mobile', '$date')";
$send=mysqli_query($con, $insert);
if($send)
{
$_SESSION["user"]=$email;
header("Location: completereg");
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
    <title>Apply for admission | Aspirant dashboard</title>
<style>
  .good
{
  border-color: #28a745;
  }
  .bad 
  {  
    border-color: #dc3545; 
  }
</style>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aspirant Portal</title>
    
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<link rel='stylesheet' href='../css/theme.css'>
<link rel='stylesheet' href='../css/login.css'>
<link rel='stylesheet' href='../css/font-awesome.css' media='all' />
<meta name='viewport' content='width=device-width, initial-scale=1'>
	<script src='../js/jquery-3.3.1.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<script src='ajax/reg.js'></script>
</head>
<body>
    
    <form class="form-signin" action="" method="POST">
      <div class="text-center mb-4">
      <i class="fa fa-user-circle fa-5x"></i>
        <h1 class="h3 mb-3 font-weight-normal">ASPIRANT SIGNUP</h1>
        <p>Hello aspirant, provide your details below</p>
      </div>
      <?php
      if(!empty($msg))
      {
      	echo "<br><div class='alert alert-warning'>$msg</div>";
      }
      ?>
      <div class="form-group">
      <label>Email:</label>
        <input type="email" id="vmail" name="email" class="form-control" placeholder="Email" onchange="vemail(this.value)" required>
        <div id="infomail"></div>
      </div>
      <div class="form-group">

<label>Mobile number:</label>
  <input type="text" name="mobile" id="vmobile" minlength="11" maxlength="11" class="form-control" placeholder="Mobile" onchange="vphone(this.value)" required>
  <div id="infophone"></div>
</div>
      <div class="form-group">

<label>Password:</label>
  <input type="password" id="pass1" minlength="6" name="pass" class="form-control" placeholder="Password" onchange="vpass(this.value)" required>
  <div id="infopass"></div>
</div>
      <div class="form-group">
<label>Confirm Password:</label>
  <input type="password" name="cpass" id="pass2" minlength="6" class="form-control" placeholder="Retype Password" onchange="matchpass()" required>
  <div id="matchpass"></div>
</div>
      <button class="btn btn-success btn-block" name="submit" type="submit">Become an aspirant</button>
    <p/><p>Already created one? <a href="register.php"><b>Sign in</b></a></p>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2020 Yabatech</p>
    </form>
</body>
</html>
