<?php 
include("../header.php");
include("check.php");
$user=$_SESSION['user'];
$passport=getphoto($user);
//FETCHING VALIDUSER DETAILS NOW
$check=mysqli_query($con, "SELECT * FROM student_db WHERE email='$user'");
$fetch=mysqli_fetch_array($check);
$surname=$fetch['surname'];
$sex=$fetch['sex'];
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
$jambnum=$fetchj['regnum'];
$jambyear=$fetchj['examyear'];



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
?>

<!DOCTYPE html>
<html lang="en">
<head>   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Reult</title>
</head>
<body onload="setTimeout(load, 15000)">

<div id="loader"><br><br><br>
<center><P class="lead">PROCESSING RESULT...</P><img src="../images/loader.gif" alt="loading"><br>
</center>
</div>

<div id="container">
<div class="post">Hello <?php echo($surname ." " .$name); ?>  here is your screening result</div>
<br> <div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-user"></i> BIO DATA</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-book"></i> JAMB SCORE</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa fa-book"></i> SSCE SCORE</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fa fa-book"></i> SCREENING SCORE</a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
      <p class="h6">Name: <?php echo($surname ." " .$name); ?></p><hr>


<p class="h6">Course: <?php echo($coursename); ?></p><hr>


<p class="h6">Programme: <?php echo($programme); ?></p><hr>

<p class="h6">Sex: <?php echo($sex); ?></p><hr>

<p class="h6">Age: <?php echo($dob); ?></p><hr>
      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
      <p class="h6">Name: <?php echo($surname ." " .$name); ?></p><hr>

          <p class="h6">Registration Number: <?php echo($jambnum); ?></p><hr>


<p class="h6">Exam Date: <?php echo($jambyear); ?></p><hr>


<p class="h6">Jamb Score: <?php echo($jambscore); ?></p><hr>
</div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
      <p class="h6">Name: <?php echo($surname ." " .$name); ?></p><hr>

      <p class="h6">Type: <?php echo($type); ?></p><hr>
<p class="h6">Registration Number: <?php echo($examnum); ?></p><hr>




<p class="h6">Exam Date: <?php echo($examyear); ?></p><hr>

<p class="h6"><?php echo($sub1); ?>: <?php echo($grade1); ?></p><hr>

<p class="h6"><?php echo($sub2); ?>: <?php echo($grade2); ?></p><hr>

<p class="h6"><?php echo($sub3); ?>: <?php echo($grade3); ?></p><hr>

<p class="h6"><?php echo($sub4); ?>: <?php echo($grade4); ?></p><hr>

<p class="h6"><?php echo($sub5); ?>: <?php echo($grade5); ?></p><hr>
      </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
      <p class="h6">Name: <?php echo($surname ." " .$name); ?></p><hr>

<p class="h6">Jamb point: <?php echo($jambpoint); ?></p><hr>


<p class="h6">Ssce Point: <?php echo($ofinal); ?></p><hr>


<p class="h6">Screening Score: <?php echo($total); ?></p><hr>
      </div>
    </div>
  </div>
</div>
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