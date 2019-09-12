<?php
if(isset($_SESSION['user']))
{
}
else
{
	$info="You will need to login first!";
	header("location: login?infomsg=$info");
}
?>