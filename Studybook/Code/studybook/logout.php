<!--this is to unset your session-->
<?php


session_Start();
session_destroy();
header('Location: index.php');




?>

