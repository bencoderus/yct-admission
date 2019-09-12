<?php 
include("../header.php");
include("check.php");
$user=$_SESSION['user'];
$date=time();
$reglevel=getreglevel($user);
if($reglevel >= 7)
{
    header("location: myresult");
}
elseif($reglevel < 6)
{    $msg="Upload credentials first!";
    header("location: dashboard?errormsg=$msg"); 
}
else
{
//FETCHING VALIDUSER DETAILS
$check=mysqli_query($con, "SELECT * FROM student_db WHERE email='$user'");
$fetch=mysqli_fetch_array($check);
$surname=$fetch['surname'];
$name=$fetch['othername'];
$dob=age($fetch['dob']);
$address=$fetch['address'];
$programme=$fetch['programme'];
$courseid=$fetch['courseid'];
//GET COURSE
$checkcourse=mysqli_query($con, "SELECT * FROM course_db WHERE id='$courseid'");
$fetchcourse=mysqli_fetch_array($checkcourse);
$coursename=$fetchcourse['title'];
//GET JAMB
$checkj=mysqli_query($con, "SELECT * FROM jamb_db WHERE student='$user'");
$fetchj=mysqli_fetch_array($checkj);
$jambscore=$fetchj['jambscore'];
//GET OLEVEL
$checkss=mysqli_query($con, "SELECT * FROM ssce_db WHERE student='$user'");
$fetchss=mysqli_fetch_array($checkss);
$sub1=$fetchss['sub1'];
$sub2=$fetchss['sub2'];
$sub3=$fetchss['sub3'];
$sub4=$fetchss['sub4'];
$sub5=$fetchss['sub5'];
$type=$fetchss['type'];
$examnum=$fetchss['examnum'];
$grade1=$fetchss['grade1'];
$grade2=$fetchss['grade2'];
$grade3=$fetchss['grade3'];
$grade4=$fetchss['grade4'];
$grade5=$fetchss['grade5'];
$examyear=$fetchss['examyear'];
//POST UTME SCREENING
$jambpoint=jambpoint($jambscore);
$oscore1=gradecalc($grade1);
$oscore2=gradecalc($grade2);
$oscore3=gradecalc($grade3);
$oscore4=gradecalc($grade4);
$oscore5=gradecalc($grade5);
$ofinal=$oscore1 + $oscore2 + $oscore3 + $oscore4 + $oscore5;
$total=$jambpoint+$ofinal;
$sql="INSERT INTO result_db(utmescore, sscescore, total, student, date, courseid) VALUES('$jambpoint', '$ofinal', '$total', '$user', '$date', '$courseid')";
$send=mysqli_query($con, $sql);
if($send)
{
    mysqli_query($con, "UPDATE student_db SET reglevel=7 WHERE email='$user'");
    $msg="Result is being calculated, Check again!";
    header("location: dashboard?msg=$msg"); 
}
else
{ 
    $msg="Failed to compute result!";
    header("location: dashboard?errormsg=$msg"); 
}
}
?>