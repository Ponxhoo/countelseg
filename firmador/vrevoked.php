<?php

// Ruta al archivo del certificado .p12
$p12File = 'C:\Users\pepeg\OneDrive\Escritorio\12045403_1720401049.p12';
// Ruta al certificado de la CA emisora
$issuerCertFile = 'C:\Users\pepeg\Downloads\descargar.cer';
// URL del servidor OCSP
$ocspUrl = 'http://ocsp1.uanataca.com/public/pki/ocsp/';

// Contraseña del archivo .p12
$p12Password = 'Jhonny1991';  // Pon la contraseña aquí si tiene

// 1. Cargar el archivo .p12
$p12 = file_get_contents($p12File);
if (!$p12) {
    die("Error al cargar el archivo .p12.\n");
}

// 2. Extraer el certificado y la clave privada del archivo .p12
if (!openssl_pkcs12_read($p12, $certs, $p12Password)) {
    die("Error al leer el archivo .p12: " . openssl_error_string() . "\n");
}

// Extraer el certificado y la clave privada
$cert = $certs['cert'];
$key = $certs['pkey'];

// 3. Guardar el certificado y la clave en archivos temporales
$tempCertFile = 'C:\Users\pepeg\OneDrive\Escritorio\cert.pem';
$tempKeyFile = 'C:\Users\pepeg\OneDrive\Escritorio\key.pem';

file_put_contents($tempCertFile, $cert);
file_put_contents($tempKeyFile, $key);

// 4. Verificar el estado del certificado usando OCSP
$ocspCommand = "openssl ocsp -issuer \"$issuerCertFile\" -cert \"$tempCertFile\" -url $ocspUrl -resp_text -noverify 2>&1";
$outputOcsp = shell_exec($ocspCommand);

// Muestra el resultado de la verificación OCSP
echo nl2br($outputOcsp);

// 5. Evalúa el estado del certificado según el resultado del servidor OCSP
if (strpos($outputOcsp, 'good') !== false) {
    echo "El certificado es válido.\n";
} elseif (strpos($outputOcsp, 'revoked') !== false) {
    echo "El certificado ha sido revocado.\n";
} else {
    echo "No se pudo determinar el estado del certificado.\n";
}

// 6. Elimina los archivos temporales creados
unlink($tempCertFile);
unlink($tempKeyFile);

?>
