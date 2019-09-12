<?php
include('head.php');
include("check.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">
.noticemsg
{
		background: #ddd;
		color: black;
		padding: 30px;
		border: 1px solid #ddd;
		border-radius: 20px;
		text-shadow: 3px;
margin: 0px 5px 20px 5px;
	}
</style>



	<meta charset="UTF-8">
	<title>	Help desk</title>
</head>
<body>

<h3>HELP DESK</h3><hr><nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Help desk</li>
  </ol>
</nav><br>
<div class="row">
  <div class="col-lg-7">
<ul class="list-group">
  <li class="list-group-item h6 active">Frequently asked questions</li>
  <li class="list-group-item h6" id="add"> <a href="#"><i class="fa fa-info-circle"></i> How do i add a new course?</a></li>
  <li class="list-group-item h6" id="course"><a href="#"><i class="fa fa-info-circle"></i> How do i manage/modify courses ?</a></li>
  <li class="list-group-item h6" id="can"> <a href="#"><i class="fa fa-info-circle"></i> How do i manage applicants?</a></li>
  <li class="list-group-item h6" id="adm"> <a href="#"><i class="fa fa-info-circle"></i> How do i manage admitted candidates?</a></li> 
  
</ul>     
  </div>
  <div class="col-lg-5">

<div id="content">
<h6 id="msgtitle" class=""></h6>
<p id="msg" class="text-justify"></p>
</div>    
  </div>
</div>



</body>

</html>

<?php
include('foot.php');
?>
  <script>
$("document").ready(function()
{


$("#add").click(function()
  {

 var title=$(this).text();
 $("#msgtitle").text(title);  
 $("#content").addClass("noticemsg");
 $("#content").slideDown(3000);
$("#msg").load("content.php?help=1");
  });

$("#course").click(function()
  {
 var title=$(this).text();
 $("#msgtitle").text(title);  
 $("#content").addClass("noticemsg");
 $("#content").slideDown(3000);
$("#msg").load("content.php?help=2");
  });

$("#can").click(function()
  {
 var title=$(this).text();
 $("#msgtitle").text(title);  
 $("#content").addClass("noticemsg");
 $("#content").slideDown(3000);
$("#msg").load("content.php?help=3");
  });


$("#adm").click(function()
  {
 var title=$(this).text();
 $("#msgtitle").text(title);  
 $("#content").addClass("noticemsg");
 $("#content").slideDown(3000);
$("#msg").load("content.php?help=4");
  });
});

</script>
