<?php
include("../header.php");
include("check.php");
$user=$_SESSION['user'];
$reglevel=getreglevel($user);
if($reglevel >= 8)
{
    header("location: viewadmission");
}
elseif($reglevel < 7)
{
    $msg="Ensure all your credential are complete!";
    header("location: dashboard?errormsg=$msg");
}
else
{
$date=time();
//course
$check=mysqli_query($con, "SELECT * FROM student_db WHERE email='$user'");
$fetch=mysqli_fetch_array($check);
$courseid=$fetch['courseid'];
//GET COURSE
$checkcourse=mysqli_query($con, "SELECT * FROM course_db WHERE id='$courseid'");
$fetchcourse=mysqli_fetch_array($checkcourse);
$coursename=$fetchcourse['title'];
$cutoff=$fetchcourse['cutoff'];
//OBTAIN RESULT
$checkr=mysqli_query($con, "SELECT * FROM result_db WHERE student='$user'");
$fetchr=mysqli_fetch_array($checkr);
$total=$fetchr['total'];

//ADMISSION OFFERING
if($total >= $cutoff)
{
    mysqli_query($con, "UPDATE student_db SET reglevel=8, admitted=1 WHERE email='$user'");
       mysqli_query($con, "UPDATE result_db SET admissionstatus=1 WHERE student='$user'");
    $msg="Your admission status is ready!";
    header("location: dashboard?msg=$msg"); 
}
else
{
    mysqli_query($con, "UPDATE student_db SET reglevel=8, admitted=2 WHERE email='$user'");
    header("location: viewadmission");
}
}
?>