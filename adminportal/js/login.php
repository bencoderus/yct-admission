<?php
require('../../inc/init.php');
$user=$_REQUEST['user'];
$sql=mysqli_query($con, "SELECT * FROM users WHERE username='$user'");
$count=mysqli_num_rows($sql);
if ($count > 0)
{
    echo "Invalid username!";
}
else
{
    echo "Username is valid";
}







?>