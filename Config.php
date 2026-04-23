<?php
$host = "localhost";
$user = "root";
$password = "";
$db   = "walletApp_db";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("DB-Verbindung fehlgeschlagen: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");