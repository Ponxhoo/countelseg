<?php
require_once 'db.php';
session_start();

$userId = $_SESSION['user_id'];

try {
    $stmt = $pdo->prepare("SELECT count(id) as cantidad FROM user_signatures WHERE user_id = ?");
    $stmt->execute([$userId]);
    $signature = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$signature) {
        throw new Exception('Firma no encontrada.');
    }

    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'cantidad' => $signature['cantidad'],
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
 
?>
