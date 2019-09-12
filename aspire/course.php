<?php
include("../header.php");
include("check.php");
$user=$_SESSION['user'];
$names=ucwords(getnames($user));
$reglevel=getreglevel($user);

if($reglevel >= 4)
{
    $msg="You have already selected a course!";
    header("location: dashboard?errormsg=$msg");
}
elseif($reglevel < 3)
{    $msg="Upload Passport Photograph first!";
    header("location: dashboard?errormsg=$msg"); 
}


if(isset($_POST['submit']))
{
    $course=$_POST['course'];
    $programme=$_POST['programme'];
    if(empty($course) || empty($programme))
    {
        echo "<div class='alert alert-warning'>All the fields are required</div>";
    }
    else
    {
        $send=mysqli_query($con, "UPDATE student_db SET programme='$programme', courseid='$course'");
        if($send)
        {
            mysqli_query($con, "UPDATE student_db SET reglevel=4 WHERE email='$user'");
            $msg="You have successfully selected your preferred course";
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
    <title>Course selection | Aspirant dashboard</title>
</head>
<body>
<div class="post">Hello  <b><?php echo($names); ?></b>, Please be careful when selecting your preferred course because selection can only be done once!</div><br>

<form action="" method="POST">

<?php
$sql=mysqli_query($con, "SELECT * FROM course_db");
echo "<div class='form-group'>
<label>Select Course:</label>
<select name='course' class='form-control' required><option value=''>Not selected</option>";
while($row=mysqli_fetch_assoc($sql))
{
$title=$row['title'];
$id=$row['id'];
echo "<option value='$id'>$title</option>";
}

echo "</select></div>";


?>

<div class="form-group">
<label>Select Programme</label>
<select name="programme" class="form-control" required><option value=''>Not selected</option>
    <option value="Full time">Full time</option>
    <option value="Part time">Part time</option>
</select>


</div>
<button type="submit" name="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Submit Course</button>

</form>
    <br>
</body>
</html>




<?php
include("../footer.php")
?>