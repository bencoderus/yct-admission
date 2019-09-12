<?php
include("head.php");
include("check.php");



if(isset($_GET['edit']))
{
  echo "
  <h3>EDIT COURSE</h3><hr>
  ";



  $id=$_GET['edit'];
  $sql="SELECT * FROM course_db WHERE id=$id";
$check=mysqli_query($con, $sql);
$count=mysqli_num_rows($check);
$fetch=mysqli_fetch_array($check);
$title=$fetch['title'];
$des=$fetch['description'];
$cap=$fetch['capacity'];
$cutoff=$fetch['cutoff'];
echo "<title>Modify course</title>";

if(isset($_POST['submit']))
{
    $title=cleaninput($_POST['cname']);
    $date=time();
    $des=cleaninput($_POST['cdes']);
    $cutoff=cleaninput($_POST['ccutoff']);
    $cap=cleaninput($_POST['ccap']);
    $send=mysqli_query($con, "UPDATE course_db SET title='$title',  cutoff='$cutoff', description='$des', capacity='$cap' WHERE id='$id'");
    if($send)
    {
        echo"<br> <div class='alert alert-success'><b>Course was successfully added</b></div>";
    }
    else
    {
        echo"<br> <div class='alert alert-warning'><b>An unknown error occured! $send</b></div>";
    }


}
?>

<form method="POST" action="">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label>Course name</label>
                <input type="text" class="form-control" name="cname" value="<?php echo($title); ?>" minlength="10" id="" required>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label>Course Cut-off</label>
                <input type="number" max=100 class="form-control" value="<?php echo($cutoff); ?>" name="ccutoff" id="" required>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label>Course Capacity</label>
                <input type="number" max=250 class="form-control" value="<?php echo($cap); ?>" name="ccap" id="" required>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
                <label>Course Description</label>
                <textarea class="form-control"  name="cdes" id="" minlength="10" required><?php echo($des); ?></textarea>
            </div>
        </div>
        
        <div class="col-lg-12">
           
            <center> <button class="btn btn-success" style="border-radius: 0px!important;" name="submit" type="submit"><i class="fa fa-edit"></i> Update changes</button><br><br></center>
        </div>
    </div>

<?php
include('foot.php');
 exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<link rel='stylesheet' href='../css/jquery.dataTables.min.css'>

<script src='../js/jquery.dataTables.min.js'></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student management</title>
</head>
<body>
<h3 class="text-uppercase">MANAGE COURSES</h3><hr>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage courses</li>
  </ol>
</nav><br>    <?php
$sql="SELECT * FROM course_db";
$check=mysqli_query($con, $sql);
$count=mysqli_num_rows($check);
if($count > 0)
{
	echo "
 <table id='student' class='table table-bordered'>
  <thead class='thead-dark'>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Title</th>
      <th scope='col'>Description</th>
 <th scope='col'>Cutoff</th>
  <th scope='col'>Capacity</th>
<th scope='col'>Action</th>


    </tr>
  </thead>
  <tbody>
    <tr>";
while($fetch=mysqli_fetch_assoc($check))
{
$title=$fetch['title'];
$des=$fetch['description'];
$id=$fetch['id'];
$cap=$fetch['capacity'];
$cutoff=$fetch['cutoff'];

echo "
      <th scope='row'>$id</th>
      <td>$title</td>
      <td>$des</td><td>$cutoff</td><td>$cap</td><td><div class='btn-group'>
     <a href='course?edit=$id'> <button type='button' class='btn btn-secondary'><i class='fa fa-pencil-square-o'></i> Edit</button></a>
      <a href='course?delete=$id'><button type='button' class='btn btn-secondary'><i class='fa fa-trash'></i> Delete</button></a>
    </div></td></tr>";
}
echo "</tr>
  </tbody>
</table>";
}
else
{
    echo "<div class='alert alert-info'>NO COURSE HAS REGISTERED YET!</div>";
}
?>
</body>
</html>

<script>
	$(document).ready( function () {
    $('#student').DataTable();
} );
</script>


<?php

include("foot.php");
?>




