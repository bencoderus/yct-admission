<?php
ERROR_REPORTING(0);
include("head.php");
include("check.php");
$msg=$_GET['msg'];
if(!empty($msg))
{
    
echo "<div class='alert alert-info'><b>$msg</b></div>";
}
else
{
    echo "";
}
$user=$_SESSION['admin'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
    .maincontent
    {
    color: rgba(255, 255, 255, 0.8);
    background-color: #006600;
    padding-top: 30px;
    padding-left: 30px;
    padding-right: 30px;  
    padding-bottom: 30px;
    }

</style>
    <title>Dashboard | Yabatech</title>
   
</head>
<body>

<div id="loader"><br><br><br>
<center><P class="lead">PLEASE WAIT...</P><img src="../images/spin.gif" alt="loading"></center>
</div>
<div id="container">

<div class="row">   
<div class="col-lg-9"> <h3>ADMIN DASHBOARD</h3> </div>
<div class="col-lg-3"> <small>You are currently logged in as <b><?php echo($user); ?></b></small> </div>
    </div>
<hr>
<div class="row servicebox-wrapper">
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 servicebox maincontent">
                        
                            <div class="service-box-content">
                                <h3 class="text-white"><a href="addcourse">Add course</a></h3>
                                <p>Links provided will help you add a new course</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </div>
                        </div>
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 servicebox maincontent">
                        
                            <div class="service-box-content">
                                <h3 class="text-white"><a href="course">Manage courses</a></h3>
                                <p>Links provided will help you manage existing courses</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-gear" aria-hidden="true"></i>
                            </div>
                        </div>  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 servicebox maincontent">
                        
                            <div class="service-box-content">
                                <h3 class="text-white"><a href="student">Applicants</a></h3>
                                <p>Links provided will help you manage all the admission applicants</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </div>
                        </div>  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 servicebox maincontent">
                        
                            <div class="service-box-content">
                                <h3 class="text-white"><a href="admission">Admission</a></h3>
                                <p>Links provided will help you manage the admission list and qualified candidates</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-mortar-board" aria-hidden="true"></i>
                            </div>
                        </div>                        
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 servicebox maincontent">
                        
                            <div class="service-box-content">
                                <h3  class="text-white"><a href="admitted">Qualified aspirants</a></h3>
                                <p>Links provided will help you manage all the qualified candidates</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                        </div>
                        
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 servicebox maincontent">
                        
                            <div class="service-box-content">
                                <h3 class="text-white"><a href="help">Help</a>
                                </h3>
                                <p>Links provided will provide list a user manual for you </p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-feed" aria-hidden="true"></i>
                            </div>
                    </div></div>
                    
<br><br>

<div class="container-fluid">                    <h5>NEWEST APPLICANT</h5>
                    <hr>
                    <?php
$sql=mysqli_query($con, "SELECT * FROM student_db WHERE reglevel >= 7 ORDER BY sid DESC");
$row=mysqli_fetcH_array($sql);
$email=$row['email'];
$cid=$row['courseid'];
$name=getnames($email);
$passport=getphoto($user);
$checkj=mysqli_query($con, "SELECT * FROM jamb_db WHERE student='$email'");
$fetchj=mysqli_fetch_array($checkj);
$jambnum=$fetchj['regnum'];
$checkc=mysqli_query($con, "SELECT * FROM course_db WHERE id='$cid'");
$fetchc=mysqli_fetch_array($checkc);
$coursename=$fetchc['title'];
echo "
<div class='row'>
<div class='col-lg-1 col-sm-3 col-md-2'>
$passport
</div>
<div class='col-lg-11 col-sm-9 col-md-10'>

<b>$name</b> <br>$coursename<br>$jambnum
</div>
</div>
<hr>";
                    ?>
                    

                    <h5>LATEST QUALIFIED APPLICANT</h5>
                    <hr>
                    <?php
$sql=mysqli_query($con, "SELECT * FROM student_db WHERE reglevel >= 7 AND admitted=1 ORDER BY sid DESC");
$row=mysqli_fetcH_array($sql);
$email=$row['email'];
$cid=$row['courseid'];
$name=getnames($email);
$passport=getphoto($user);
$checkj=mysqli_query($con, "SELECT * FROM jamb_db WHERE student='$email'");
$fetchj=mysqli_fetch_array($checkj);
$jambnum=$fetchj['regnum'];
$checkc=mysqli_query($con, "SELECT * FROM course_db WHERE id='$cid'");
$fetchc=mysqli_fetch_array($checkc);
$coursename=$fetchc['title'];
echo "
<div class='row'>
<div class='col-lg-1 col-sm-3 col-md-2'>
$passport
</div>
<div class='col-lg-11 col-sm-9 col-md-10'>

<b>$name</b> <br>$coursename<br>$jambnum
</div>
</div>
<hr>";
                    ?>
                    
                    </div>
                    </div><br></div>    
</body>
</html>


<?php
include("foot.php");
?>

 <script>
$(document).ready(function()
{

$("#container").hide().delay(0);
setTimeout(loaded, 3000);
});
function loaded()
{
$("#loader").hide();
$("#container").show();
}
    </script>