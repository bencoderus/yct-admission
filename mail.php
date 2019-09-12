<?php
/**
PROJECT:  THE COMMUNITY PROJECT
AUTHOR: BENART IDUWE
DATE: MAY 2018
VERSION: 1.0
**/
$nav5="active";
include('head.php');
echo "<title>Mail us</title><div class='mycontainer'>";
if(isset($_POST['message']))
{
$to="bencoderus@gmail.com";
$subject=$_POST['subject'];
$email=$_POST['email'];
$message=$_POST['message'];
$msg="$message <br><br> $email";
$send=mail($to, $subject, $msg);
if($send)
{
echo "<div class='alert alert-success'><b>
Mail was successfully sent !
</b></div>";
}
else
{
echo "<br><div class='alert alert-warning'><b>
Mail can not be sent now!
</b></div>";
}
}
?>
<div class="row">
<div class="col-lg-7">
<br><h5>CONTACT US</h5>
<form action='' method='POST'>
		<br>
		<label for='subject'>Your email:</label>		
		<br>
<input type='email' class='form-control' name='email' placeholder='Your email' required>
<br>
			<label for='subject'>Subject:</label>		
			<br>
	<input type='text' class='form-control' name='subject' placeholder='Subject' required>
		<br>
		<label for='message'>Message:</label>
		
		<br>
	<textarea class='form-control' name='message' placeholder='Type message' rows='5' required></textarea>
        <br>
        <center>
		<button type ='submit' class='btn btn-success' name='submit'><b> <i class='fa fa-send'></i> Send message</b></button>
</center>		</form><br></div>
<div class="col-lg-5">
</div>
</div></div>
<?php
include('foot.php');
?>