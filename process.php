<?php
 $myname = $_REQUEST['myname'];
 $mypassword = $_REQUEST['mypassword'];
 $mypasswordconf = $_REQUEST['mypasswordconf'];

 if($myname === '') :
 	echo "<div> Sorry, name is required field</div>";
 endif;
?>