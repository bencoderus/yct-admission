<?php
require('../inc/init.php');
session_start();
$user=$_SESSION['user'];

$reglevel=getreglevel($user);

if($reglevel >= 2)
{
    header("location: dashboard");
}

elseif(!isset($_SESSION['user'])){
  header("location: login");
}

if(isset($_POST['submit']))
{
    //COLLECT VALUES
$surname=cleaninput($_POST['surname']);
$names=cleaninput($_POST['names']);
$sex=$_POST['sex'];
$dob=strtotime($_POST['dob']);
$country=$_POST['country'];
$add=cleaninput($_POST['address']);

$sql="UPDATE student_db SET surname='$surname', othername='$names', sex='$sex', dob='$dob', country='$country', address='$add' WHERE email='$user'";
$insert=mysqli_query($con, $sql);

if($insert)
{
mysqli_query($con, "UPDATE student_db SET reglevel=2 WHERE email='$user'");
$msg="Registration was successful " .$surname ." " .$names;
header("location: dashboard?msg=$msg");
}
else
{
$msg="Registration failed!";
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Complete Registration</title>
    
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<link rel='stylesheet' href='../css/theme.css'>
<link rel='stylesheet' href='../css/login.css'>
<link rel='stylesheet' href='../css/font-awesome.css' media='all' />
<meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='../js/jquery-3.3.1.min.js'></script>
  <script src='ajax/reg2.js'></script>
<script src='../js/bootstrap.min.js'></script>
</head>
<body>
    
    <form class="form-signin" action="" method="POST">
      <div class="text-center mb-4">
      <i class="fa fa-user-circle fa-5x"></i>
        <h1 class="h3 mb-3 font-weight-normal">COMPLETE REGISTRATION</h1>
       <b><?php echo($user); ?></b>
        <p>Registration almost done </p>
      </div>
      <?php
      if(!empty($msg))
      {
      	echo "<br><div class='alert alert-danger'>$msg</div>";
      }
      ?>

      <div class="form-group">
      <label>Surname:</label>
        <input type="text" name="surname" id="f1" class="form-control" placeholder="Surname" maxlength=15 onchange="v1(this.value)" required>
        <div id="v1"></div>
      </div>


      <div class="form-group">
      <label>Other names:</label>
        <input type="text" name="names"  id="f2" class="form-control" maxlength=25 placeholder="Other names" onchange="v2(this.value)" required>
        <div id="v2"></div>
     </div>


      <div class="form-group">

<label>Gender:</label>
<select name="sex" class="custom-select" id="f3"  onchange="v3(this.value)">
<option value="">Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>


</select>
<div id="v3"></div>


</div>

<div class="form-group">

<label>DOB:</label>
<input type="date" name="dob" max="2003-01-01"  id="f4"  min="1970-01-01" class="form-control" onchange="v4(this.value)" required>

</select>

        <div id="v4"></div>

</div>

      <div class="form-group">

<label>Country:</label>
<select name="country" id="f5"  class="custom-select" onchange="v5(this.value)" required>
<option value="">Select Country</option>
<option value="Nigeria">Nigeria</option>
<option value="Ghana">Ghana</option>
<option value="Cameroon">Cameroon</option>
<option value="Togo">Togo</option>
<option value="Ivorycoast">Ivory Coast</option>

</select>
<div id="v5"></div>


</div>

      <div class="form-group">

<label>Address:</label>
<textarea name="address" id="f6"  cols="6" rows="4" class="form-control" onchange="v6(this.value)" required></textarea>


        <div id="v6"></div>
</div>


      <button class="btn btn-success btn-block" name="submit" type="submit">Complete Registration</button>
    <p/>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2020 Yabatech</p>
    </form>
</body>
</html>