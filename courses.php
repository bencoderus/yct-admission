<?php
$nav5="active";
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses | Yabatech</title>
<link rel='stylesheet' href='../css/jquery.dataTables.min.css'>
<script src='../js/jquery.dataTables.min.js'></script>
</head>
<body>
    <h5>COURSES IN YABATECH</h5>
<br>
        <?php
$sql="SELECT * FROM course_db";
$check=mysqli_query($con, $sql);
$count=mysqli_num_rows($check);
if($count > 0)
{
	echo "
 <table id='student' class='table table-bordered'>
  <thead class='hdd'>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Title</th>
      <th scope='col'>Description</th>
 <th scope='col'>Date Added</th>

    </tr>
  </thead>
  <tbody>
    <tr>";
while($fetch=mysqli_fetch_assoc($check))
{
$title=$fetch['title'];
$des=$fetch['description'];
$id=$fetch['id'];
$date=ago($fetch['date']);

echo "
      <th scope='row'>$id</th>
      <td>$title</td>
      <td>$des</td><td>$date</td></tr>";
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
<?php
include('footer.php')
?>