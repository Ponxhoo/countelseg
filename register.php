
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $documentType = $_POST['documentType'];
    $documentId = $_POST['documentId'];
    $fullName = $_POST['fullName'];
    $username = $_POST['username'];
    $password = $_POST['password']; // Contraseña ingresada por el usuario
    $email = $_POST['email'];

    // Hash de la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Consulta SQL para insertar nuevo usuario
    $sql = "INSERT INTO usuarios (documentType, documentId, fullName, username, password, email) 
            VALUES (:documentType, :documentId, :fullName, :username, :password, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':documentType', $documentType, PDO::PARAM_STR);
    $stmt->bindParam(':documentId', $documentId, PDO::PARAM_STR);
    $stmt->bindParam(':fullName', $fullName, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR); // Almacenar el hash de la contraseña
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Registro exitoso"; // Puedes devolver cualquier mensaje o dato que desees
    } else {
        echo "Error en el registro";
    }
}
?>

