<?php

require_once 'Reply.php';

/**
 * This class is a container for Events
 *
 * @author Chris-PC
 */
class Topic
{

    Private $topicid;
    Private $title;
    Private $replies = array();
    Private $date;
    Private $coursenumber;
    Private $owner;

    /*
     * constuctor
     * populates the $events array by querying the event table for the eventid
     * of events with the given coursenumber
     */

    Public function __construct($topicid)
    {
        $this->topicid = $topicid;
        $query = "SELECT * from `topic` WHERE `topicid` = '$topicid'";
        if ($query_run = mysql_query($query))
        {
            $rows = mysql_num_rows($query_run);
            if ($rows >= 1)
            {
                $this->coursenumber = mysql_result($query_run, 0, 'coursenumber');
                $this->date = mysql_result($query_run, 0, 'date');
                $this->title = mysql_result($query_run, 0, 'title');
                $this->owner = mysql_result($query_run, 0, 'owner');
                $this->coursenumber = mysql_result($query_run, 0, 'coursenumber');
                $this->body = mysql_result($query_run, 0, 'body');
            }
            else
                echo "No topics matching ID";
        }else
            echo "Topic for topic info Query fail";
        $query = "SELECT `replyid` from `reply` WHERE `topicid` = '$this->topicid' ORDER BY `date` ASC";
        if ($query_run = mysql_query($query))
        {
            $rows = mysql_num_rows($query_run);
            if ($rows >= 1)
            {
                for ($i = 0; $i < $rows; $i++)
                {
                    $replyid = mysql_result($query_run, $i, 'replyid');
                    $newreply = new Reply($replyid);
                    $this->replies[$i] = $newreply;
                }
            }
        }
    }


    /*
     * returns the events array
     */
    Public function getReplies()
    {   
        return $this->replies;
    }

    /*
     * returns an array of events taht are in the given month
     */

    Public function getTitle()
    {
        return $this->title;
    }

    Public function getOwner()
    {
        return $this->owner;
    }

    Public function getDate()
    {
        return $this->date;
    }

    Public function getID()
    {
        return $this->topicid;
    }

    Public function getBody()
    {
        return $this->body;
    }

    Public function getCoursenumber()
    {
        return $this->coursenumber;
    }
    Public function getLastReplyDate()
    {
        if (sizeof($this->replies) >= 1)
        {
            return $this->replies[0]->getDate();
        }
        else
            return "No replies yet";
    }
    public function deleteTopic()
    {
        $delete = "DELETE FROM topic WHERE topicid='$this->topicid' ";
        $query = mysql_query($delete);
        if ($query)
        {
            echo '<h3>Delete Success</h3>';
        }
        else
        {
            echo '<h3>Delete  Fail</h3>';
        }
        $delete = "DELETE FROM reply WHERE topicid='$this->topicid' ";
        $query = mysql_query($delete);
        if ($query)
        {
            echo '<h3>Delete Success</h3>';
        }
        else
        {
            echo '<h3>Delete  Fail</h3>';
        }
    }

}

?>