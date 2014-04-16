<?php
/*
 * requires and getting needed information from the session
 */
require 'logincheck2.inc.php';
if (isset($_SESSION ['course_id']))
        {
            $coursenumber = $_SESSION ['course_id'];
        }
        else
            echo "<h2 style='color:red'>COURSE NUMBER MISSING<h2>";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Make an Event</title>
    </head>
    <body>
        <!-- Header and side bar -->
        <div id="header" style="background-color:#570909;height:75px">
            <h1 style="color:cornsilk">Course <?php echo $coursenumber = $_SESSION ['course_id']; ?> New Event Form</h1>
        </div>
        <div id="sidebar" style="float:left;background-color:#570909">
			<a style="color:cornsilk"href="../home.php"><?php echo "<strong>Change Course</strong>" ?> </a> <br><br>
            <a style="color:cornsilk"href="Agenda.php"><?php echo "<strong>Calender</strong>" ?> </a> <br/><br/>
            <a style="color:cornsilk" href="../Discussion/Forum.php"><?php echo "<strong>DiscussionBoard</strong>" ?> </a><br/><br/>
            <a style="color:cornsilk" href="../docu/documentboard.php"><?php echo "<strong>DocumentBoard</strong>" ?> </a> <br/><br/>
            <a style="color:cornsilk" href="../ad/adboard.php"><?php echo "<strong>AdBoard</strong>" ?> </a><br/><br/>
        </div>
        <?php
        /*
         * error message
         */
        if (isset($_REQUEST['error']))
        {
            echo "<h2 style='color:red'> Please enter a ";
            echo $_REQUEST['error'];
            echo ".<h2>";
        }

        $Months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "Novemeber", "December");
        ?>

        <form action="Eventtodb.php" method="GET">
            Event Name: <input type="text" name="name" /><br />
            Description: <textarea name="description" rows="3" cols="30"></textarea>
            <br />
            <select name="month">
                <option value="-1">-Month-</option>
                <?php
                $i = 1;
                foreach ($Months as $monthname)
                {
                    if ($i == $_REQUEST['month'])
                    {
                        echo "<option selected='selected' value='" . $i . "'>" . $monthname . "</option>";
                    }
                    else
                        echo "<option value='" . $i . "'>" . $monthname . "</option>";
                    $i++;
                }
                ?>
            </select>
            <select name="day">
                <option value="-1">-Day-</option>
                <?php
                for ($i = 1; $i <= 31; $i++)
                {
                    echo "<option value='";
                    echo $i;
                    echo "'>";
                    echo $i;
                    echo "</option>";
                }
                ?>
            </select>
            <br />
            <input type="hidden" name="year" value="<?php echo date("Y") ?>" />
            <input type="submit" value="Submit"/>
            <input type="reset" />
        </form>
		<br><br><br><br><br><br><br><br><br><br><br><br>
        <form action="../logout.php" method="POST">
            <input type="submit" name="logout" value="Logout">
        </form>
    </body>
</html>
