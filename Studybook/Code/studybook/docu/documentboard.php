<!-- The main page for a document board -->
<!-- This will show the documents currently submitted for the course as well as show an option to submit new document -->
<!-- Clicking on a document causes a download -->


<?php
require 'logincheck2.inc.php';
require 'connect.inc.php';

//if submit button is pressed redirect to submit.php
if(isset($_POST['submit'])) {
	header('Location:submit.php');
	}

//create query from session variables
$courseid = $_SESSION['course_id'];
$netid = $_SESSION['net_id'];
$query = "SELECT id, title, description FROM documents WHERE coursenumber = '$courseid'";

?>

 <!-- Header-->
    <div id="header" style="background-color:#570909;height:75px">
        <h1 style="color:cornsilk">Course <?php echo $coursenumber = $_SESSION ['course_id']; ?> Document Board</h1>
            </div>
        <!-- sidebar-->
        <div id="sidebar" style="float:left;background-color:#570909">
			<a style="color:cornsilk"href="../home.php"><?php echo "<strong>Change Course</strong>" ?> </a> <br><br>
            <a style="color:cornsilk"href="../calendar/Agenda.php"><?php echo "<strong>Calender</strong>" ?> </a> <br><br>
            <a style="color:cornsilk" href="../Discussion/Forum.php"><?php echo "<strong>DiscussionBoard</strong>" ?> </a> <br><br>
            <a style="color:cornsilk" href="documentboard.php"><?php echo "<strong>DocumentBoard</strong>" ?> </a> <br><br>
            <a style="color:cornsilk" href="../adboard/adboard.php"><?php echo "<strong>AdBoard</strong>" ?> </a> <br><br>
        </div>
<?php

if($result = mysql_query($query)){ 
	//if query return no rows return message to user
	if(mysql_num_rows($result) == 0)
	{
		echo "<h1>No Documents have been uploaded for this course yet</h1>";
		}	 
	else{
		//for every row in result array, print out the title, description of the document
		while($arr = mysql_fetch_array($result)){
		
			?>
			<a href="download.php?id=<?php echo $arr[0];?>"><?php echo "Title: "; echo $arr[1]; ?> </a> <br>
			<a href="download.php?id=<?php echo $arr[0];?>"><?php echo "Description: "; echo $arr[2]; ?> </a> <br><br>
			<?php
			//check if the user is the owner of the document and if he is, show an option to delete
			$sql =  "SELECT id FROM documents WHERE owner = '$netid' AND id = '$arr[0]'";

			$re = mysql_query($sql); 
			if(mysql_num_rows($re) != 0){
			?>
			<a href="deletedoc.php?id=<?php echo $arr[0];?>">Delete</a>
			<?php
			}
			echo "<br> <br> <br>";
			}
		}
	}
else{
	echo("<h1>No Documents have been uploaded for this course yet</h1>");
	}
?>

<form action="documentboard.php" method="POST">
<input type="submit" name="submit" value="Submit Document" >
</form>



		
		
<br><br><br><br><br><br>	
<form action="../courses.php" method="POST">
<input type="submit" name="Back" value="Back">
</form>

<form action="../logout.php" method="POST">
<input type="submit" name="logout" value="Logout">
</form>