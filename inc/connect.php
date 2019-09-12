<?php

/**
PROJECT: AUTOMATED ADMISSION SYSTEM PROJECT
AUTHOR: BENART IDUWE
DATE: MAY 2018
VERSION: 1.0
**/
$con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if($con)
{
	echo "";
}
else
{
	die('CONNECTION FAILED, SETUP DB DETAILS IN CONNECT.PHP');
	}
	?>