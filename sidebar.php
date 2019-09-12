<?php

/**
PROJECT:  ONENAIRA PROJECT
AUTHOR: BENART IDUWE
DATE: MAY 2018
VERSION: 1.0


**/
echo '</div>';
$user=$_SESSION['user'];
$passport=getphoto($user);
$adstatus=adstatus($user);
$names=getnames($user);
$date=date("d F Y h:i A", time());
?>

<aside class='d-none d-sm-none d-md-none d-lg-block col-lg-3'>
<br>
<?PHP 
if(!isset($_SESSION['user']))
{
echo "";
}
else
{
echo "<div class='text-center'>
$passport
<br><br>
<p class='h5 text-uppercase'>$names</p>
$adstatus
<br><p class='writeb text-uppercase'>$date</p>
<a href='../logout.php'><p class='writeb'>(SIGN OUT)</p></a>
<br><br>
</div>



";
}

?>
</aside>
</div>
</div>

