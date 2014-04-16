-the starting point for Calendar is Agenda.php
-the starting point for Discussion is Forum.php
-DeletePost.php is just in the main folder I use this to delete topics, replies, and events

-for mine the logincheck.inc.php is just in the main project folder
but I have connect.inc.php in each each folder (I was having trouble with it in 	just the main folder)

I also tried to make it look a little nicer by adding a sidbar and a title bar to each of my pages. here is the html:

 <!-- Header-->
    <div id="header" style="background-color:#570909;height:75px">
        <h1 style="color:cornsilk">Course <?php echo $coursenumber = $_SESSION ['course_id']; ?> Calendar</h1>
            </div>
        <!-- sidebar-->
        <div id="sidebar" style="float:left;background-color:#570909">
            <a style="color:cornsilk"href="Agenda.php"><?php echo "<strong>Calender</strong>" ?> </a> <br><br>
            <a style="color:cornsilk" href="../Discussion/Forum.php"><?php echo "<strong>DiscussionBoard</strong>" ?> </a> <br><br>
            <a style="color:cornsilk" href="../documentboard.php"><?php echo "<strong>DocumentBoard</strong>" ?> </a> <br><br>
            <a style="color:cornsilk" href="../adboard.php"><?php echo "<strong>AdBoard</strong>" ?> </a> <br><br>
        </div>

just make sure you start the session before this also the links will need to be changed to match your file system