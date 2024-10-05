<?php
session_start();
require_once 'db.php';

if (isset($_SESSION['user_id'])) {
    
    $userId = $_SESSION['user_id'];

    
    $sql = "SELECT fullName, email, documentId FROM usuarios WHERE id = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'Usuario no encontrado'));
    }
} else {
    echo json_encode(array('error' => 'ID de usuario no establecido en sesión'));
}
?>

