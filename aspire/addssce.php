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
$ssce=$fetchcourse['ssce_combo'];
$assce=explode(",",  $ssce);
$reglevel=getreglevel($user);
$names=ucwords(getnames($user));
if($reglevel >= 5)
{
    $msg="You have already added your olevel result!";
    header("location: dashboard?errormsg=$msg");
}

elseif($reglevel < 4)
{    $msg="Upload Photo first!";
    header("location: dashboard?errormsg=$msg"); 
}
$date=time();
if(isset($_POST['submit']))
{
    
$type=$_POST['type'];
$examnum=$_POST['examnum'];
$examdate=$_POST['examdate'];
//subjects

$sub1=$_POST['subject1'];
$sub2=$_POST['subject2'];
$sub3=$_POST['subject3'];
$sub4=$_POST['subject4'];
$sub5=$_POST['subject5'];


//grades 
$grade1=$_POST['grade1'];
$grade2=$_POST['grade2'];
$grade3=$_POST['grade3'];
$grade4=$_POST['grade4'];
$grade5=$_POST['grade5'];

$checkreg=mysqli_query($con, "SELECT examnum FROM ssce_db WHERE examnum='$examnum'");
$countreg=mysqli_num_rows($checkreg);

if($sub1=="$sub2" || $sub1=="$sub3" || $sub1=="$sub4" || $sub1=="$sub5")
{
echo "<div class='alert alert-warning'>Repeatation of selected subject is not allowed!</div>";
}

elseif($sub2=="$sub1" || $sub2=="$sub3" || $sub2=="$sub4" || $sub2=="$sub5")
{
echo "<div class='alert alert-warning'>Repeatation of selected subject is not allowed!</div>";
}

elseif($sub3=="$sub1" || $sub3=="$sub2" || $sub3=="$sub4" || $sub3=="$sub5")
{
echo "<div class='alert alert-warning'>Repeatation of selected subject is not allowed!</div>";
}

elseif($sub4=="$sub1" || $sub4=="$sub3" || $sub4=="$sub2" || $sub4=="$sub5")
{
echo "<div class='alert alert-warning'>Repeatation of selected subject is not allowed!</div>";
}

elseif($sub5=="$sub1" || $sub5=="$sub3" || $sub5=="$sub4" || $sub5=="$sub2")
{
echo "<div class='alert alert-warning'>Repeatation of selected subject is not allowed!</div>";
}

elseif ($countreg > 0)
{
    echo "<div class='alert alert-warning'>SSCE Exam number already exist!</div> ";
}
elseif(!in_array($sub1, $assce))
{
    echo "<div class='alert alert-warning'>$sub1 is not a valid combo!</div> ";
}

elseif(!in_array($sub2, $assce))
{
    echo "<div class='alert alert-warning'>$sub2 is not a valid combo!</div> ";
}

elseif(!in_array($sub3, $assce))
{
    echo "<div class='alert alert-warning'>$sub3 is not a valid combo!</div> ";
}

elseif(!in_array($sub4, $assce))
{
    echo "<div class='alert alert-warning'>$sub4 is not a valid combo!</div> ";
}

elseif(!in_array($sub5, $assce))
{
    echo "<div class='alert alert-warning'>$sub5 is not a valid combo!</div> ";
}
else{

$sql="INSERT INTO ssce_db(sub1, sub2, sub3, sub4, sub5, grade1, grade2, grade3, grade4, grade5, type, date, examnum, examyear, student) VALUES('$sub1','$sub2','$sub3','$sub4','$sub5','$grade1','$grade2','$grade3','$grade4','$grade5','$type','$date', '$examnum', '$examdate', '$user')";
$send=mysqli_query($con, $sql);
if($send)
{
    mysqli_query($con, "UPDATE student_db SET reglevel=5 WHERE email='$user'");
    $msg="You have successfully uploaded your Olevel result";
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
    <title>Add Olevel Result</title>
</head>
<body>
<div class="post">Hello <?php echo($names); ?>,  you need the following subjects:  <?php echo($ssce); ?> to study <b><?php echo($coursename); ?></b> in our institution</div><br>
<form action="" method="POST">

<div class="form-group">
<div class="form-inline">


<label>O'Level:</label> 
<select name="type" class="custom-select mx-sm-3" required>
<option value="">Select Olevel type</option>   
<option value="WAEC">WAEC</option>
    <option value="NECO">NECO</option>
    <option value="GCE">GCE</option>
    <option value="NECO GCE">NECO GCE</option>

</select>
<label class=" mx-sm-3">Exam No:
    </label> <input type="text" name="examnum" minlength="10" maxlength=10 placeholder="Examination Number" class="form-control"> 

<label class=" mx-sm-3">Exam Year:
    </label> 
    <select name="examdate" class="custom-select mx-sm-3" required>
    <option value="">Date Selection</option>
    <option value="2017/2018">2018/2019</option>
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
</div></div>

<div class="form-group">
<div class="form-inline">

<label>Subject 1: </label>
<select name="subject1" class="custom-select form-control mx-3" required>
<option value="">Select Subject</option>
    <option value="Mathematics" selected>Mathematics</option>
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
<label class=" mx-sm-3">Grade:
    </label>

<select name="grade1" class="form-control  mx-3  custom-select" required>
<option value="">Select Grade</option>
    <option value="A1">A1</option>
    <option value="B2">B2</option>
    <option value="B3">B3</option>
    <option value="C4">C4</option>
    <option value="C5">C5</option>
    <option value="C6">C6</option>
</select>

</div>
</div>




<div class="form-group">
<div class="form-inline">
<label>Subject 2: </label>
<select name="subject2" class="custom-select form-control mx-sm-3" required>
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
<label class=" mx-sm-3">Grade:
    </label>
<select name="grade2" class="form-control  mx-sm-3 custom-select" required>
<option value="">Select Grade</option>
    <option value="A1">A1</option>
    <option value="B2">B2</option>
    <option value="B3">B3</option>
    <option value="C4">C4</option>
    <option value="C5">C5</option>
    <option value="C6">C6</option>
</select>

</div>
</div>


<div class="form-group">
<div class="form-inline">

<label>Subject 3: </label>
<select name="subject3" class="form-control custom-select mx-sm-3" required>
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

<label class=" mx-sm-3">Grade:
    </label>
<select name="grade3" class="form-control  mx-sm-3 custom-select" required>
<option value="">Select Grade</option>
    <option value="A1">A1</option>
    <option value="B2">B2</option>
    <option value="B3">B3</option>
    <option value="C4">C4</option>
    <option value="C5">C5</option>
    <option value="C6">C6</option>
</select>

</div>
</div>




<div class="form-group">
<div class="form-inline">
<label>Subject 4: </label>
<select name="subject4" class="form-control mx-sm-3 custom-select" required>
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

<label class=" mx-sm-3">Grade:
    </label>
<select name="grade4" class="form-control  mx-sm-3 custom-select" required>
<option value="">Select Grade</option>
    <option value="A1">A1</option>
    <option value="B2">B2</option>
    <option value="B3">B3</option>
    <option value="C4">C4</option>
    <option value="C5">C5</option>
    <option value="C6">C6</option>
</select>

</div>
</div>


<div class="form-group">
<div class="form-inline">
<label>Subject 5: </label>
<select name="subject5" class="form-control mx-sm-3 custom-select" required>
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

<label class=" mx-sm-3">Grade:
    </label>
<select name="grade5" class="form-control  mx-sm-3 custom-select" required>
<option value="">Select Grade</option>
    <option value="A1">A1</option>
    <option value="B2">B2</option>
    <option value="B3">B3</option>
    <option value="C4">C4</option>
    <option value="C5">C5</option>
    <option value="C6">C6</option>
</select>

</div>
</div>
<br> 
<center>
<button class="btn btn-success btn-block" type="submit" name="submit"><i class="fa fa-plus"></i> Add SSCE Result</button>
</form>
<br>
</body>
</html>
<?php
include("../footer.php");

?>