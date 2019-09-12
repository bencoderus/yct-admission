<?php
if(isset($_SESSION['admin']))
{

}
else
{
	$info="You will need to login first!";
	header("location: index?infomsg=$info");
}





?>