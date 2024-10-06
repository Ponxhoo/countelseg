<?php
// proxy.php

// URL del sitio web que deseas mostrar
$url = "https://vol.uanataca.com/es";

// Verifica si hay un error al obtener el contenido
$response = @file_get_contents($url);
if ($response === FALSE) {
    echo "No se pudo cargar la página solicitada.";
    exit;
}

// Establece el encabezado de contenido HTML
header('Content-Type: text/html');

// Imprime el contenido obtenido
echo $response;
?>
