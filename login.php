<?php
session_start(); // Iniciar la sesión

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para obtener el hash de la contraseña
    $sql = "SELECT id, password FROM usuarios WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    // Verificar si se encontraron resultados
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashedPassword = $user['password'];

        // Verificar la contraseña utilizando password_verify
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $user['id']; // Almacenar el ID del usuario en la sesión
            $_SESSION['user'] = $user['fullName']; // Almacenar el ID del usuario en la sesión
            echo "Login exitoso"; // Puedes devolver cualquier mensaje o dato que desees
        } else {
            echo "Error en las credenciales";
        }
    } else {
        echo "Error en las credenciales";
    }
}
?>
