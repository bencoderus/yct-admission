<?php
include('head.php');
if(isset($_POST['submit']))
{
    $title=$_POST['cname'];
    $date=time();
    $des=$_POST['cdes'];
    $cutoff=$_POST['ccutoff'];
    $cap=$_POST['ccap'];
    $ssce=$_POST['ssce'];
    $counts=count($ssce);
    $jamb=$_POST['jamb'];
    $countj=count($jamb);

    //imploding

    
$imssce=implode(",", $ssce);
$imjamb=implode(",", $jamb);
if($countj > 4)
{
    echo"<br> <div class='alert alert-warning'><b>Select only 4  subjects for jamb!</b></div>";
}
elseif($counts > 5)
{
    echo"<br> <div class='alert alert-warning'><b>Select only 5  subjects for ssce!</b></div>";
}
else
{
    $send=mysqli_query($con, "INSERT INTO course_db(title, description, capacity, cutoff, date, ssce_combo, jamb_combo) VALUES('$title', '$des', '$cap', '$cutoff', '$date', '$imssce', '$imjamb')");
    if($send)
    {
        echo"<br> <div class='alert alert-success'><b>Course was successfully added</b></div>";
    }
    else
    {
        echo"<br> <div class='alert alert-warning'><b>An unknown error occured!</b></div>";
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
    <title>Add Course | Admin dashboard</title>
</head>
<body>
<h3>ADD COURSE</h3><hr>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add course</li>
  </ol>
</nav>
<br>
<form method="POST" action="">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label>Course name</label>
                <input type="text" class="form-control" name="cname" minlength="10" id="" required>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label>Course Cut-off</label>
                <input type="number" max=100 class="form-control" name="ccutoff" id="" required>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label>Course Capacity</label>
                <input type="number" max=250 class="form-control" name="ccap" id="" required>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
                <label>Course Description</label>
                <textarea class="form-control" name="cdes" id="" minlength="10" required></textarea>
            </div>
        </div>
        
        <div class="col-lg-12 form-group">
        <label>O'Level Subject Combo: <small>(Select only 5 subjects)</small></label>
        <br>
        <div class="form-check form-check-inline">
<input type="checkbox" name="ssce[]" class="form-check-input" value="Mathematics">Mathematics
</div>

<div class="form-check form-check-inline">
<input type="checkbox" name="ssce[]" class="form-check-input" value="English"> English
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="ssce[]" class="form-check-input" value="Biology"> Biology
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="ssce[]" class="form-check-input" value="Physics"> Physics
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="ssce[]" class="form-check-input" value="Chemistry" >Chemistry
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="ssce[]" class="form-check-input" value="Government" >Government
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="ssce[]" class="form-check-input" value="Literature"> Literature
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="ssce[]" class="form-check-input" value="Commerce"> Commerce
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="ssce[]" class="form-check-input" value="Crs"> CRS
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="ssce[]" class="form-check-input" value="Agriculture"> Agricultural science
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="ssce[]" class="form-check-input" value="Accounting"> Accounting
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="ssce[]" class="form-check-input" value="Geography"> Geography
        </div>

<div class="form-check form-check-inline">
<input type="checkbox" name="ssce[]" class="form-check-input" value="Economics"> Economics
        </div>
<div class="form-check form-check-inline">
<input type="checkbox" name="ssce[]" class="form-check-input" value="FMathematics"> Further Mathematics
        </div>
        </div>
        <div class="col-lg-12"><div class="form-group">
        <label>Jamb Subject Combo: <small>(Select only 4 subjects)</small></label>
        <br>
        <div class="form-check form-check-inline">
<input type="checkbox" name="jamb[]" class="form-check-input" value="Mathematics">Mathematics
</div>

<div class="form-check form-check-inline">
<input type="checkbox" name="jamb[]" class="form-check-input" value="English"> English
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="jamb[]" class="form-check-input" value="Biology"> Biology
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="jamb[]" class="form-check-input" value="Physics"> Physics
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="jamb[]" class="form-check-input" value="Chemistry" >Chemistry
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="jamb[]" class="form-check-input" value="Government" >Government
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="jamb[]" class="form-check-input" value="Literature"> Literature
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="jamb[]" class="form-check-input" value="Commerce"> Commerce
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="jamb[]" class="form-check-input" value="Crs"> CRS
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="jamb[]" class="form-check-input" value="Accounting"> Accounting
</div>

<div class="form-check form-check-inline">
<input type="checkbox" name="jamb[]" class="form-check-input" value="Geography"> Geography
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="jamb[]" class="form-check-input" value="Agriculture"> Agricultural science
</div>

<div class="form-check form-check-inline">
<input type="checkbox" name="jamb[]" class="form-check-input" value="Economics"> Economics
</div>   </div></div>
        <div class="col-lg-12">
           
            <center> <button class="btn btn-success" style="border-radius: 0px!important;" name="submit" type="submit"><i class="fa fa-plus"></i> Add new course</button><br><br></center>
        </div>
    </div>










</body>
</html>

<?php
include('foot.php');
?>