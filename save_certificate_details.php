<?php
// save_certificate_details.php

require_once('db.php');

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['fechaFirma'])) {
    error_log('Error: fechaFirma no está definida en los datos.');
    echo json_encode(['success' => false, 'message' => 'fechaFirma no está definida.']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO certificados (nombre, identificacion, razon, localidad, entidad_certificadora, emitido, fecha_vencimiento, fecha_registro) VALUES (:nombre, :identificacion, :razon, :localidad, :entidad_certificadora, :emitido, :fecha_vencimiento, :fecha_registro)");
    $stmt->execute([
        'nombre' => $data['nombre'],
        'identificacion' => $data['identificacion'],
        'razon' => $data['razon'],
        'localidad' => $data['localidad'],
        'entidad_certificadora' => $data['entidadCertificadora'],
        'emitido' => $data['emitido'],
        'fecha_vencimiento' => $data['fechaVencimiento'],
        'fecha_registro' => $data['fechaFirma']
    ]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error de conexión: ' . $e->getMessage()]);
}
?>


