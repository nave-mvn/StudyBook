<!--Sends an email to the specified address to validify the user is an enrolled student -->
<?php

require 'utilities.inc.php';
//check if form is filled
if (isset($_POST['id'])){
	$id = $_POST['id'];
	if (!empty($id)){
		//add 'm' to end of net_id and hash it using md5 function
		$id_to_be_hash = $id . 'm';
		$hashed = md5($id_to_be_hash);
		$utilities = new utilities;
		//send email with hashed code and instructions
		$utilities->send_mail($id,$hashed);
		echo "<h2>Email Sent To $id@msstate.edu </h2> ";
	}

}
	


?>
<h1>Input your NetID to send a confirmation email to your Msstate mail</h1>
<form action= "register.php" method="POST">
NetID:<input type = "text" name="id" maxlength = "6">
<input type= "submit" value ="Send">
</form>