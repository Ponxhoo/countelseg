<?php
require_once 'db.php';
session_start();

$userId = $_SESSION['user_id'];

try {
    $stmt = $pdo->prepare("SELECT id, signature_name,validTo_time_t FROM user_signatures WHERE user_id = :userId");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    $signatures = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($signatures);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>

