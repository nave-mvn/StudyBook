<?php
require 'logincheck.inc.php';
require 'connect.inc.php';
require 'docboardclass.inc.php';

if (isset($_GET['id']))
 {
 echo "set";
 $documentboard = new docboardclass;
 $documentboard -> getDoc();
}
else
{
die(); 
}
?>