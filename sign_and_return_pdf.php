<?php
// Verificar si se reciben datos POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si se recibieron los datos esperados
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (isset($data["pdfFile"]) && isset($data["coordinates"])) {
        // Decodificar los datos recibidos
        $pdfFile = $data["pdfFile"];
        $coordinates = $data["coordinates"];

        // Procesar el archivo PDF recibido (guardar o realizar otras operaciones)
        // Simplemente se regresa el nombre del certificado en este ejemplo
        $nombreCertificado = "Nombre de la Firma Electrónica";

        // Preparar la respuesta en formato JSON
        $response = [
            "nombreCertificado" => $nombreCertificado
        ];

        // Enviar la respuesta como JSON
        header("Content-Type: application/json");
        echo json_encode($response);
    } else {
        // Si los datos recibidos no son los esperados, retornar un error de solicitud incorrecta
        http_response_code(400);
        echo json_encode(["error" => "Datos incompletos o incorrectos"]);
    }
} else {
    // Si no se recibe una solicitud POST válida, retornar un error de solicitud incorrecta
    http_response_code(400);
    echo json_encode(["error" => "Método de solicitud no permitido"]);
}
?>
