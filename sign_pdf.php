<?php


require 'vendor/autoload.php';

use App\Util\PdfSigner;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recibir datos desde el POST
        $signatureFileBase64 = $_POST['signatureFileBase64'];
        $password = $_POST['password'];
        $documentoBase64 = $_POST['documentoBase64'];
        $llx = $_POST['llx'];
        $lly = $_POST['lly'];
        $pagina = $_POST['pagina'];
        $tipoEstampado = $_POST['tipoEstampado'];
        $razon = $_POST['razon'];

        // Convertir base64 a archivo
        $signatureFilePath = base64_to_file($signatureFileBase64, tempnam(sys_get_temp_dir(), 'sig_') . '.p12');
        $pdfPath = base64_to_file($documentoBase64, tempnam(sys_get_temp_dir(), 'pdf_') . '.pdf');

        // Obtener detalles del certificado
        $certDetails = getCertificateDetails($signatureFilePath, $password);

        // Firmar el PDF
        $pdfSigner = new PdfSigner();
        $result = $pdfSigner->signPdf($pdfPath, $signatureFilePath, $password, [
            'llx' => $llx,
            'lly' => $lly,
            'pagina' => $pagina,
            'nombre' => $certDetails['name'],
            'fechaFirma' => date('Y-m-d H:i:s O'),
            'razon' => $razon,
            'localidad' => $certDetails['locality']
        ]);

        // Enviar respuesta JSON
        header('Content-Type: application/json');
        echo json_encode($result);
    } catch (Exception $e) {
        // Enviar respuesta de error
        header('Content-Type: application/json', true, 500);
        echo json_encode(['error' => $e->getMessage()]);
    }
}

function base64_to_file($base64_string, $output_file) {
    $ifp = fopen($output_file, 'wb'); 
    fwrite($ifp, base64_decode($base64_string)); 
    fclose($ifp); 
    return $output_file; 
}

function getCertificateDetails($p12Path, $p12Password) {
    $fileContent = file_get_contents($p12Path);
    if ($fileContent === false) {
        throw new Exception('Failed to read the PKCS12 file content.');
    }
    
    // Intenta leer el archivo PKCS12
    $result = openssl_pkcs12_read($fileContent, $certs, $p12Password);

    // Verifica si la lectura fue exitosa
    if ($result === false) {
        throw new Exception('Failed to read the PKCS12 file: ' . openssl_error_string());
    }

 
    // Revisa si el certificado existe en el arreglo
    if (!isset($certs['cert'])) {
        throw new Exception('No certificate found in the PKCS12 file.');
    }

    $cert = openssl_x509_parse($certs['cert']);
    if ($cert === false) {
        throw new Exception('Failed to parse certificate: ' . openssl_error_string());
    }

    // Continúa con el resto de la función
    $name = $cert['subject']['CN'];
    $validFrom = date('Y-m-d H:i:s', $cert['validFrom_time_t']);
    $validTo = date('Y-m-d H:i:s', $cert['validTo_time_t']);
    $issuer = $cert['issuer']['CN'];
    $locality = isset($cert['subject']['L']) ? $cert['subject']['L'] : 'Desconocida';
    $organization = isset($cert['subject']['O']) ? $cert['subject']['O'] : 'Desconocida';

    return [
        'name' => $name,
        'validFrom' => $validFrom,
        'validTo' => $validTo,
        'issuer' => $issuer,
        'locality' => $locality,
        'organization' => $organization
    ];
}



?>

