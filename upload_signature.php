<?php
require_once 'db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el archivo de firma y la contraseña desde la solicitud
    $pkcs12File = $_FILES['signatureFile']['tmp_name'] ?? null;
    $password = $_POST['signaturePassword'] ?? '';
    $userId = $_SESSION['user_id'];
    
    // Iniciar el bloque try para manejar excepciones
    try {
        // Verificar si se ha cargado el archivo correctamente
        if (!$pkcs12File || !file_exists($pkcs12File)) {
            throw new Exception('No se pudo cargar el archivo de firma.');
        }

        // Verificar si el archivo es legible
        if (!is_readable($pkcs12File)) {
            throw new Exception('El archivo PKCS12 no se puede leer.');
        }

        // Leer el contenido del archivo
        $pkcs12Content = file_get_contents($pkcs12File);
        if ($pkcs12Content === false) {
            throw new Exception('No se pudo leer el contenido del archivo de firma.');
        }

        // Intentar leer el archivo PKCS12
        $certs = [];
        if (!openssl_pkcs12_read($pkcs12Content, $certs, $password)) {
            throw new Exception('Error al leer el archivo PKCS12 o contraseña incorrecta.');
        }

        // Obtener el certificado
        $cert = $certs['cert'] ?? null;
        if (empty($cert)) {
            throw new Exception('No se encontró ningún certificado válido en el archivo.');
        }

        // Analizar el certificado
        $parsedCert = openssl_x509_parse($cert);

        // Estructurar los datos del certificado
        $signatureData = [
            'nombre' => $parsedCert['subject']['CN'] ?? 'N/A',
            'identificacion' => $parsedCert['subject']['serialNumber'] ?? 'N/A',
            'razon' => $parsedCert['issuer']['O'] ?? 'N/A',
            'localidad' => $parsedCert['issuer']['L'] ?? 'N/A',
            'entidadCertificadora' => $parsedCert['issuer']['CN'] ?? 'N/A',
            'emitido' => date('Y-m-d', $parsedCert['validFrom_time_t']),
            'fechaVencimiento' => date('Y-m-d', $parsedCert['validTo_time_t'])
        ];

        // Insertar los datos de la firma en la base de datos
        $stmt = $pdo->prepare("INSERT INTO user_signatures (user_id, signature, signature_name, password,validTo_time_t) VALUES (:userId, :signature, :signatureName, :password,:validTo_time_t)");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':signature', base64_encode($pkcs12Content), PDO::PARAM_STR); // Almacenar el archivo codificado en base64
        $stmt->bindParam(':signatureName', $signatureData['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':validTo_time_t', $signatureData['fechaVencimiento'], PDO::PARAM_STR);
        $stmt->execute();
        http_response_code(200);
        // Enviar la respuesta JSON con los datos del certificado
        // header('Content-Type: application/json');
        // echo json_encode(['certificado' => $signatureData]);

    } catch (Exception $e) {
        // Manejo de errores: devolver una respuesta JSON con el mensaje de error y el código de estado 500
        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode(['error' => $e->getMessage()]);
    }
}

?>
