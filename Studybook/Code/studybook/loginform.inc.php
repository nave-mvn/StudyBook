<!--Login form to display to the user to login--> 
<?php
//Check if register buttom is clicked
if(isset($_POST['register'])) {
header('Location:register.php');
}

else{
//check if netid and password are filled
if (isset($_POST['netid']) && isset($_POST['password']) )
{
$netid = $_POST['netid'];
$password = $_POST['password'];

if (!empty($netid) && !empty($password))
	{
	$password = md5($password);
	//Run query to check if the netid/password pair exists
	$query = "SELECT netid from student WHERE netid = '$netid' AND password = '$password'";
	if ($query_run = mysql_query($query))
		{

			$query_num_rows = mysql_num_rows($query_run);
			if ($query_num_rows==0)
				{
				echo'<h3>Invalid netid/password combination</h3>';
				}
			else{
			//if netid/password pair exists,login user
			$net_id = mysql_result($query_run,0,'netid');
			session_Start();
			$_SESSION['net_id'] = $net_id;
			header('Location:home.php');
			}

		}
	}
	else 
	{
	echo '<h2>Enter netid and Password</h2>';
	}
}
}
?>

<form action = "index.php" method = "POST">
NetID: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name = "netid"> <br> PASSWORD: <input type="password" name = "password">
<input type = "submit" value =" Login">
</form>

<form action="index.php" method="POST">
<input type="submit" name="register" value="Register">
</form>