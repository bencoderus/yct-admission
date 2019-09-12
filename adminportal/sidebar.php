<?php$user=$_SESSION['admin'];
$date=date("d F Y h:i A", time());?>

<aside class='col-lg-3'>
<ul class="list-group">
  <li class="list-group-item h6 hdd">Admin menu</li>
  <li class="list-group-item h6"> <a href="addcourse.php"><i class="fa fa-plus"></i> Add a new course</a></li>
  <li class="list-group-item h6"><a href="course.php"><i class="fa fa-book"></i>  Manage courses</a></li>
  <li class="list-group-item h6"> <a href="student.php"><i class="fa fa-users"></i> Manage candidates</a></li>
  <li class="list-group-item h6"><a href="admitted.php"><i class="fa fa-users"></i> Manage admitted candidates</a></li>
  <li class="list-group-item h6"> <a href="admission.php"><i class="fa fa-users"></i> Manage admission list</a></li> 
  <li class="list-group-item h6"> <a href="logout.php"><i class="fa fa-sign-out"></i> Sign out</a></li>
</ul><br>  
</aside>