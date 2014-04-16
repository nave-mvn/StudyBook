<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'connect.inc.php';

/**
 * Description of Reply
 *
 * @author Chris-PC
 */
class Reply
{

    Private $replyid;
    Private $topicid;
    Private $date;
    Private $coursenumber;
    Private $body;
    Private $owner;


    /*
     * constructor
     * queries the db for the reply matchin the replyid and the populates
     * the event variables with the data from the db
     */

    public function __construct($replyid)
    {

        $this->replyid = $replyid;
        $query = "SELECT * from `reply` WHERE `replyid` = '$replyid'";
        if ($query_run = mysql_query($query))
        {
            $rows = mysql_num_rows($query_run);
            if ($rows >= 1)
            {
                $this->coursenumber = mysql_result($query_run, 0, 'coursenumber');
                $this->body = mysql_result($query_run, 0, 'body');
                $this->topicid = mysql_result($query_run, 0, 'topicid');
                $this->date = mysql_result($query_run, 0, 'date');
                $this->owner = mysql_result($query_run, 0, 'owner');
            }
            else
                echo "No Replies matching ID";
        }else
            echo "Reply Query fail";
    }

    Public function echoReply()
    {
        echo "echoReply--";
        echo $this->getID();
        echo " ";
        echo $this->getCourse();
        echo " ";
        echo $this->getBody();
        echo "--echoReplyend";
        echo "</br>";
    }

    Public function getID()
    {
        return $this->replyid;
    }

    Public function getCourse()
    {
        return $this->coursenumber;
    }

    Public function getBody()
    {
        return $this->body;
    }

    Public function getTopic()
    {
        return $this->topicid;
    }

    Public function getOwner()
    {
        return $this->owner;
    }

    Public function getDate()
    {
        return $this->date;
    }

    public function deleteReply()
    {
        $delete = "DELETE FROM reply WHERE replyid='$this->replyid' ";
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