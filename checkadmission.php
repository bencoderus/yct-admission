<?php
include('header.php');
if(isset($_POST['submit']))
{
    $jamb=cleaninput($_POST['jambnum']);
    $sql=mysqli_query($con, "SELECT * FROM jamb_db WHERE regnum='$jamb'");
$count=mysqli_num_rows($sql);
if ($count > 0)
{
    $sql=mysqli_query($con, "SELECT * FROM jamb_db WHERE regnum='$jamb'");
    $fetch=mysqli_fetch_array($sql);
    $user=$fetch['student'];
    $sqli=mysqli_query($con, "SELECT * FROM student_db WHERE email='$user'");
    $row=mysqli_fetch_array($sqli);
    $admitted=$row['admitted'];
    $check=mysqli_query($con, "SELECT * FROM student_db WHERE email='$user'");
$fetch=mysqli_fetch_array($check);
$surname=$fetch['surname'];
$name=$fetch['othername'];
$dob=age($fetch['dob']);
$address=$fetch['address'];
$programme=strtoupper($fetch['programme']);
$courseid=$fetch['courseid'];
//GET COURSE
$checkcourse=mysqli_query($con, "SELECT * FROM course_db WHERE id='$courseid'");
$fetchcourse=mysqli_fetch_array($checkcourse);
$coursename=$fetchcourse['title'];
//GET SESSION
$checks=mysqli_query($con, "SELECT * FROM jamb_db WHERE student='$user'");
$row=mysqli_fetch_array($checks);
$session=$row['examyear'];
echo "<title>My admission status</title>";
    if($admitted == 1)
    {
        echo "<script> alert('You have been admitted!'); 
        </script>
        <p>Dear <b>" .$surname .", </b> You have been <b>offered admission</b> provisional admission into a Two years ND " .$programme ." Programme to study <b>" .$coursename ."</b> for the " .$session  ." Academic Session. <br> Please proceed to make payment for your acceptance fee within the 3weeks deadline<br>
        Kindly note that if at any time it is discovered that you provided false information or forged document, this provisional admission will be withdrawn and you will be expelled from the college.
        <br>
        <br>
        <b>You are required to bring along with you the following</b><br>
        i. Letter Of admisssion<br>
        ii. Original copies of your credentials<br>
        iii. Two reference letters<br>
        iv. Acceptance letter <br>
        v. Birth certificate <br>
        vi. Testimonial<br>
        vii. Photocard of guardian/parent<br>
        <br><br>
        Failure to produce this documents will nullify the offer of admission.<br><br>
        
        <b>Congratulation.</b>
        
        <p class='text-center writeb'>B.I IDUWE<br>REGISTRAR<br></p>
        
        </p>
        
        ";
    }
    elseif($admitted == 2)
    {
        echo "
        <script>alert('You have not been offered admission yet!');</script>
        Dear <b>" .$surname .", </b> You are <b>not qualified for admission!<b>";
    }
    else
    {
        echo "
        <script>alert('You have not completed your screening yet!');</script>
        Dear <b>" .$surname .", </b> You have <b>not completed</b> your screening! yet. Please complete the screening process before verifying your admission status!";
    }
}
else
{
echo "Student not found!";
}
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check My Admission Status | Yaba college of technology</title>

</head>
<body>
<div id="content">
<form action="" method="POST">
    <label>Enter your JAMB registration number: </label>
    <div class="row"><div class="col-sm-8"><input type="text" name="jambnum" id="" class="form-control" maxlength="10" minlength="10" required><br>
    </div>
    <div class="col-sm-4">
    <button class="btn btn-success" type="submit" name="submit">Check my admission</button></div></div><br><br></div>
</body>
</html>
<?php
}
include('footer.php');

?>