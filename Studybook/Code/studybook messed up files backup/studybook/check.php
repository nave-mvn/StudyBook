<!-- page to verify the user's code sent to their email -->
<?php
//check if id and code field is set
if (isset($_POST['id']) && isset($_POST['code'])){
	$id = $_POST['id'];
	$code = $_POST['code'];
	//check if id and code field is not empty
	if (!empty($id) && !empty($code)){
		
		//modify id to create a new id to be hashed
		$id_to_be_hash = $id . 'm';
		//create hashed id
		$hashed = md5($id_to_be_hash);
		//if hashed id equals user typed in code,start session redirect to registration page
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