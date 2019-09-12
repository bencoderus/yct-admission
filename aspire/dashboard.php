<?php
ERROR_REPORTING(0);
include('../header.php');
include("check.php");
$user=$_SESSION['user'];
$names=ucwords(getnames($user));
$reglevel=getreglevel($user);
if($reglevel < 2)
{
     header("location: completereg");
}

$msg=cleaninput($_GET['msg']);
if(empty($msg))
{
echo "";
}
else
{   
echo "<div class='alert alert-info'><b>$msg</b></div>";
}
$errormsg=cleaninput($_GET['errormsg']);
if(empty($errormsg))
{
echo "";
}
else
{   
echo "<div class='alert alert-warning'><b>$errormsg</b></div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Yct Aspirant</title>
    <style>
    
.menuselect{
	background-color: #032c4b !important;
	color: #fff !important;
}
    </style>
</head>
<body>   
<div class="post">Welcome  <b><?php echo($names); ?></b> to your aspirant dashboard</div><br>
<!-- NAVIGATE -->
<div class="servicebox-wrapper">
<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 servicebox menuselect">
						
                            <div class="service-box-content">
                                <h3 class="text-white"><a href="addphoto">Upload Photo</a></h3>
                                <p>Links provided will assist you to add your passport</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-photo" aria-hidden="true"></i>
                            </div>
                        </div>
                        
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 servicebox menuselect">
						
                            <div class="service-box-content">
                                <h3  class="text-white"><a href="course">Select Course</a></h3>
                                <p>Links provided will assist you to select your preferred course</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </div>
                        </div>
                        
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 servicebox menuselect">
						
                            <div class="service-box-content">
                                <h3 class="text-white"><a href="addssce">Add Olevel Result</a>
                                </h3>
                                <p>Links provided will assist you to add your O'Level result</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                            </div>
                    </div></div>
                    
                    
                    </div>




<div class="servicebox-wrapper">
<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 servicebox menuselect">
						
                            <div class="service-box-content">
                                <h3 class="text-white"><a href="addjamb">Add JAMB result</a></h3>
                                <p>Links provided will assist you to add your JAMB result</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                            </div>
                        </div>
                        
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 servicebox menuselect">
						
                            <div class="service-box-content">
                                <h3  class="text-white"><a href="addresult">Check Result</a></h3>
                                <p>Links provided will assist you check your screening result</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </div>
                        </div>
                        
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 servicebox menuselect">
						
                            <div class="service-box-content">
                                <h3 class="text-white"><a href="status">Admission Status</a>
                                </h3>
                                <p>The final phase, check your admission status here</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            </div>
                    </div></div>
                    </div><br>
</body>
</html>
<?php
include('../footer.php');
?>