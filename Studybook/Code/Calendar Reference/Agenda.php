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

        <?php
        require 'Calendar.php';
        //course number is a test value
        $coursenumber = $_REQUEST['coursenumber'];
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
                <td align="left">  <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=" . $prev_month."&coursenumber=".$coursenumber; ?>" >Previous</a></td>
                <td align="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=" . $next_month ."&coursenumber=".$coursenumber; ?>" >Next</a>  </td>
            </tr>
        </table>
        <p><a href='EventForm.php?month="<?php echo $month ?>"&coursenumber="<?php echo $coursenumber ?>"'> create an event</a><p>
    </body>
</html>
