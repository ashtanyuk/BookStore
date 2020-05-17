<?php
// Database configuration
$dbHost     = "192.168.0.150";
$dbUsername = "root";
$dbPassword = "123456";
$dbName     = "bookstore";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>