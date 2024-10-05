<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pkcs12File = $_FILES['signatureFile']['tmp_name'] ?? null;
    $password = $_POST['signaturePassword'] ?? '';

    if (!$pkcs12File) {
        echo json_encode(['error' => 'No se ha proporcionado el archivo de firma.']);
        exit;
    }

    try {
        $pkcs12Content = file_get_contents($pkcs12File);
        if ($pkcs12Content === false) {
            throw new Exception('No se pudo leer el contenido del archivo de firma.');
        }

        $certs = [];
        if (!openssl_pkcs12_read($pkcs12Content, $certs, $password)) {
            throw new Exception('Error al leer el archivo PKCS12 o contraseña incorrecta.');
        }

        $cert = $certs['cert'] ?? '';
        if (empty($cert)) {
            throw new Exception('No se encontró ningún certificado válido.');
        }

        $parsedCert = openssl_x509_parse($cert);
        $response = [
            'certificado' => [
                'nombre' => $parsedCert['subject']['CN'] ?? 'N/A',
                'identificacion' => $parsedCert['subject']['serialNumber'] ?? 'N/A',
                'entidadCertificadora' => $parsedCert['issuer']['CN'] ?? 'N/A',
                'emitido' => date('Y-m-d', $parsedCert['validFrom_time_t']),
                'fechaVencimiento' => date('Y-m-d', $parsedCert['validTo_time_t'])
            ]
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
}
?>
