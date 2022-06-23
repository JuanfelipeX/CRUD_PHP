<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'crud_php';
$connection = new mysqli($server, $username, $password, $database, 3307) or die("not connected");
//echo "connected"
?>