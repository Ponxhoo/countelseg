<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $codigo = $data['codigo'];
    $nueva_contrasena = $data['nueva_contrasena'] ?? null;
    $confirmar_contrasena = $data['confirmar_contrasena'] ?? null;

    if (empty($codigo)) {
        echo json_encode(['error' => 'Código es requerido.']);
        exit;
    }

    try {
        // Verificar el código de recuperación
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE recovery_code = ? LIMIT 1");
        $stmt->execute([$codigo]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            echo json_encode(['error' => 'Código de recuperación inválido o expirado.']);
            exit;
        }

        if ($nueva_contrasena !== null && $confirmar_contrasena !== null) {
            if ($nueva_contrasena !== $confirmar_contrasena) {
                echo json_encode(['error' => 'Las contraseñas no coinciden.']);
                exit;
            }

            // Actualizar la contraseña del usuario
            $hashed_password = password_hash($nueva_contrasena, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("UPDATE usuarios SET password = ?, recovery_code = NULL WHERE recovery_code = ?");
            $stmt->execute([$hashed_password, $codigo]);

            echo json_encode(['success' => 'Contraseña actualizada correctamente.']);
        } else {
            echo json_encode(['success' => 'Código verificado.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error al procesar la solicitud: ' . $e->getMessage()]);
    }
}
?>

