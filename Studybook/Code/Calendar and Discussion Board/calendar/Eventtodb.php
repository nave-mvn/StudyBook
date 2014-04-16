<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Event to the database</title>
    </head>
    <body>
        <h1>Sending the event to the database...</h1>
        <?php
        require 'connect.inc.php';
        require 'logincheck2.inc.php';
        /*
         * checks to see if the user entered a name
         * if not they are sent back to the event creator with an error
         */
        if (empty($_REQUEST['name']) || ctype_space($_REQUEST['name']))
        {
          header('Location:EventForm.php?error=name');  
        }
        else
        {
            /*
             * checks to see if the user selected a day and/or month
             * if not they are sent back to the event creator with an error
             */
            if ($_REQUEST['month'] < 1 || $_REQUEST['day'] < 1)
            {
                header('Location:EventForm.php?error=valid date');
            }
            /*
             * date check months with 30 days
             */
            else if (($_REQUEST['month'] == 4 || $_REQUEST['month'] == 6
                    || $_REQUEST['month'] == 9 || $_REQUEST['month'] == 11)
                    && $_REQUEST['day'] > 30)
            {
                header('Location:EventForm.php?error=valid date');
            }
            /*
             * date check februrary and leap year
             */
            else if ($_REQUEST['month'] == 2)
            {
                if ((date("L") == 0 && $_REQUEST['day'] > 28)
                        || (date("L") == 1 && $_REQUEST['day'] > 29))
                {
                    header('Location:EventForm.php?error=valid date');
                }
            }
            else
            {

                $name = $_REQUEST['name'];
                $month = $_REQUEST['month'];
                $day = $_REQUEST['day'];

                if (isset($_SESSION['net_id']))
                    $owner = $_SESSION['net_id'];
                else
                    echo "Missing net_id!";
                if (isset($_SESSION ['course_id']))
                    $coursenumber = $_SESSION ['course_id'];
                else
                    echo "Missing course number!";
                /*
                 * if no description default is ""
                 */
                if (empty($_REQUEST['description']))
                {
                    $description = "";
                }
                else
                    $description = $_REQUEST['description'];
                $year = $_REQUEST['year'];
                /*
                 * Inserting the given information into the event table
                 */
                $insert = "INSERT INTO `event`  VALUES (NULL, '$coursenumber', '$owner', '$day', '$month', '$year', '$name', '$description')";
                $query_in = mysql_query($insert);
                if ($query_in)
                {
                    header('Location:Agenda.php?month=' . $month);
                    echo '<h3>Query Success</h3>';
                }
                else
                {
                    echo '<h3>Query Fail</h3>';
                }
            }
        }
        ?>
    </body>
</html>
