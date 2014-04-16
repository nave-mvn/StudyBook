<?php
//To be included in all Secure pages to prevent unlogged users from accessing them
session_start();
if (!isset($_SESSION['net_id'])){
header('Location:../invalid.html');
}

?>