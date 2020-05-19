<?php
$dbHost     = "192.168.0.150";
$dbUsername = "root";
$dbPassword = "123456";
$dbName     = "bookstore";

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


if ($db->connect_error) {
    die("Ошибка соединения: " . $db->connect_error);
}
?>