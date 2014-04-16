<?php
/*
 * requires and getting needed information from the session
 */
require 'logincheck2.inc.php';
require 'DiscussionBoard.php';
?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Discussion Board</title>
    </head>
    <body>
        <div id="header" style="background-color:#570909;height:75px">
        <h1 style="color:cornsilk">Course <?php echo $coursenumber = $_SESSION ['course_id']; ?> Discussion Board</h1>
            </div>
        <div style="float:left;background-color:#570909">
		<a style="color:cornsilk"href="../home.php"><?php echo "<strong>Change Course</strong>" ?> </a> <br><br>
            <a style="color:cornsilk"href="../calendar/Agenda.php"><?php echo "<strong>Calender</strong>" ?> </a> <br/><br/>
            <a style="color:cornsilk" href="Forum.php"><?php echo "<strong>DiscussionBoard</strong>" ?> </a> <br/><br/>
            <a style="color:cornsilk" href="../docu/documentboard.php"><?php echo "<strong>DocumentBoard</strong>" ?> </a> <br/><br/>
            <a style="color:cornsilk" href="../adboard/adboard.php"><?php echo "<strong>AdBoard</strong>" ?> </a> <br/><br/>
        </div>


        <?php
        //course number is a test value
        $coursenumber = $_SESSION ['course_id'];
        $net_id = $_SESSION ['net_id'];
        $DiscussionBoard = new DiscussionBoard($coursenumber);
        $topics = $DiscussionBoard->getTopics();
        /*
         * inside a topic veiw topic and replies
         */
        echo "<div style='float:left'>";
        if (isset($_REQUEST['expand']))
        {
            $expand = $_REQUEST['expand'];
            $replies = $topics[$expand]->getReplies();
            echo "<table border='2'>";
            /*
             * printing topic title and body
             */
            echo "<tr>";
            echo "<td>";
            echo "</td>";
            echo "<td>";
            echo $topics[$expand]->getTitle();
            echo "</td>";
            /*
             * if the owner is viewing the topic add delete button top topic
             */
            if ($topics[$expand]->getOwner() == $net_id)
            {
                echo "<td>";
                echo "<a href='../DeletePost.php?post=topic&id=";
                echo $topics[$expand]->getID();
                echo "'>Delete topic</a>";
                echo "</td>";
            }
            echo "</tr>";

            echo "<tr>";
            echo "<td>";
            echo $topics[$expand]->getOwner();
            echo "</br>";
            echo $topics[$expand]->getDate();
            echo "</td>";
            echo "<td>";
            echo $topics[$expand]->getBody();
            echo "</td>";
            echo "</tr>";

            /*
             * printing the replies
             */
            $size = sizeof($replies);
            if ($size >= 1)
            {
                for ($i = 0; $i < $size; $i++)
                {
                    echo "<tr>";
                    echo "<td>";
                    echo $replies[$i]->getOwner();
                    echo "</br>";
                    echo $replies[$i]->getDate();
                    echo "</td>";
                    echo "<td>";
                    echo $replies[$i]->getBody();
                    echo "</td>";
                    /*
                     * if owner is viewing the reply add delete button to reply
                     */
                    if ($replies[$i]->getOwner() == $net_id)
                    {
                        echo "<td>";
                        echo "<a href='../DeletePost.php?post=reply&id=";
                        echo $replies[$i]->getID();
                        echo "&expand=";
                        echo $expand;
                        echo "'>Delete reply</a>";
                        echo "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
            else
                echo "</table>";

            echo "<p>";
            echo "<a href='ReplyForm.php?topic=";
            echo $topics[$expand]->getTitle();
            echo "&topicid=";
            echo $topics[$expand]->getID();
            echo "&expand=";
            echo $expand;
            echo "'> add a reply</a>";
            echo "<p>";
            echo "<a href='Forum.php'>Back to topics</a>";
        }

        /*
         * Only viewing topics
         */
        else
        {

            $size = sizeof($topics);
            if ($size >= 1)
            {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Topic Poster</th>";
                echo "<th>Topic Title</th>";
                echo "<th>Date Posted</th>";
                echo "<th>Lastest Reply</th>";
                echo "</tr>";

                for ($i = 0; $i < $size; $i++)
                {
                    echo "<tr>";
                    echo "<td>";
                    echo $topics[$i]->getOwner();
                    echo "</td>";
                    echo "<td>";
                    echo "<a href=Forum.php?expand=" . $i . ">";
                    echo $topics[$i]->getTitle();
                    echo "</a>";
                    echo "</td>";
                    echo "<td>";
                    echo $topics[$i]->getDate();
                    echo "</td>";
                    echo "<td>";
                    if (($topics[$i]->getLastReplyDate()) != NULL)
                    {
                        echo $topics[$i]->getLastReplyDate();
                    }
                    else
                        echo "No replies yet";
                    echo "</td>";
                    /*
                     * if the owner is viewing the topic add delete button top topic
                     */
                    if ($topics[$i]->getOwner() == $net_id)
                    {
                        echo "<td>";
                        echo "<a href='../DeletePost.php?post=topic&id=";
                        echo $topics[$i]->getID();
                        echo "'>Delete topic</a>";
                        echo "</td>";
                    }
                    echo "</tr> ";
                }
                echo "</table>";
            }
            else
                echo "This discussion board seems to be empty.";


            echo "<table border='0'>";

            echo " </table>";
            echo "<p><a href='TopicForm.php'> create a topic</a><p>";
        }
        ?>
		<br><br><br><br><br><br><br><br><br>
        <form action="../logout.php" method="POST">
            <input type="submit" name="logout" value="Logout">
        </form>
    </div>
</body>
</html>