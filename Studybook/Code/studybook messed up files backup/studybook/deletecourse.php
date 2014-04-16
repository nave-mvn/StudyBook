<?php
require 'logincheck.inc.php';
require 'connect.inc.php';

//check courseid is set and not empty
if (isset($_GET['courseid']) && !empty($_GET['courseid']) ){
	
	//get coursenumber to be deleted and net id
	$coursenumber = $_GET['courseid'];
	$netid = $_SESSION['net_id'];

	//run Sql query to perform deletion
	$sql = "DELETE FROM student_in_course WHERE coursenumber='$coursenumber' AND netid='$netid' ";
	mysql_Query($sql) || die("Cannot Delete");
	header("Location:home.php");


	}
else{
	echo "not set";
	}

mysql_close($connection);
?>
