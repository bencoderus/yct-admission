<?php
/**
PROJECT:  YCT PROJECT
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
<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark hdd">
  <div class="container">
  <a class="navbar-brand" href="#">Yabatech</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
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
      <li class="nav-item <?php echo($nav5); ?>">
        <a class="nav-link" href="../courses">Courses</a>
      </li>

      <li class="nav-item <?php echo($nav6); ?>">
        <a class="nav-link" href="../mail">Contact</a>
      </li>
    </ul>
  </div></div>
</nav>
<br><br><br>
	<script src='../js/jquery-3.3.1.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
