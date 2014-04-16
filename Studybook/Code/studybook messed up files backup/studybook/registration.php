<!--Registration form -->
<?php



require 'connect.inc.php';
require 'logincheck.inc.php';

//Initializing variables
$netid = '';
$password='';
$firstname='';
$lastname='';
$year = '';
	//check if all fields are set
	if (isset($_POST['password']) && isset($_POST['firstname'])  && isset($_POST['lastname']) && isset($_POST['passwordagain']) && isset($_POST['year'])  )
		{

		$netid = $_SESSION['net_id'];
		$password=$_POST['password'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$passwordagain = $_POST['passwordagain'];
		$year = $_POST['year'];
		
		
		
		//check if all fields are non empty
		if(!empty($netid) && !empty($password) && !empty($passwordagain) && !empty($lastname) && !empty($firstname) && !empty($year)){
		
		if(!is_numeric($year)){die("<h3>Insert only Integers for Year</h3>");}
		
		//ensure that the retyped password is correct
		if($password == $passwordagain){
		//check to see if netid already exists
		$query = "SELECT netid FROM student WHERE netid = '$netid'";
		if ($query_run = mysql_query($query)){
		//If netid already exsits echo an error message
		if (mysql_num_rows($query_run) == 1){
		echo '<h3>The netid </h3>'.$netid.'<h3> already exists</h3>';
		echo "<a href='index.php'>Try Again</a>";
		}
		
		else{
		//Insert new user data into database and redirect to registration success page
		$password = md5($password);
		$insert = "INSERT INTO student VALUES ('$netid','$password','$firstname', '$lastname','$year','1')";
		if($query_in = mysql_query($insert)){

		header('LOCATION:register_succ.php');
		}
		else{ echo '<h3>Error in registering</h3>';}
		}
		}
		else{echo '<h3>Query Fail</h3>';}
		}
		else{ echo '<h3>Password Mismatch</h3>'; }

		}

		else {echo '<h3>Enter All Fields for Registration</h3>';}
		}
	
	else{
	echo '<h3>Enter All Fields for Registration</h3>'; 
	}

mysql_close($connection);

?>
<form action="registration.php" method="POST">
PASSWORD:<br><input type="text" name="password" maxlength="9"><br><br>
PASSWORD AGAIN:<br><input type="text" name="passwordagain" maxlength="9" ><br><br>
FIRSTNAME:<br><input type="text" name="firstname"  value="<?php echo $firstname ?>" maxlength="20"><br><br>
LASTNAME:<br><input type="text" name="lastname" value="<?php echo $lastname ?>" maxlength="20"><br><br>
YEAR(1/2/3/4):<br><input type="text" name="year" maxlength="1"><br><br>
<input type="submit" value="Register">
</form>





