<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="images/favicon.ico">


    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Icons -->
    <link href="../css/font-awesome.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
   <link href="../css/theme.min.css" rel="stylesheet">
    
</head>
<body>
	<div class="container-fluid" id="wrapper">
		<div class="row">
			<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">
				<h1 class="site-title"><a href="index"> YABATECH</a></h1>
				
				<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link active" href="dashboard"><em class="fa fa-dashboard"></em> Dashboard</a></li>
					<li class="nav-item"><a class="nav-link" href="addcourse"><em class="fa fa-plus"></em> Add course</a></li>
					<li class="nav-item"><a class="nav-link" href="course"><em class="fa fa-bar-chart"></em> Courses</a></li>
					<li class="nav-item"><a class="nav-link" href="student"><em class="fa fa-users"></em> Applicants</a></li>
					<li class="nav-item"><a class="nav-link" href="admission"><em class="fa fa-mortar-board"></em> Admission</a></li>
					<li class="nav-item"><a class="nav-link" href="help"><em class="fa fa-tag"></em> User manual </a></li>
				</ul>
				
				<a href="logout.php" class="logout-button"><em class="fa fa-power-off"></em> Signout</a></nav>
			<main class="col-xs-12 col-sm-8 col-lg-9 col-xl-10 pt-3 pl-4 ml-auto">
<?php
session_start();
include("../inc/init.php");
?>