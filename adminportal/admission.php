<?php
include('head.php');
include("check.php");
//dept

if(isset($_GET['dept']))
{
$dept=$_GET['dept'];
$sql2=mysqli_query($con, "SELECT * FROM result_db WHERE admissionstatus=1 AND courseid=$dept");
$count=mysqli_num_rows($sql2);
$checkc=mysqli_query($con, "SELECT * FROM course_db WHERE id='$dept'");
$fetchc=mysqli_fetch_array($checkc);
$coursename=$fetchc['title'];
if($count > 0)
{
	$cc=0;
echo "<title>Admission | $coursename</title>
<h3 class='text-uppercase text-center'>$coursename	ADMISSION LIST</h3><BR>
<hr>
<table id='admitted' class='table table-bordered'>
  <thead class='hdd'>
    <tr>
      <th scope='col'>S/N</th>
      <th scope='col'>Full name</th>
      <th scope='col'>JAMB num</th>
  <th scope='col'>Course</th>

    </tr>
  </thead>
  <tbody>";
while($row=mysqli_fetch_assoc($sql2))
{
 $cc++;
$email=$row['student'];
$cid=$row['courseid'];
$name=getnames($email);
$checkj=mysqli_query($con, "SELECT * FROM jamb_db WHERE student='$email'");
$fetchj=mysqli_fetch_array($checkj);
$jambnum=$fetchj['regnum'];
$checkc=mysqli_query($con, "SELECT * FROM course_db WHERE id='$cid'");
$fetchc=mysqli_fetch_array($checkc);
$coursename=$fetchc['title'];
?>
<div class="container">
        <tr>
            <td><?php echo "$cc"; ?></td>
            <td><?php echo "$name"; ?></td>
            <td><?php echo "$jambnum"; ?></td>
            <td><?php echo "$coursename"; ?></td>
         </div>
<?php


}

echo "</tr>
  </tbody>
</table>";

}
else
{
	echo "<div class='alert alert-warning'>No student has been admitted yet</div>";
}
include('foot.php');
exit();
}
?>



<!--ADMISSION -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Departmental admission list</title>
</head>
<body>
	<h3>DEPARTMENTAL ADMISSION</h3>
	<small>Admission list can be viewed by departments</small><hr>
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Admission</li>
  </ol>
</nav>
	<ul class='list-group'>
<li class='list-group-item active'><h6 class='mb-1'>Departments</h6></li>

<?php
$sql=mysqli_query($con, "SELECT * FROM course_db ORDER BY id");
$count=mysqli_num_rows($sql);
if($count > 0)
{
	$bb=0;
while($row=mysqli_fetch_assoc($sql))
{
	$bb++;
	$id=$row['id'];
	$title=$row['title'];
	echo "
<li class='list-group-item d-flex justify-content-between align-items-center'><a href='admission.php?dept=$id'><h6 class='mb-1'>$bb.  $title</h6></a> </li>";
}
echo "</ul>";
}

else
{
	echo "<div class='alert alert-warning'>No course added yet!</div>";
}


include('foot.php');
?>
</body>
</html>

<script>
    $(document).ready( function () {
    $('#admitted').DataTable();
} );
</script>