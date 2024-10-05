<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
$response = $client->get('https://api.github.com/repos/guzzle/guzzle');

echo $response->getStatusCode(); // Debería imprimir 200
echo $response->getBody(); // Debería imprimir el contenido de la respuesta
?>
