<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "datcs";
$username = "datc";
$password = "Labirintul2004";
$dbname = "datc";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>