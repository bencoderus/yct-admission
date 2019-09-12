 <?php
/**
PROJECT:  ONENAIRA PROJECT
AUTHOR: BENART IDUWE
DATE: MAY 2018
VERSION: 1.0
**/
require('inc/init.php');
date_default_timezone_set("Africa/Lagos");
session_start();
?>
<?php
if(empty($nav1))
{
  $nav1=""; 
}
if(empty($nav2))
{
  $nav2=""; 
}
if(empty($nav3))
{
  $nav3=""; 
}
if(empty($nav4))
{
  $nav4=""; 
}
if(empty($nav5))
{
  $nav5=""; 
}

if(empty($nav6))
{
  $nav6=""; 
}
?>

  <!DOCTYPE HTML>
<html>
<head>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<link rel='stylesheet' href='../css/theme.css'>
<link rel='stylesheet' href='../css/font-awesome.css' media='all' />
<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>

<!----Nav bar------>

<?php
if(isset($_SESSION['user']))
{
?>

<!--code logged-->
<nav class='navbar fixed-top navbar-expand-sm navbar-dark hdd bg-dark'>
  <a class='navbar-brand' href='../index'><img src="../images/logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> <?php echo strtoupper($sitename); ?></a>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarText' aria-controls='navbarText' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarText'>
<ul class='navbar-nav ml-auto'>
      <li class='nav-item active'>
        <a class='nav-link navfont' href='index'>HOME <span class='sr-only'>(current)</span></a>
      </li>

<li class='nav-item'>
      <a class='nav-link navfont' href='../aspire/'>STUDENTS</a>
      </li>
      <li class='nav-item'>
      <a class='nav-link navfont' href='../courses'>COURSES</a>
      </li>
      
      <li class='nav-item'>
      <a class='nav-link navfont' href='../mail'>CONTACT US</a></li>
    </ul>
    <span class='navbar-text'>    </span>
  </div>
</nav>
<?php
}
else
{
?>
<!--code not logged-->
<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark hdd">
  <div class="container">
  <a class="navbar-brand" href="#">Yabatech</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item <?php echo($nav1); ?>">
        <a class="nav-link" href="index">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php echo($nav2); ?>">
        <a class="nav-link" href="../about">About</a>
      </li>
<li class="nav-item dropdown <?php echo($nav3); ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Student
        </a>
        <div class="dropdown-menu main" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item main" href="../aspire">Fresh Student</a>
          <a class="dropdown-item main" href="../aspire/login">Prospective Student</a>
          <a class="dropdown-item main" href="../student/">Returning Student</a>
        </div>
      </li>
      <li class="nav-item <?php echo($nav4); ?>">
        <a class="nav-link" href="../staff/">Staff</a>
      </li>
      <li class="nav-item <?php echo($nav5); ?>">
        <a class="nav-link" href="../course">Courses</a>
      </li>
      <li class="nav-item <?php echo($nav6); ?>">
        <a class="nav-link" href="../contact/">Contact</a>
      </li>
    </ul>
  </div></div>
</nav>
<?php
}
?>
<br><br><br>
  <script src='../js/jquery-3.3.1.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<div class='mycontainer'>
<div class='row'>
<div class='col-lg-9'><br>