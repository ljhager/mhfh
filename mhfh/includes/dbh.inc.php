<?php

$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'mhfh';

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
  die('ERROR: Cannot connect to database $DB on server
    $server using user name $user ('.mysqli_connect_errno().
     ', '.mysql_connect_error().')');
}

?>