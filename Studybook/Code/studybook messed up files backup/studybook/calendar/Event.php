<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'connect.inc.php';
/**
 * Description of Event
 *
 * @author Chris-PC
 */
class Event
{

    Private $eventid;
    Private $coursenumber;
    Private $day;
    Private $month;
    Private $year;
    Private $name;
    Private $description;
    Private $owner;

    /*
     * constructor
     * queries the db for the event matchin the eventid and the populates
     * the event variables with the data from the db
     */

    public function __construct($eventid)
    {

        $this->eventid = $eventid;
        $query = "SELECT * from `event` WHERE `eventid` = '$eventid'";
        if ($query_run = mysql_query($query))
        {
            $rows = mysql_num_rows($query_run);
            if ($rows >= 1)
            {
                    $this->coursenumber = mysql_result($query_run, 0, 'coursenumber');
                    $this->day = mysql_result($query_run, 0, 'day');
                    $this->month = mysql_result($query_run, 0, 'month');
                    $this->year = mysql_result($query_run, 0, 'year');
                    $this->name = mysql_result($query_run, 0, 'name');
                    $this->description = mysql_result($query_run, 0, 'description');
                    $this->owner = mysql_result($query_run, 0, 'owner');
            }
            else
                echo "No Events matching ID";
        }else
            echo "Event Query fail";
    }

    Public function echoEvent()
    {
        echo "echoEvent--";
        echo $this->getID();
        echo " ";
        echo $this->getCourse();
        echo " ";
        echo $this->getName();
        echo "--echoEventend";
        echo "</br>";
    }

    Public function getID()
    {
        return $this->eventid;
    }

    Public function getCourse()
    {
        return $this->coursenumber;
    }

    Public function getDay()
    {
        return $this->day;
    }

    Public function getMonth()
    {
        return $this->month;
    }

    Public function getYear()
    {
        return $this->year;
    }

    Public function getName()
    {
        return $this->name;
    }

    Public function getDescription()
    {
        return $this->description;
    }

    Public function getOwner()
    {
        return $this->owner;
    }

    public function deleteEvent()
    {
        $delete = "DELETE FROM event WHERE eventid='$this->eventid' ";
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