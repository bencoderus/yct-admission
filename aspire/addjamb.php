<?php
include("../header.php");
include("check.php");
$user=$_SESSION['user'];

$check=mysqli_query($con, "SELECT * FROM student_db WHERE email='$user'");
$fetch=mysqli_fetch_array($check);
$programme=$fetch['programme'];
$courseid=$fetch['courseid'];
//GET COURSE
$checkcourse=mysqli_query($con, "SELECT * FROM course_db WHERE id='$courseid'");
$fetchcourse=mysqli_fetch_array($checkcourse);
$coursename=$fetchcourse['title'];
$jamb=$fetchcourse['jamb_combo'];
$ajamb=explode(",",  $jamb);
$names=ucwords(getnames($user));
$reglevel=getreglevel($user);
if($reglevel >= 6)
{
    $msg="You have already added your JAMB result!";
    header("location: dashboard?errormsg=$msg");
}

elseif($reglevel < 4)
{    $msg="Upload Olevel result first!";
    header("location: dashboard?errormsg=$msg"); 
}

if(isset($_POST['submit']))
{
//SUBJECT
$sub1=$_POST['subject1'];
$sub2=$_POST['subject2'];
$sub3=$_POST['subject3'];
$sub4=$_POST['subject4'];

//SCORES
$score1=$_POST['score1'];
$score2=$_POST['score2'];
$score3=$_POST['score3'];
$score4=$_POST['score4'];

//JAMB SCORE
$jambscore=$score1 + $score2 + $score3 + $score4;
$date=time();
//OTHERS
$regno=$_POST['regno'];
$examdate=$_POST['examdate'];
$checkreg=mysqli_query($con, "SELECT regnum FROM jamb_db WHERE regnum='$regno'");
$countreg=mysqli_num_rows($checkreg);
if($sub1=="$sub2" || $sub1=="$sub3" || $sub1=="$sub4")
{
echo "<div class='alert alert-warning'>Repeatation of selected subject is not allowed!</div>";
}

elseif($sub2=="$sub1" || $sub2=="$sub3" || $sub2=="$sub4")
{
echo "<div class='alert alert-warning'>Repeatation of selected subject is not allowed!</div>";
}

elseif($sub3=="$sub1" || $sub3=="$sub2" || $sub3=="$sub4")
{
echo "<div class='alert alert-warning'>Repeatation of selected subject is not allowed!</div>";
}

elseif($sub4=="$sub1" || $sub4=="$sub3" || $sub4=="$sub2")
{
echo "<div class='alert alert-warning'>Repeatation of selected subject is not allowed!</div>";
}
elseif ($countreg > 0)
{
    echo "<div class='alert alert-warning'>Jamb registration number already exist!</div> ";
}

elseif(!in_array($sub1, $ajamb))
{
    echo "<div class='alert alert-warning'>$sub1 is not a valid combo!</div> ";
}

elseif(!in_array($sub2, $ajamb))
{
    echo "<div class='alert alert-warning'>$sub2 is not a valid combo!</div> ";
}

elseif(!in_array($sub3, $ajamb))
{
    echo "<div class='alert alert-warning'>$sub3 is not a valid combo!</div> ";
}

elseif(!in_array($sub4, $ajamb))
{
    echo "<div class='alert alert-warning'>$sub4 is not a valid combo!</div> ";
}

else
{
$sql="INSERT INTO jamb_db(sub1, sub2, sub3, sub4, score1, score2, score3, score4, jambscore, date, regnum, examyear, student) VALUES('$sub1','$sub2','$sub3','$sub4','$score1','$score2','$score3','$score4','$jambscore','$date', '$regno', '$examdate', '$user')";
$send=mysqli_query($con, $sql);
if($send)
{
    mysqli_query($con, "UPDATE student_db SET reglevel=6 WHERE email='$user'");
    $msg="You have successfully uploaded your JAMB result";
    header("location: dashboard?msg=$msg"); 
}
else
{
    echo "<div class='alert alert-warning'>Failed!</div>";
}
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add JAMB result</title>
</head>
<body>

<div class="post">Hello <?php echo($names); ?>,  you need the following subjects in JAMB:  <?php echo($jamb); ?> to study <b><?php echo($coursename); ?></b> in our institution</div>
<br>

<form action="" method="POST">
<div class="form-group form-inline">
<label for="regno">JAMB Registration Number:</label>
<input type="text" name="regno" minlength="10" maxlength=10 class="form-control mx-sm-3" placeholder="Reg No" required>


<label class="mx-sm-3">JAMB Exam Year:</label>

    <select name="examdate" class="form-control mx-sm-3" required>
    <option value="">Date Selection</option>
      <option value="2018/2019">2018/2019</option>
      <option value="2017/2018">2017/2018</option>
    <option value="2016/2018">2016/2018</option>
    <option value="2015/2016">2015/2016</option>
    <option value="2014/2015">2014/2015</option>

 <option value="2013/2014">2013/2014</option>
    <option value="2012/2013">2012/2013</option>
    <option value="2011/2012">2011/2012</option>
    <option value="2010/2011">2010/2011</option>

 <option value="2009/2010">2009/2010</option>
    <option value="2008/2009">2008/2009</option>
    <option value="2007/2008">2007/2008</option>
    <option value="2006/2007">2006/2007</option>

 <option value="2005/2006">2005/2006</option>
    <option value="2004/2005">2004/2005</option>
    <option value="2003/2004">2003/2004</option>
    <option value="2002/2003">2002/2003</option>

    <option value="2001/2002">2001/2002</option>
    <option value="2000/2001">2000/2001</option>

</select>


</div>

<div class="form-group">
<div class="form-inline">


<label>Subject 1: </label>
<select name="subject1" class="form-control mx-sm-3" required>
<option value="">Select Subject</option>
    <option value="Mathematics">Mathematics</option>
    <option value="English" selected>English</option>
    <option value="Biology">Biology</option>
    <option value="Physics">Physics</option>
    <option value="Chemistry">Chemistry</option>
    <option value="Literature">Literature</option>
    <option value="Government">Government</option>
    <option value="CRS">CRS</option>
    <option value="Geography">Geography</option>
    <option value="Agriculture">Agriculture</option>
    <option value="Accounting">Accounting</option>
    <option value="Commerce">Commerce</option>
    <option value="Further Maths">Further Maths</option>
    <option value="Economics">Economics</option>

</select>
<label class=" mx-sm-3">Score:
    </label>

<input type="number" name="score1"  max="100" class="form-control mx-sm-3" placeholder="0 - 100" required>

</div>
</div>



<div class="form-group">
<div class="form-inline">

<label>Subject 2: </label>
<select name="subject2" class="form-control mx-sm-3" required>
<option value="">Select Subject</option>
    <option value="Mathematics">Mathematics</option>
    <option value="English">English</option>
    <option value="Biology">Biology</option>
    <option value="Physics">Physics</option>
    <option value="Chemistry">Chemistry</option>
    <option value="Literature">Literature</option>
    <option value="Government">Government</option>
    <option value="CRS">CRS</option>
    <option value="Geography">Geography</option>
    <option value="Agriculture">Agriculture</option>
    <option value="Accounting">Accounting</option>
    <option value="Commerce">Commerce</option>
    <option value="Further Maths">Further Maths</option>
    <option value="Economics">Economics</option>

</select>
<label class=" mx-sm-3">Score:
    </label>

<input type="number" name="score2" max="100" class="form-control mx-sm-3" placeholder="0 - 100" required>


</div>
</div>


<div class="form-group">
<div class="form-inline">
<label>Subject 3: </label>
<select name="subject3" class="form-control mx-sm-3" required>
<option value="">Select Subject</option>
    <option value="Mathematics">Mathematics</option>
    <option value="English">English</option>
    <option value="Biology">Biology</option>
    <option value="Physics">Physics</option>
    <option value="Chemistry">Chemistry</option>
    <option value="Literature">Literature</option>
    <option value="Government">Government</option>
    <option value="CRS">CRS</option>
    <option value="Geography">Geography</option>
    <option value="Agriculture">Agriculture</option>
    <option value="Accounting">Accounting</option>
    <option value="Commerce">Commerce</option>
    <option value="Further Maths">Further Maths</option>
    <option value="Economics">Economics</option>

</select>

<label class=" mx-sm-3">Score:
    </label>

<input type="number" name="score3" max="100" class="form-control mx-sm-3" placeholder="0 - 100" required>

</div>
</div>


<div class="form-group">
<div class="form-inline">
<label>Subject 4: </label>
<select name="subject4" class="form-control mx-sm-3" required>
<option value="">Select Subject</option>
    <option value="Mathematics">Mathematics</option>
    <option value="English">English</option>
    <option value="Biology">Biology</option>
    <option value="Physics">Physics</option>
    <option value="Chemistry">Chemistry</option>
    <option value="Literature">Literature</option>
    <option value="Government">Government</option>
    <option value="CRS">CRS</option>
    <option value="Geography">Geography</option>
    <option value="Agriculture">Agriculture</option>
    <option value="Accounting">Accounting</option>
    <option value="Commerce">Commerce</option>
    <option value="Further Maths">Further Maths</option>
    <option value="Economics">Economics</option>

</select>

<label class=" mx-sm-3">Score:
    </label>
<input type="number" name="score4" max="100" class="form-control mx-sm-3" placeholder="0 - 100" required>
</div>
</div>
<br>
<center>
<button class="btn btn-success" type="submit" name="submit"><i class="fa fa-plus"></i> Add JAMB Result</button></center><br>
</form> 
</body>
</html>
<?php
include("../footer.php");
?>