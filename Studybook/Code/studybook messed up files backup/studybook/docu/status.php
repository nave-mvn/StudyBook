<!-- will show the status of the file upload, whether succ or not and redirect the user to documentboard.php-->
<?php

require 'logincheck2.inc.php';
//session_destroy();

if(isset($_POST['Submit'])) {
header('Location:documentboard.php');
}

?>
<h1>You have Uploaded sucessfully</h1>
<br>
<br>
<form action="status.php" method="POST">
<input type="submit" name="Submit" value="View Post" >
</form>