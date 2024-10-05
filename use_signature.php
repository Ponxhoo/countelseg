<?php
require_once('db.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'user_id not defined']);
    exit;
}

$userId = $_SESSION['user_id'];
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id'])) {
    echo json_encode(['error' => 'id not provided']);
    exit;
}

$signatureId = $data['id'];

$sql = "SELECT signature, password, razon, localidad FROM user_signatures WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $signatureId, $userId);
$stmt->execute();
$result = $stmt->get_result();

$response = [];
if ($row = $result->fetch_assoc()) {
    $response['signature'] = base64_encode($row['signature']);
    $response['password'] = $row['password'];
    $response['razon'] = $row['razon'];
    $response['localidad'] = $row['localidad'];
} else {
    $response['error'] = 'Firma no encontrada.';
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>

