<?php

require 'connect.inc.php';
require 'Event.php';

/**
 * This class is a container for Events
 *
 * @author Chris-PC
 */
class Calendar
{

    Private $events = array();

    /*
     * constuctor
     * populates the $events array by querying the event table for the eventid
     * of events with the given coursenumber
     */
    Public function __construct($coursenumber)
    {
        $query = "SELECT `eventid` from `event` WHERE `coursenumber` = '$coursenumber' ORDER BY `day` ASC";
        if ($query_run = mysql_query($query))
        {
            $rows = mysql_num_rows($query_run);
            if ($rows >= 1)
            {
                for ($i = 0; $i < $rows; $i++)
                {
                    $eventid = mysql_result($query_run, $i, 'eventid');
                    $newevent = new Event($eventid);
                    $this->events[$i] = $newevent;
                }
            }
            else
                echo "No Events in Course";
        }
        else
            echo "Calendar Query fail";
    }

    /*
     * returns the events array
     */
    Public function getEvents()
    {
        //$sort = sort($events);
        //return $sort;
        return $this->events;
    }

    /*
     * returns an array of events taht are in the given month
     */
    Public function getEventsMonth($month)
    {
        for ($i = 0; $i < sizeof($this->events); ++$i)
        {
            if ($this->events[$i]->getMonth() == $month)
                $tempEvents[] = $this->events[$i];
        }

        return $tempEvents;
    }
    Public function Month_to_text($month_num)
    {
        return date( 'F', mktime(0, 0, 0, $month_num) );
    }

}

?>
