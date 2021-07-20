<?php

$serverName = "localhost";
$dbUsername = "kalli";
$dbPassword = "BTA!12345";
$dbName = "loginsystem";

$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);

if (!$conn){
    die("Connection failed: " .mysqli_connect_error());
}

?>