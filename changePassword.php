<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];

    
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];

        
        $sql = "SELECT password FROM usuarios WHERE id = :userId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        
       
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $storedPassword = $row['password'];
            if (password_verify($currentPassword, $storedPassword)) {
                
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateSql = "UPDATE usuarios SET password = :newPassword WHERE id = :userId";
                $updateStmt = $pdo->prepare($updateSql);
                $updateStmt->bindParam(':newPassword', $hashedPassword, PDO::PARAM_STR);
                $updateStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                
                if ($updateStmt->execute()) {
                    echo "Contraseña cambiada exitosamente";
                } else {
                    echo "Error al cambiar la contraseña";
                }
            } else {
                http_response_code(500);
                // echo "La contraseña actual no es válida";
            }
        } else {
            echo "Usuario no encontrado";
        }
    } else {
        echo "ID de usuario no establecido en sesión";
    }
}
?>
