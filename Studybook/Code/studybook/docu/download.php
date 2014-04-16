<!-- This page downloads a specified document -->
<?php
require 'logincheck2.inc.php';
require 'connect.inc.php';
require 'docboardclass.inc.php';

//check if document id is set and if it is, call the getDoc function
if (isset($_GET['id'])){
 echo "set";
 $documentboard = new docboardclass;
 $documentboard -> getDoc();
 }
else
{
 die(); 
 }
?>