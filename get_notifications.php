<?php
require_once 'db.php';
session_start();

$userId = $_SESSION['user_id'];

// SELECT COUNT(*) 
// FROM user_signatures as cantidad
// WHERE validTo_time_t BETWEEN CURDATE() AND (CURDATE() + INTERVAL 10 DAY);


// select signature_name, validTo_time_t FROM user_signatures 
// WHERE validTo_time_t BETWEEN CURDATE() AND (CURDATE() + INTERVAL 10 DAY);


try {
    // Preparar consulta para contar las firmas
    $countQuery = $pdo->prepare("
        SELECT COUNT(*) as cantidad 
        FROM user_signatures 
        WHERE validTo_time_t BETWEEN CURDATE() AND (CURDATE() + INTERVAL 190 DAY)
    ");
    $countQuery->execute();
    $countResult = $countQuery->fetch(PDO::FETCH_ASSOC); // Obtenemos el resultado de la cuenta

    // Preparar consulta para obtener nombre de firma y fecha de caducidad
    $signaturesQuery = $pdo->prepare("
        SELECT signature_name, validTo_time_t 
        FROM user_signatures 
        WHERE validTo_time_t BETWEEN CURDATE() AND (CURDATE() + INTERVAL 10 DAY)
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

