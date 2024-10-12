<?php
require_once 'db.php';
session_start();

$userId = $_SESSION['user_id'];
$opc =  $_REQUEST['opc'];
 switch ($opc) {
    case 1:
            try {
                $stmt = $pdo->prepare("SELECT id, signature_name,validTo_time_t FROM user_signatures WHERE user_id = :userId");
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt->execute();
            
                $signatures = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($signatures);
            } catch (Exception $e) {
                echo json_encode(['error' => $e->getMessage()]);
            }
    break;
    case 2:
        try {
            $stmt = $pdo->prepare("
                SELECT id, signature_name, validTo_time_t 
                FROM user_signatures 
                WHERE user_id = :userId 
                AND validTo_time_t  > CURDATE()"); // Solo firmas no caducadas
            
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();
        
            $signatures = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($signatures);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
        
    break;
}


?>

