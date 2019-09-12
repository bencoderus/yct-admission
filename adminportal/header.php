<?php

/**
PROJECT:  ONENAIRA PROJECT
AUTHOR: BENART IDUWE
DATE: MAY 2018
VERSION: 1.0


**/
require('../inc/init.php');
date_default_timezone_set("Africa/Lagos");
session_start();

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
<nav class='navbar fixed-top navbar-expand-sm navbar-dark hdd bg-dark'>
  <a class='navbar-brand' href='../index'><img src="../images/logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> <?php echo strtoupper($sitename); ?></a>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarText' aria-controls='navbarText' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarText'>
<ul class='navbar-nav mr-auto'>
      <li class='nav-item active'>
        <a class='nav-link navfont' href='index'>HOME <span class='sr-only'>(current)</span></a>
      </li>

<li class='nav-item'>
      <a class='nav-link navfont' href='student'>STUDENTS</a>
      </li>
      <li class='nav-item'>
      <a class='nav-link navfont' href='course'>COURSES</a>
      </li>
      
      <li class='nav-item'>
      <a class='nav-link navfont' href='admission'>MANAGE ADMISSION</a>
      </li>
      <li class='nav-item'>
      <a class='nav-link navfont' href='help'>GET HELP</a>
    </ul>
    <span class='navbar-text'>    </span>
  </div>
</nav>


<br>
	<script src='../js/jquery-3.3.1.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<div class='mycontainer'>
<br><br><br>
<div class='row'>

<?php 
include('sidebar.php');
?>

<div class='col-lg-9'>