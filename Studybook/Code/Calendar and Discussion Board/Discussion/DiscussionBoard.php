<?php

require_once 'connect.inc.php';
require 'Topic.php';

/**
 * This class is a container for Events
 *
 * @author Chris-PC
 */
class DiscussionBoard
{

    Private $topics = array();

    /*
     * constuctor
     * populates the $events array by querying the event table for the eventid
     * of events with the given coursenumber
     */
    Public function __construct($coursenumber)
    {
        $query = "SELECT `topicid` from `topic` WHERE `coursenumber` = '$coursenumber' ORDER BY `date` DESC";
        if ($query_run = mysql_query($query))
        {
            $rows = mysql_num_rows($query_run);
            if ($rows >= 1)
            {
                for ($i = 0; $i < $rows; $i++)
                {
                    $topicid = mysql_result($query_run, $i, 'topicid');
                    $newtopic = new Topic($topicid);
                    $newtopic->getTitle();
                    $this->topics[$i] = $newtopic;
                }
            }
        }
        else
            echo "DiscussionBoard Query fail";
    }

    /*
     * returns the topics array
     */
    Public function getTopics()
    {
        //$sort = sort($events);
        //return $sort;
        return $this->topics;
    }

}

?>
