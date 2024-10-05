<?php
require_once 'db.php';

$signatureId = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM user_signatures WHERE id = :signatureId");
    $stmt->bindParam(':signatureId', $signatureId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Signature not found']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
