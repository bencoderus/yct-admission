<?php
/**
PROJECT:  AUTOMATED ADMISSION SYSTEM
AUTHOR: BENART IDUWE 
DATE: SEPTEMBER 2018
VERSION: 1.0
**/
function ago( $ptime )
{
$estimate_time = time () -
$ptime ;
if ( $estimate_time < 1 )
{
return 'a moment ago' ;
}
$condition = array (
12 * 30 * 24 *
60 * 60 => 'year' ,
30 * 24 * 60 *
60 => 'month' ,
24 * 60 * 60
=> 'day' ,
60 * 60
=> 'hour' ,
60
=> 'minute' ,
1
=> 'second'
);
foreach ( $condition as $secs
=> $str )
{
$d = $estimate_time /
$secs ;
if ( $d >= 1 )
{
$r = round ( $d );
return $r
. ' ' . $str . ( $r > 1 ? 's' :
'' ) . ' ago' ;
}
}
}

function age( $ptime )
{
$estimate_time = time () -
$ptime ;
if ( $estimate_time < 1 )
{
return 'a moment ago' ;
}
$condition = array (
12 * 30 * 24 *
60 * 60 => 'year' ,
30 * 24 * 60 *
60 => 'month' ,
24 * 60 * 60
=> 'day' ,
60 * 60
=> 'hour' ,
60
=> 'minute' ,
1
=> 'second'
);
foreach ( $condition as $secs
=> $str )
{
$d = $estimate_time /
$secs ;
if ( $d >= 1 )
{
$r = round ( $d );
return $r
. ' ' . $str . ( $r > 1 ? 's' :
'' );
}
}
}

function gradecalc($grade)
{
if($grade=="A1")
{
	$gradepoint=8;
}
elseif($grade=="B2")
{
	$gradepoint=7;
}
elseif($grade=="B3")
{
	$gradepoint=6;
}
elseif($grade=="C4")
{
	$gradepoint=5;
}
elseif($grade=="C5")
{
	$gradepoint=4;
}

elseif($grade=="C6")
{
	$gradepoint=3;
}
return $gradepoint;
}

function jambpoint($jamb)
{
if($jamb < 180)
{
	$gradepoint=0;
}
elseif($jamb >= 180 && $jamb < 190)
{
	$gradepoint=10;
}
elseif($jamb >= 190 && $jamb < 200)
{
	$gradepoint=20;
}
elseif($jamb >= 200 && $jamb < 210)
{
	$gradepoint=30;
}
elseif($jamb >= 210 && $jamb < 220)
{
	$gradepoint=40;
}
elseif($jamb >= 220 && $jamb < 230)
{
	$gradepoint=50;
}

elseif($jamb >= 230)
{
	$gradepoint=60;
}
else
{
	$gradepoint=0;
}
return $gradepoint;
}


function cleaninput($string)
{
global $con;
$clean=mysqli_real_escape_string($con, $string);
$clean=strip_tags($string);
return $clean;	
}

function getnames($email)
{
global $con;
$check=mysqli_query($con, "SELECT * FROM student_db WHERE email='$email'");
$fetch=mysqli_fetch_array($check);
$surname=$fetch['surname'];
$name=$fetch['othername'];
$ok=$surname ." " .$name;
return $ok;
}

function adstatus($email)
{
global $con;
$check=mysqli_query($con, "SELECT * FROM student_db WHERE email='$email'");
$fetch=mysqli_fetch_array($check);
$admitted=$fetch['admitted'];
if($admitted == 0)
{
$ok="<font color='blue'><b>NOT ADMITTED YET!</b></font>";
}
elseif($admitted == 1)
{

	$ok="<font color='green'><b>ADMITTED FOR ADMISSION</b></font>";
}
elseif($admitted == 2)
{

	$ok="<font color='red'><b>UNQUALIFIED FOR ADMISSION!</b></font>";
}


return $ok;
	
}
function getreglevel($email)
{
global $con;
$check=mysqli_query($con, "SELECT * FROM student_db WHERE email='$email'");
$fetch=mysqli_fetch_array($check);
$level=$fetch['reglevel'];
return $level;
}


function getphoto($email)
{
global $con;
$check=mysqli_query($con, "SELECT * FROM student_db WHERE email='$email'");
$fetch=mysqli_fetch_array($check);
$photo=$fetch['img'];
if(!empty($photo))
{
$photoview="<img src='../avatars/$photo' alt='Passport' style='width: 30%;' class='rounded-circle'>
";
}
else
{
$photoview="<font color='#28a745'><i class='fa fa-5x fa-user-circle'></i></font>";
}
return $photoview;	
}

function grade($score, $total)
{
$result=($score/$total)*100;
$result=round($result);
return $result;
}

function level($level)
{
	if($level==3)
	{
	$level="Developer";
	}
	elseif($level==2)
	{
	$level="Admin";
	}
	elseif($level==3)
	{
	$level="Member";
	}
	else
{
	$level="Unknown";
	}
	return $level;
}

function grader($score)
{
if($score < 40)
{
$result="F";
return $result;
}
if($score >= 40 && $score <= 49)
{
$result="D";
return $result;
}
if($score >= 50 && $score <= 59)
{
$result="C";
return $result;
}
if($score >= 60 && $score <= 74)
{
$result="B";
return $result;
}
if($score >= 75)
{
$result="A";
return $result;
}
}

function remark($score)
{
if($score < 40)
{
$result="Too bad";
return $result;
}
if($score >= 40 && $score <= 49)
{
$result="Poor pass";
return $result;
}
if($score >= 50 && $score <= 59)
{
$result="Good Job";
return $result;
}
if($score >= 60 && $score <= 74)
{
$result="Very Good";
return $result;
}
if($score >= 75)
{
$result="Excellent";
return $result;
}
}


function trimtext($text, $len)
{
$start=0;
$newstring=substr($text, $start, $len);
return $newstring;
}


?>