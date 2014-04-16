<!--Home page which is displayed once user logins--> 
<h1>WELCOME</h1>


<?php
require 'connect.inc.php';
require 'utilities.inc.php';
require 'logincheck.inc.php';

//get netid from session
$netid = $_SESSION['net_id'];

//run query to select all courses registered in by the student
$query = "SELECT coursenumber, netid FROM student_in_course WHERE netid='$netid'";
$result = mysql_query($query) or die('Error, query failed');

//if zero rows returned return message
if(mysql_num_rows($result) == 0){
	echo "<h1>You have not added any courses</h1><br>";
	}
//for every row in the array, print out the link to the course page and a delete link	
else{
	while($arr = mysql_fetch_array($result)){
		?>
		<a href="courses.php?courseid=<?php echo $arr[0];?>"><?php echo "$arr[0]"  ?> </a> <br><br>
		<a href="deletecourse.php?courseid=<?php echo $arr[0];?>"><?php echo "Remove Course"  ?> </a> <br>
		<?php
		echo "<br> <br><br>";
		}
	}
echo "<h3>Add Course</h3>";
?>

<form action="addcourse.php" method="POST">
Subject
<select name="subject">
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="MA">MA</option>
  <option value="EN">EN</option>
  <option value="CH">CH</option>
  <option value="PH">PH</option>
</select>
&nbsp;  Course Number: <input type="text" name="course_number" size = "4" maxlength = "4" /> 
 Section: <input type="text" name="section" size = "1" maxlength = "2" /> 
<input type="submit" value="Add">
</form>

<br><br><br>






<form action="logout.php" method="POST">
<input type="submit" name="logout" value="Logout">
</form>


