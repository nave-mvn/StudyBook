<?php
require 'logincheck.inc.php';
require 'utilities.inc.php';

//set course id in session
if (isset($_GET['courseid'])){
$courseid = $_GET['courseid']; 
//echo "<h1>$courseid</h1>";
$_SESSION['course_id'] = $courseid;
}
?>
<!-- create links to respective boards -->
<!-- Header-->
    <div id="header" style="background-color:#570909;height:75px">
        <h1 style="color:cornsilk">Course <?php echo $coursenumber = $_SESSION ['course_id']; ?> Home</h1>
            </div>
        <!-- sidebar-->
        <div id="sidebar" style="float:left;background-color:#570909">
		<a style="color:cornsilk"href="home.php"><?php echo "<strong>Change Course</strong>" ?> </a> <br><br>
            <a style="color:cornsilk"href="calendar/Agenda.php"><?php echo "<strong>Calender</strong>" ?> </a> <br><br>
            <a style="color:cornsilk" href="Discussion/Forum.php"><?php echo "<strong>DiscussionBoard</strong>" ?> </a> <br><br>
            <a style="color:cornsilk" href="docu/documentboard.php"><?php echo "<strong>DocumentBoard</strong>" ?> </a> <br><br>
            <a style="color:cornsilk" href="adboard/adboard.php"><?php echo "<strong>AdBoard</strong>" ?> </a> <br><br>
        </div>



<br><br><br><br><br><br><br><br><br><br><br><br>
<form action="home.php" method="POST">
<input type="submit" name="Back" value="Back">
</form>

<form action="logout.php" method="POST">
<input type="submit" name="logout" value="Logout">
</form>