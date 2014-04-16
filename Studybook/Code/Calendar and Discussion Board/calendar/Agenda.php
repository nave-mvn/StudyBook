<?php
/*
 * requires and getting needed information from the session
 */

require 'logincheck2.inc.php';
require 'Calendar.php';

$coursenumber = $_SESSION ['course_id'];
$net_id = $_SESSION ['net_id'];
?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Agenda</title>
    </head>
    <body>
        <!-- Header-->
    <div id="header" style="background-color:#570909;height:75px">
        <h1 style="color:cornsilk">Course <?php echo $coursenumber = $_SESSION ['course_id']; ?> Calendar</h1>
            </div>
        <!-- sidebar-->
        <div id="sidebar" style="float:left;background-color:#570909">
		<a style="color:cornsilk"href="../home.php"><?php echo "<strong>Change Course</strong>" ?> </a> <br><br>
            <a style="color:cornsilk"href="Agenda.php"><?php echo "<strong>Calender</strong>" ?> </a> <br/><br/>
            <a style="color:cornsilk" href="../Discussion/Forum.php"><?php echo "<strong>DiscussionBoard</strong>" ?> </a><br/><br/>
            <a style="color:cornsilk" href="../docu/documentboard.php"><?php echo "<strong>DocumentBoard</strong>" ?> </a> <br/><br/>
            <a style="color:cornsilk" href="../adboard/adboard.php"><?php echo "<strong>AdBoard</strong>" ?> </a><br/><br/>
        </div>
        <?php
        $Calendar = new Calendar($coursenumber);
        $events = $Calendar->getEvents();
        //date is a test value
        if ($_REQUEST['month'] == "")
            $month = date("n");
        else
        {
            $month = $_REQUEST['month'];
        }
        $month_text = $Calendar->Month_to_text($month);
        print( "---" . $month_text . "---\n</br>");
        $events = $Calendar->getEventsMonth($month);
        $size = sizeof($events);
        if ($size >= 1)
        {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Day</th>";
            echo "<th>Name</th>";
            echo "<th>Desciption</th>";
            echo "</tr>";

            for ($i = 0; $i < $size; $i++)
            {
                echo "<tr>";
                echo "<td>";
                echo $events[$i]->getDay();
                echo "</td>";
                echo "<td>";
                echo $events[$i]->getName();
                echo "</td>";
                echo "<td>";
                echo $events[$i]->getDescription();
                echo "</td>";
                if ($events[$i]->getOwner() == $net_id)
                {
                    echo "<td>";
                    echo "<a href='../DeletePost.php?post=event&id=";
                    echo $events[$i]->getID();
                    echo "&month=" . $month;
                    echo "'>Delete event</a>";
                    echo "</td>";
                }
                echo "</tr> ";
            }
            echo "</table>";
        }
        else
            echo "There are no events for this month.";

        $prev_month = $month - 1;
        $next_month = $month + 1;

        if ($next_month == 13)
        {
            $next_month = 1;
        }
        if ($prev_month == 0)
        {
            $prev_month = 12;
        }
        ?>

        <table border="0">
            <tr>
                <td align="left">  <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=" . $prev_month; ?>" >Previous</a></td>
                <td align="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=" . $next_month; ?>" >Next</a>  </td>
            </tr>
        </table>
        <p><a href='EventForm.php?month=<?php echo $month ?>'> create an event</a><p>
		
		<br><br><br><br><br><br><br><br><br><br>
        <form action="../logout.php" method="POST">
            <input type="submit" name="logout" value="Logout">
        </form>
    </body>
</html>