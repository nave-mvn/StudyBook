<?php
//Connect to temp1 server and mysql database
$host = 'temp1.cse.msstate.edu';
$user = 'djg120';
$pass = 'ab12345';
$database = 'djg120';

//Connect to local localhost for development
// $host = 'localhost';
// $user = 'root';
// $pass = '';
// $database = 'a_database';

$connection = @mysql_connect($host,$user,$pass) || die('Could not connect');

@mysql_select_db($database) || die('Could not find database');



?>