<?php
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "smartfit";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
