<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once "calendar/Event.php";
require_once "Discussion/Topic.php";
$post = $_REQUEST['post'];
$postid = $_REQUEST['id'];

if($post == "event")
{
    $post_to_delete = new Event($postid);
    $post_to_delete->deleteEvent();
    header('Location:calendar/Agenda.php?month=' . $_REQUEST['month']);
}
else if($post == "topic")
{
    $post_to_delete = new Topic($postid);
    $post_to_delete->deleteTopic();
    header('Location:Discussion/Forum.php');
}
else if($post == "reply")
{
    $post_to_delete = new Reply($postid);
    $post_to_delete->deleteReply();
    header('Location:Discussion/Forum.php?expand=' . $_REQUEST['expand']);
}
?>