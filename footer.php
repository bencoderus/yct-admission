<?php

/**
PROJECT:  ONENAIRA PROJECT
AUTHOR: BENART IDUWE
DATE: MAY 2018
VERSION: 1.0


**/

ERROR_REPORTING(0);
include('sidebar.php');
$date=date("Y", time());
?>
</div><footer class='footer'>
  <div class="row maincontent hdd">
<div class="col-md-4">
<p class="h6 text-center"> VISION</p>
<p  class="text-justify">
Yaba College Of Technology is envisioned as a dynamic centre of academic excellence in the liberal tradition of excellence for the production of top-rate, morally sound graduates of distinctions who will be globally competitive for outstanding impact on the Nigerian societal and global development.
</p>
</div>
<div class="col-md-4">
<p class="h6 text-center"> MISSION</p>
<p  class="text-justify">
The mission of Yaba College Of Technology is the provision of excellent facilities for the training of men and women in various academic, professional and vocational disciplines in an atmosphere that will enhance the simultaneous development of their spiritual, mental and physical faculties...
</p>
</div>
<div class="col-md-4">
<p class="h6 text-center"> CONTACT US</p>
<p  class="text-justify">
Yaba College Of Technology,
Yaba, Lagos State.<br>
Phone:(+234)8174048073 (+234)7086674567<br>
Email: support@yabatech.edu.ng<br>
Contact Time: Monday - Friday: 9:00 AM to 4:00 PM
</p>
</div>
  </div>
<?php
echo "
<br><p class='text-center'>
<a href='http://facebook.com/$sitefb' class='fa fa-facebook fa-social-light'></a>
<a href='http://twitter.com/$sitetwitter' class='fa fa-twitter fa-social-light'></a>
<a href='http://instagram.com/$siteig' class='fa fa-instagram fa-social-light'></a>
<a href='http://plus.google.com/+$sitegplus' class='fa fa-google fa-social-light'></a>
 <a href='tel:+$sitephone' class='fa fa-phone fa-social-light'></a>
 </p><p class='text-uppercase text-center'> &#169 $date $sitename ALL RIGHTS RESERVED<br>
	DEVELOPED BY <a href='../about' class='writeb'><b>THE TEAM</b></a></p><br></footer></body></html>";
?>