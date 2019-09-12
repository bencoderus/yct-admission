<?php 
include("../header.php");
include("check.php");
$user=$_SESSION['user'];
$names=getnames(ucwords($user));
$date=time();

$reglevel=getreglevel($user);
if($reglevel < 7)
{    $msg="You are not qualified for admission yet!";
    header("location: dashboard?errormsg=$msg"); 
}

//FETCH DETAILS
$check=mysqli_query($con, "SELECT * FROM student_db WHERE email='$user'");
$fetch=mysqli_fetch_array($check);
$surname=$fetch['surname'];
$name=$fetch['othername'];
$dob=age($fetch['dob']);
$address=$fetch['address'];
$admitted=$fetch['admitted'];





$programme=strtoupper($fetch['programme']);
$courseid=$fetch['courseid'];
//GET COURSE
$checkcourse=mysqli_query($con, "SELECT * FROM course_db WHERE id='$courseid'");
$fetchcourse=mysqli_fetch_array($checkcourse);
$coursename=$fetchcourse['title'];

//GET SESSION
$checks=mysqli_query($con, "SELECT * FROM jamb_db WHERE student='$user'");
$row=mysqli_fetch_array($checks);
$session=$row['examyear'];


if($admitted == 1)
{
$msg="<p>Dear <b>" .$surname .", </b> You have been <b>offered admission</b> provisional admission into a Two years ND " .$programme ." Programme to study <b>" .$coursename ."</b> for the " .$session  ." Academic Session. <br> Please proceed to make payment for your acceptance fee within the 3weeks deadline<br>
Kindly note that if at any time it is discovered that you provided false information or forged document, this provisional admission will be withdrawn and you will be expelled from the college.
<br>
<br>
<b>You are required to bring along with you the following</b><br>
i. Letter Of admisssion<br>
ii. Original copies of your credentials<br>
iii. Two reference letters<br>
iv. Acceptance letter <br>
v. Birth certificate <br>
vi. Testimonial<br>
vii. Photocard of guardian/parent<br>
<br><br>
Failure to produce this documents will nullify the offer of admission.<br><br>

<b>Congratulation.</b>

<p class='text-center writeb'>B.I IDUWE<br>REGISTRAR<br></p>

</p>

";
}
elseif($admitted == 2)
{
$msg="Dear <b>" .$names .", </b> You are <b>not qualified for provisional admission</b>  into our institution. You didnt make the cut-off mark for your desired course. ";
}

elseif($admitted == 0)
{
$msg="Dear <b>" .$surname .", </b> You have not completed the screening process yet, you are not <b>not qualified for admission yet!<b>";
}
else
{
    $msg="Nothing yet";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admission Status</title>
</head>
<body onload="setTimeout(load, 20000)">

<div id="loader"><br><br><br>
<center><P class="lead">PROCESSING ADMISSION STATUS...</P><img src="../images/loader.gif" alt="loading"><br>
</center>
</div>

<div id="container">    
<h5>ADMISION STATUS</h5><hr>
<?php echo($msg); ?>
</div>
</body>
</html>

<?php
include("../footer.php");

?>

 <script>
$("document").ready(function()
{
$("#container").hide();

});
function load()
{
    $("#loader").hide();
    $("#container").show();
}
    </script>