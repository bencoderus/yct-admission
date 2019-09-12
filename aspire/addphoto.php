<?php
include('../header.php');
include("check.php");
$user=$_SESSION["user"]; 
$reglevel=getreglevel($user);
$names=ucwords(getnames($user));
if($reglevel >= 3)
{
    $msg="You have already added a photo!";
    header("location: dashboard?errormsg=$msg");
}
elseif($reglevel < 2)
{    $msg="Complete registration first!";
    header("location: dashboard?errormsg=$msg"); 
}
if(isset($_POST["submit"]))
{   
$folder="../avatars/";
$allowed_types=array('.jpg','.gif','.png','.bmp');
$filename=$_FILES["avatar"]["name"];
$ext=substr($filename, strpos($filename, '.'), strlen($filename)-1);

if(!isset($_FILES["avatar"]) || $_FILES["avatar"]["size"]==0)
{
echo"<div class='alert alert-warning'>No file was selected</div>";
}
elseif(!in_array($ext, $allowed_types))
{
echo"<div class='alert alert-warning'>$ext is not an allowed type</div>";
} elseif(!file_exists($folder)) { echo"<div class='alert alert-warning'>folder don't exist</div>";
} elseif(!is_writable($folder)) {
echo"<div class='alert alert-warning'>folder not writable</div>";
}
else
{
if(move_uploaded_file($_FILES["avatar"]["tmp_name"], $folder.$filename))
{
$send=mysqli_query($con, "UPDATE student_db SET img='$filename' WHERE email='$user'");

if($send)
{
    mysqli_query($con, "UPDATE student_db SET reglevel=3 WHERE email='$user'"); 
    $msg="Photo was successfully added";
    header("location: dashboard?msg=$msg");
}
else
{

    echo"<div class='alert alert-warning'>Upload Failed!</div>";
}
}
else
{
echo"<div class='alert alert-warning'>Upload Failed!</div>";
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
    <title>Upload Passport</title>
</head>
<body>
<div class="post">Hello <b><?php echo($names); ?></b>, please upload your personal photo only. it will be used as a means of identification for you.</div><br>
<div class="form-group">
<form action='#' method='POST' enctype='multipart/form-data'><center><input type='file' name='avatar' class='form-control-file'></center><br/><center>
<button type='submit' class='btn btn-success btn-block' name='submit'><i class="fa fa-plus"></i> Add photo</center>
</div>
</body>
</html>
<?php
include('../footer.php');
?>