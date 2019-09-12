<?php
$nav3="active";
include('../head.php');
if(isset($_SESSION['user']))
{
    header("location: dashboard");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aspirant Home | Yaba college of technology</title>

    <style type="text/css">

.maincontent
{
color: rgba(255, 255, 255, 0.8);
background-color: #032c4b;

}
}

</style>

</head>
<body>

  
    <div class="carousel-item active">
      <img class="d-block w-100" src="../img/bg2.jpg" alt="First slide">

        <div class="carousel-caption d-none d-sm-block">
    <h4>WELCOME TO YABA COLLEGE OF TECHNOLOGY ASPIRANT DASHBOARD </h4>
    <p><a href="apply"><button class="btn btn-warning btn-lg"><i class="fa fa-user-plus"></i> APPLY FOR ADMISSION</button>
    </a>
    
    </p>

    <p>
    <a href="login">
    <button class="btn btn-success btn-lg"><i class="fa fa-user"></i> CONTINUE REGISTRATION</button></a></p>
  </div>
    </div>


<br>

<div class="mycontainer">
<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 servicebox maincontent">
						
                            <div class="service-box-content">
                                <h3 class="text-white"><a href="apply">Fresh Registration</a></h3>
                                <p>Links provided will help you commence your admission process</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </div>
                        </div>
                        
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 servicebox maincontent">
						
                            <div class="service-box-content">
                                <h3  class="text-white"><a href="login">Continue Registration</a></h3>
                                <p>Already commenced registered continue your admission process</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                        </div>
                        
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 servicebox maincontent">
						
                            <div class="service-box-content">
                                <h3 class="text-white"><a href="../contact">Returning Student</a>
                                </h3>
                                <p>Already a student, access your student dashboard.</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </div>
                    </div></div>
                    
                    
                    </div><br>

</body>
</html>


<?php
include('../foot.php');





?>