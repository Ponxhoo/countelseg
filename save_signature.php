<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User not authenticated']);
    exit;
}

require_once('db.php'); // Asegúrate de que este archivo existe y se conecta a la base de datos

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['signatureFileBase64']) || !isset($input['password']) || !isset($input['signatureName'])) {
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

$userId = $_SESSION['user_id'];
$signatureFileBase64 = $input['signatureFileBase64'];
$password = $input['password'];
$signatureName = $input['signatureName'];

$query = $pdo->prepare("INSERT INTO user_signatures (user_id, signature, signature_name, password) VALUES (?, ?, ?, ?)");
$result = $query->execute([$userId, $signatureFileBase64, $signatureName, password_hash($password, PASSWORD_DEFAULT)]);

if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => 'Failed to save signature']);
}


