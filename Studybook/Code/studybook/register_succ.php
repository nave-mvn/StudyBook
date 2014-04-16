<!-- Inform users that the registration was successful -->
<?php


require 'logincheck.inc.php';
session_destroy();

if(isset($_POST['LOGIN'])) {
header('Location:index.php');
}

?>
<h1>You have registered sucessfully</h1>
<br>
<br>
<form action="register_succ.php" method="POST">
<input type="submit" name="LOGIN" value="LOGIN" >
</form>