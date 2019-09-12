<?php
include("head.php");
include("check.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

<link rel='stylesheet' href='../css/dataTables.bootstrap4.css'>

<script src='../js/jquery.dataTables.min.js'></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student management</title>
</head>
<body>
<h3 class="text-uppercase">ADMISSION APPLICANTS</h3>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage applicants</li>
  </ol>
</nav>
<hr>
    <?php
$sql="SELECT * FROM student_db WHERE reglevel > 1";
$check=mysqli_query($con, $sql);
$count=mysqli_num_rows($check);
if($count > 0)
{
	echo "
 <table id='student' class='table table-bordered'>
  <thead class='hdd'>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Full name</th>
      <th scope='col'>Sex</th>
 <th scope='col'>Programme</th>
  <th scope='col'>Course</th>
<th scope='col'>Action</th>


    </tr>
  </thead>
  <tbody>
    <tr>";
while($fetch=mysqli_fetch_assoc($check))
{
$surname=strtoupper($fetch['surname']);
$name=strtoupper($fetch['othername']);
$age=age($fetch['dob']);
$uid=$fetch['sid'];
$sex=$fetch['sex'];
$address=$fetch['address'];
$programme=$fetch['programme'];
$courseid=$fetch['courseid'];
//GET COURSE
$checkcourse=mysqli_query($con, "SELECT * FROM course_db WHERE id='$courseid'");
$fetchcourse=mysqli_fetch_array($checkcourse);
$coursename=$fetchcourse['title'];

echo "
      <th scope='row'>$uid</th>
      <td>$surname $name</td>
      <td>$sex</td><td>$programme</td><td>$coursename</td><td></td></tr>";
}
echo "</tr>
  </tbody>
</table>";
}
else
{
    echo "<div class='alert alert-warning'>NO STUDENT HAS REGISTERED YET!</div>";
}
?>
</body>
</html>



<?php

include("foot.php");
?>





<script>
	$(document).ready( function () {
    $('#student').DataTable();
} );
</script>