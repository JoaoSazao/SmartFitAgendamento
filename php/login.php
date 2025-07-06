<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["success" => false, "error" => "Método inválido"]);
    exit;
}

include_once '../config/db.php';

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$query = "SELECT * FROM usuarios WHERE email = ? LIMIT 1";
$stmt = $conn->prepare($query);

if (!$stmt) {
    echo json_encode(["success" => false, "error" => "Erro na preparação da consulta"]);
    exit;
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($senha, $user['senha'])) {
        $_SESSION['user_id'] = $user['id'];
        echo json_encode(["success" => true]);
        exit;
    }
}

echo json_encode(["success" => false]);
