<?php
session_start(); // Iniciar la sesión si no está iniciada

// Eliminar todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redireccionar al usuario a la página de login (index.html)
header('Location: index.html');
?>
