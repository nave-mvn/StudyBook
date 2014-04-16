<?php
//Rootpage for the site

require 'utilities.inc.php'; 
require 'connect.inc.php'; 
session_start();
$utilities = new utilities;

//Check if user is logged in, if not, display login form
if ($utilities->loggedin()){
				
				$firstname = $utilities->getfield('firstname');
				$surname = $utilities->getfield('lastname');

				echo "<h3>Logged in as $firstname $surname</h3> <br><br>"; 
				
				?>
				
				<form action="logout.php" method="POST">
				<input type="submit" name="logout" value="Logout">
				</form>

				
				<?php
				}

else{
	include 'loginform.inc.php';
	}


?>