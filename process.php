<?php
 $myname = $_REQUEST['myname'];
 $mypassword = $_REQUEST['mypassword'];
 $mypasswordconf = $_REQUEST['mypasswordconf'];

 if($myname === '') :
 	echo "<div> Sorry, name is required field</div>";
 endif;

 if(strlen($mypassword) <= 6):
   echo "<div>Password must be at least 6 characters</div>";
 endif;

 if($mypassword !== $mypasswordconf):
   echo "<div>Passwords must match</div>";
 endif;

 if(!(preg_match('/[A-Za-z]+, [A-Za-z]+/', $myname))):
   echo "<div>Sorry, the name must be in the format: Last, First</div>";
 endif;
?>