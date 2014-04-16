<!-- PS this is the form.... -->

<?php
require '../logincheck.inc.php';
require '../connect.inc.php';

?>

<form action = "adboadform.php" method = "POST">
<strong> Create New Ad </strong>

	<h3> AD TITLE </h3>
	<input name = "title" type = "text" size = "40" />
	<h3> Item Type </h3>
	<input name = "type" type = "text" size = "30" />
	<h3> Item Price </h3>
	<input name = "price" type = "text" size = "10" />
	<h3> Item Description </h3>
	<textarea name = "description" cols = "40" rows = "3" type = "text"> </textarea>
	<h3> Contact Info </h3>
	<input name = "contact" type = "text" size = "30" />

	<input type = "submit" name = "back" value = "back">
	</form>

	<form action = "../logout.php" method="POST">
	<input type = "submit" name = "logout" value = "Logout">
	</form>

</form>



