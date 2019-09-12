<?php
require('../../inc/init.php');
//email validate
if(isset($_REQUEST['email']))
{
$email=$_REQUEST['email'];
$sql=mysqli_query($con, "SELECT * FROM student_db WHERE email='$email'");
$ecount=mysqli_num_rows($sql);
if ($ecount >= 1)
{
    
    echo "error";
}
else
{
    echo "success";
}
}
//mobile no validate

if(isset($_REQUEST['mobile']))
{
$mobile=$_REQUEST['mobile'];
$psql=mysqli_query($con, "SELECT * FROM student_db WHERE mobile='$mobile'");
$pcount=mysqli_num_rows($psql);
if ($pcount > 0)
{
    echo "e1";
}

elseif(!is_numeric($mobile))
{
    echo "e3";
}
elseif(strlen($mobile) < 11)
{
    echo "e2";
}

else
{
    echo "success";
}


}



?>