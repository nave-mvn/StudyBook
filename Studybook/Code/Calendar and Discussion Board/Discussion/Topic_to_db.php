<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Topic to the database</title>
    </head>
    <body>
        <h1>Sending the topic to the database...</h1>
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');
        require_once 'connect.inc.php';
        //require_once 'Topic.php';
        require_once 'logincheck2.inc.php';
        /*
         * checks to see if the user entered a title and body
         * also checks to see if they just put spaces
         * if not they are sent back to the event creator with an error
         */
        if (empty($_REQUEST['title']) || ctype_space($_REQUEST['title'])
                || empty($_REQUEST['body']) || ctype_space($_REQUEST['title']))
        {

            header('Location:TopicForm.php?error=true');
        }
        else
        {
            echo "the else";
            //echo $_SESSION ['course_id'];
            echo $title = $_REQUEST['title'];
            echo $body = $_REQUEST['body'];
            echo $owner = $_SESSION ['net_id'];
            if (isset($_SESSION['net_id']))
                $owner = $_SESSION['net_id'];
            else
                echo "Missing net_id!";
            if (isset($_SESSION ['course_id']))
                $coursenumber = $_SESSION ['course_id'];
            else
                echo "MISSING COURSE NUMBER!";
            /*
             * Inserting the given information into the event table
             */
            $insert = "INSERT INTO `topic` VALUES (NULL, '$coursenumber','$owner', NOW(),'$title', '$body')";
            $query_in = mysql_query($insert);
            if ($query_in)
            {
                header('Location:Forum.php');
                echo '<h3>Query Success</h3>';
            }
            else
            {
                echo '<h3>Query Fail</h3>';
            }
        }
        ?>
    </body>
</html>
