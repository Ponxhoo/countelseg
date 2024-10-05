<?php
require_once 'db.php';

$signatureId = $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT signature, password, signature_name, razon, localidad FROM user_signatures WHERE id = :signatureId");
    $stmt->bindParam(':signatureId', $signatureId, PDO::PARAM_INT);
    $stmt->execute();

    $signature = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($signature) {
        echo json_encode($signature);
    } else {
        echo json_encode(['error' => 'Signature not found']);
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>


