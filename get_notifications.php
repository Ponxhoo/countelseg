<?php
require_once 'db.php';
session_start();

$userId = $_SESSION['user_id'];
$dias = $_SESSION['dias'];


try {
    // Preparar consulta para contar las firmas
    $countQuery = $pdo->prepare("
        SELECT 
        count(id) as cantidad
        FROM user_signatures
        WHERE validTo_time_t <= (CURDATE() + INTERVAL $dias DAY);

    ");
    $countQuery->execute();
    $countResult = $countQuery->fetch(PDO::FETCH_ASSOC); // Obtenemos el resultado de la cuenta

    // Preparar consulta para obtener nombre de firma y fecha de caducidad
    $signaturesQuery = $pdo->prepare("
                SELECT 
                signature_name, 
                validTo_time_t, 
                CASE 
                    WHEN validTo_time_t < CURDATE() THEN 1  
                    WHEN validTo_time_t BETWEEN CURDATE() AND (CURDATE() + INTERVAL $dias DAY) THEN 2  
                END AS status
            FROM user_signatures
            WHERE validTo_time_t <= (CURDATE() + INTERVAL $dias DAY);
    ");
    $signaturesQuery->execute();
    $signaturesResult = $signaturesQuery->fetchAll(PDO::FETCH_ASSOC); // Obtenemos el listado de firmas

    // Resultado final combinado
    $result = [
        'cantidad' => $countResult['cantidad'],
        'signatures' => $signaturesResult
    ];

    // Devolvemos el resultado en formato JSON
    echo json_encode($result);

} catch (Exception $e) {
    // Manejo de errores
    echo json_encode(['error' => $e->getMessage()]);
}



?>

