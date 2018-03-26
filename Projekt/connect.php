<?php

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = 'root';
$dbName = 'webshop';

$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// If connection failed, exit php code
if (!$connection) {
    echo mysqli_connect_error();
    exit;
}

?>