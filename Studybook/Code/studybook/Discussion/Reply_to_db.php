<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Reply to the database</title>
    </head>
    <body>
        <h1>Sending the reply to the database...</h1>
        <?php
        require_once 'connect.inc.php';
        require 'logincheck2.inc.php';
        /*
         * checks to see if the user entered a name
         * if not they are sent back to the event creator with an error
         */
        if (empty($_REQUEST['body']) || ctype_space($_REQUEST['body']))
        {
            header('Location:TopicForm.php?error=true');
        }
        else
        {

            $topicid = $_REQUEST['topicid'];
            $body = $_REQUEST['body'];
            $owner = $_SESSION ['net_id'];
            $expand = $_REQUEST['expand'];
            $query = "SELECT topicid FROM topic WHERE topicid = '$topicid'";
            $query_run = mysql_query($query);
            if ($query_run)
            {
                //If netid already exsits echo an error message
                if (mysql_num_rows($query_run) < 1)
                {
                    echo "The topic does not exist.";
                    echo "<a href='Forum.php'>Back to the Discussion Board</a>";
                }
                else
                {
                    $insert = "INSERT INTO `reply`  VALUES (NULL, '$topicid', '$owner', NOW(), '$body')";
                    $query_in = mysql_query($insert);
                    if ($query_in)
                    {
                        header('Location:Forum.php?expand=' . $expand);
                        echo '<h3>Query Success</h3>';
                    }
                    else
                    {
                        echo '<h3>Query Fail</h3>';
                    }

                }
            }
        }
        ?>
    </body>
</html>
