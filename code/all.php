<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "SE";

$connect = new mysqli($host, $user, $pass, $db);

if ($connect->connect_error) {
    die("Проблема подключения: " . $connect->connect_error);
}

session_start();
?>