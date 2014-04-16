<?php

require 'DiscussionBoard.php';
require_once 'logincheck2.inc.php';
if (isset($_SESSION ['course_id']))
        {
            $coursenumber = $_SESSION ['course_id'];
        }
        else
            echo "<h2 style='color:red'>COURSE NUMBER MISSING<h2>";
?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Create a new topic</title>
    </head>
    <body>
        <div id="header" style="background-color:#570909;height:75px">
        <h1 style="color:cornsilk">Course <?php echo $coursenumber = $_SESSION ['course_id']; ?> New Topic Form</h1>
            </div>
        <div style="float:left;background-color:#570909">
		<a style="color:cornsilk"href="../home.php"><?php echo "<strong>Change Course</strong>" ?> </a> <br><br>
             <a style="color:cornsilk"href="../calendar/Agenda.php"><?php echo "<strong>Calender</strong>" ?> </a> <br/><br/>
            <a style="color:cornsilk" href="Forum.php"><?php echo "<strong>DiscussionBoard</strong>" ?> </a> <br/><br/>
            <a style="color:cornsilk" href="../docu/documentboard.php"><?php echo "<strong>DocumentBoard</strong>" ?> </a> <br/><br/>
            <a style="color:cornsilk" href="../adboard/adboard.php"><?php echo "<strong>AdBoard</strong>" ?> </a> <br/><br/>
        </div>
        <?php
        if ($_REQUEST['error']== 'true')
        {
            echo "<h2 style='color:red'> Please fill out the entire form<h2>";
        }
        ?>

        <form action="Topic_to_db.php" method="GET">
            Title: <input type="text" name="title" /><br />
            Body: <br /><textarea name="body" rows="10" cols="50"></textarea>
            <br />
            <input type="submit" value="Submit"/>
            <input type="reset" />
        </form>
		
		<br><br><br><br><br><br><br><br><br><br><br><br>
        <form action="../logout.php" method="POST">
            <input type="submit" name="logout" value="Logout">
        </form>
    </body>
</html>
