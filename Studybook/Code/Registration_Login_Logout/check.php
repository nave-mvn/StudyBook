<?php

if (isset($_POST['id']) && isset($_POST['id'])){
	$id = $_POST['id'];
	$code = $_POST['code'];
	if (!empty($id) && !empty($code)){
		$id_to_be_hash = $id . 'm';
		$hashed = md5($id_to_be_hash);
		if ($hashed == $code){
		session_start();
		$_SESSION['net_id'] = $id;
		header('Location:registration.php');
		}
		else{
		echo '<h3>Wrong code!</h3>';
		}
	}

}





?>

<h1>Type your NetID and code from email into textbox below</h1>
<form action= "check.php" method="POST">
NetID:<input type = "text" name="id">
Code :<input type = "text" name="code">
<input type= "submit" value ="Register">
</form>