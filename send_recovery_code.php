<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula = $_POST['cedula'];
    $email = $_POST['email'];

    if (empty($cedula) || empty($email)) {
        echo json_encode(['error' => 'Todos los campos son requeridos.']);
        exit;
    }

    // Generar un código de recuperación aleatorio de 4 dígitos
    $recovery_code = rand(1000, 9999);

    // Buscar el usuario en la base de datos
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE documentId = ? AND email = ?');
    $stmt->execute([$cedula, $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode(['error' => 'No se encontró un usuario con esa cédula y correo electrónico.']);
        exit;
    }

    // Guardar el código de recuperación en la base de datos
    $stmt = $pdo->prepare('UPDATE usuarios SET recovery_code = ? WHERE documentId = ?');
    $stmt->execute([$recovery_code, $cedula]);

    // Obtener el nombre de usuario
    $username = $user['username'];

    // Enviar el código de recuperación al correo electrónico del usuario
    $to = $email;
    $subject = 'Código de recuperación de contraseña';
    $message = "Hola $username,\n\nSu código de recuperación de contraseña es: $recovery_code";
    $headers = 'From: no-reply@app.countelseg.com' . "\r\n" .
               'Reply-To: no-reply@app.countelseg.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(['success' => 'El código de recuperación y el nombre de usuario se han enviado a su correo electrónico.'], JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode(['error' => 'Hubo un error al enviar el correo electrónico.']);
    }
}
?>
