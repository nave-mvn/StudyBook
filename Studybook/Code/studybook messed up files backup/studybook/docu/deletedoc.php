<!--page to delete a specified document from the database -->
<?php
require 'logincheck2.inc.php';
require 'connect.inc.php';
require 'documentclass.inc.php';

//check if the document id is set and then call the deletedoc function if it is
if (isset($_GET['id'])){
	$document = new document;
	$document->deleteDoc();
	}
else{
	echo "not set";
	}
mysql_close($connection);
?>

