<?php
if(isset($_GET['help']))
{
$help=$_GET['help'];
if($help==1)
{
	echo "<p>You can now add course by visiting the admin portal dashboard then click add course fill the required fields and ensure the subject combination selected is appropriate then save. <a href=addcourse><b>Click here add course</b></a> </p>";
}	
if($help==2)
{
	echo "<p>You can now manage courses by visiting the admin portal dashboard then click manage course, you can modify course details and also remove a particular course. <a href=course><b>Click here manage course</b></a> </p>";
}



if($help==3)
{
	echo "<p>You can now manage applicants by visiting the admin portal dashboard then click applicants, you can view applicants details and make correction to candidate credentials also. <a href=student><b>Click here manage applicants</b></a> </p>";
}	

if($help==4)
{
	echo "<p>You can now manage admitted candidates and admission list by visiting the admin portal dashboard then click manage admission, You can preview list of admitted candidates based on their course of study <a href=admission><b>Click here admitted candidates</b></a> </p>";
}		
}



?>