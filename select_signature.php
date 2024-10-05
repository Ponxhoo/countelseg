<?php
require_once('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $signatureId = $data['signatureId'];
    $userId = $_SESSION['user_id'];

    try {
        $stmt = $pdo->prepare("SELECT signature, password FROM user_signatures WHERE id = ? AND user_id = ?");
        $stmt->execute([$signatureId, $userId]);
        $signature = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$signature) {
            throw new Exception('Firma no encontrada.');
        }

        $signatureFileBase64 = base64_encode($signature['signature']);
        $signaturePassword = $signature['password'];

        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'signatureFileBase64' => $signatureFileBase64,
            'signaturePassword' => $signaturePassword
        ]);

    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
}
?>

