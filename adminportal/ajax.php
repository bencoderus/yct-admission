<?php
require('../inc/init.php');
$user=$_REQUEST['user'];
$sql=mysqli_query($con, "SELECT * FROM admin WHERE username='$user'");
$count=mysqli_num_rows($sql);
if ($count > 0)
{
    echo "<span class='text-success'>
    Username is valid!
    </span>
    ";
}
else
{
    echo "<span class='text-danger'>Username doesnt exist!</span>";
}







?>