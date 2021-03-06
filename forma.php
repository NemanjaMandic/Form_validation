<?php
 if(($_SERVER["REQUEST_METHOD"] == "POST") && (!empty($_POST['action']))):

  if (isset($_POST['myname'])){ $myname = $_POST['myname']; }
  if(isset($_POST['mypassword'])){ $mypassword = $_POST['mypassword']; }
  if(isset($_POST['mypasswordconf'])){ $mypasswordconf = $_POST['mypasswordconf']; }
  if(isset($_POST['mycomments'])){ 
   $mycomments = filter_var($_POST['mycomments'], FILTER_SANITIZE_STRING); }

 if($myname === '') :
  $err_myname = '<div class="error"> Sorry, name is required field</div>';
 endif;

 if(strlen($mypassword) <= 6):
   $err_mypassword = '<div class="error">Password must be at least 6 characters</div>';
 endif;

 if($mypassword !== $mypasswordconf):
   $err_mypasswordconf = '<div class="error">Passwords must match</div>';
 endif;

 if(!(preg_match('/[A-Za-z]+, [A-Za-z]+/', $myname))):
   $err_pattern = '<div class="error">Sorry, the name must be in the format: Last, First</div>';
 endif;

 endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Form Sample</title>
  <link rel="stylesheet" href="normalize.css" />
  <link rel="stylesheet" href="mystyle.css" />
  <script src="modernizr_forms.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<!--[if lt IE 8]>
  <style>
    legend {
      display: block;
      padding: 0;
      padding-top: 30px;
      font-weight: bold;
      font-size: 1.25em;
      color: #FFD98D;
      margin: 0 auto;
    }
  </style>
<![endif]-->


</head>
<body>
<form id="myform" name="theform" class="group" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <fieldset id="login" title="Login Info">
    <legend>Login Info</legend>
    <span id="mynamehint" class="hint"></span>
    <span id="formerror" class="error"></span>
    <ol>
      <li>
        <label for="myname">Name *</label>
        <input type="text" name="myname" id="myname" title="Please enter your name"autofocus placeholder="Last, First" value="<?php if(isset($myname)) { echo $myname; } ?>" />
        <?php if(isset($err_myname)) { echo $err_myname; } ?>
        <?php if(isset($err_pattern)) { echo $err_pattern; } ?>
      </li>
      <li>
        <label for="myemail">Email *</label>
        <input type="email" name="myemail" id="myemail" autocomplete="off" />
       
      </li>
      <li>
        <label for="mypassword">Password</label>
        <input type="password" name="mypassword" id="mypassword" />
        <?php if(isset($err_mypassword)) { echo $err_mypassword; } ?>
      </li>
       <li>
        <label for="mypasswordconf">Repeat Password</label>
        <input type="password" name="mypasswordconf" id="mypasswordconf" />
        <?php if(isset($err_mypasswordconf)) { echo $err_mypasswordconf } ?>
      </li>
    </ol>
  </fieldset>
  <fieldset id="other" class="hidden" title="Other Info">
    <legend>Other</legend>
    <ol>
      <li>
        <label for="myurl">Website *</label>
        <input type="url" name="myurl" id="myurl" />
      </li>
      <li>
        <label for="mytelephone">Telephone</label>
        <input type="tel" name="mytelephone" id="mytelephone" pattern="\d{3}[\-]\d{3}[\-]\d{4}
        " placeholder="xxx-xxx-xxxx" />
      </li>
      <li class="singleline">
        <input type="checkbox" id="subscribeitem" name="subscribe" CHECKED value="yes" />
        <label for="subscribeitem">Subscribe to our mailing list?</label>
      </li>
      <li>
        <label for="reference">How did you hear about us?</label>
        <select name="reference" id="reference">
          <option>Choose...</option>
          <option value="http://google.com">A friend</option>
          <option value="http://facebook.com">Facebook</option>
          <option value="http://twitter.com">Twitter</option>
        </select>
      </li>
    </ol>
  </fieldset>
  <fieldset id="comments"  class="hidden" title="Comments">
  <legend>Comments</legend>
    <ol>
      <li>
        <div class="grouphead">Request Type</div>
        <ol>
          <li>
            <input type="radio" name="requesttype" value="question" id="questionitem" />
            <label for="questionitem">Question</label>
          </li>
          <li>
            <input type="radio" name="requesttype" value="comment" id="commentitem" />
            <label for="commentitem">Comment</label>
          </li>
        </ol>
      </li>
      <li>
        <label for="mycomments">Comment(html not allowed)</label>
        <textarea name="mycomments" id="mycomments"></textarea>
      </li>
    </ol>
    <button type="submit" name="action" value="submit">send</button>
  </fieldset>
</form>
<!--
<script>
$(document).ready(function(){
  $("#myform").validate({
    "rules" : {
      "mypassword": {
        "minlength" : 6,
        "required" : true
      },
       "mypasswordconf": {
        "equalTo" : "#mypassword"
      }
    }
  });
});

</script>

-->
</body>
</html>