<?php
require 'logincheck.inc.php';
require 'connect.inc.php';
require 'documentclass.inc.php';

if (isset($_GET['id'])){
$document = new document;
$document->deleteDoc();
}
else{
echo "not set";
}
?>

