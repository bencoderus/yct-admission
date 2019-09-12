<?php
include('head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

<link rel='stylesheet' href='../css/jquery.dataTables.min.css'>

<script src='../js/jquery.dataTables.min.js'></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admitted candidates</title>
</head>
<body>
<h3>ALL ADMITTED CANDIDATES</h3><hr>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Admitted applicants</li>
  </ol>
</nav>

    <?php
$sql=mysqli_query($con, "SELECT * FROM student_db WHERE admitted=1");
$cc=0;
echo "<table id='admitted' class='table table-bordered'>
  <thead class='hdd'>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Full name</th>
      <th scope='col'>JAMB num</th>
  <th scope='col'>Course</th>
<th scope='col'>Action</th>

    </tr>
  </thead>
  <tbody>";
while($row=mysqli_fetch_assoc($sql))
{
    $cc++;
$email=$row['email'];
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
            <td></td>
        
</div>
<?php


}

echo "</tr>
  </tbody>
</table>";


?>
</body>
</html>

<script>
    $(document).ready( function () {
    $('#admitted').DataTable();
} );
</script>

<?php
include('foot.php');

?>