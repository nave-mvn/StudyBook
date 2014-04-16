<!--page to add a course to the student's profile-->
<?php
require 'logincheck.inc.php';
require 'connect.inc.php';

//check if fields are set
if (isset($_POST['course_number']) && isset($_POST['subject']) ){

	//check that course number is only made of integers and is not empty
	if (!is_numeric($_POST['course_number']) || empty($_POST['course_number'])){
		echo ("<h2>Please Enter A Valid Course Number</h2>");
		?>
		<form action="home.php" method="POST">
		<input type="submit" name="Back" value="Back">
		</form>
		<?php
		die();
	}
	else{
		$course_number = $_POST['course_number'];
		$subject = $_POST['subject'];
		$netid = $_SESSION['net_id'];
		$course = $subject.$course_number;
		
		//check to see if course has already been added to student's profile
		$cquery = "SELECT netid from student_in_course WHERE netid = '$netid' AND coursenumber = '$course'";
		if ($cquery_run = mysql_query($cquery)){
				
				$cquery_num_rows = mysql_num_rows($cquery_run);
				if ($cquery_num_rows!=0){
				
					echo'<h3>Course Already Exists</h3>';
					?><form action="home.php" method="post"> 
					<input type="submit" value="Back">
					</form>
					<?php
					die();
					}
		}
		//insert into student_in_course table
		$sql = "INSERT into student_in_course(coursenumber,netid) VALUES ('$course','$netid')";
		
		mysql_Query($sql) || die("Cannot INSERT");
		header("Location: home.php");
		
	}

}
else{
echo "not set";
}
?>
