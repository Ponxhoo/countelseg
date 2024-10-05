<?php


$output = shell_exec('openssl version'); // Captura tanto la salida estándar como los errores
echo $output;

var_dump($output);
// $pkcs12File = 'C:\Users\pepeg\Downloads\EDWIN_JOSE_CHICAIZA_GUERRA.p12';
// $password = 'Pepeguerra239'; // Asegúrate de que sea la correcta

// if (file_exists($pkcs12File)) {
//     $pkcs12Content = file_get_contents($pkcs12File);
//     if ($pkcs12Content !== false) {
//         $certs = [];
//         if (!openssl_pkcs12_read($pkcs12Content, $certs, $password)) {
//             $error = openssl_error_string();
//             echo 'Error al leer el archivo PKCS12. Detalles: ' . $error;
//         } else {
//             echo 'Certificado leído con éxito.';
//         }
//     } else {
//         echo 'No se pudo leer el contenido del archivo.';
//     }
// } else {
//     echo 'El archivo PKCS12 no existe.';
// }

// openssl pkcs12 -in C:\Users\pepeg\Downloads\EDWIN_JOSE_CHICAIZA_GUERRA.p12 -info -nodes


?>
