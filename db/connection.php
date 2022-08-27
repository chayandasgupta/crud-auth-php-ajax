<?php
$serverName = "localhost";
$userName   = "root";
$password   = "";
$dbName     = "php_students";

$connection = mysqli_connect($serverName, $userName, $password, $dbName);

if(!$connection) {
    die('Connection failed: ' . mysqli_connect_errno());
}
?>