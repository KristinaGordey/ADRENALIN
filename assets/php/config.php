<?php
$servername = "MySQL-5.7";
$username = "root";
$password = "";
$dbname = "Adrenalin";

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
