<?php
// Comando para instalar pdftk
$cmd = 'sudo apt-get update && sudo apt-get install -y pdftk';

// Ejecutar el comando
exec($cmd, $output, $return_var);

// Verificar la salida y el estado de retorno
if ($return_var === 0) {
    echo "pdftk instalado con éxito.";
} else {
    echo "Error al instalar pdftk: " . implode("\n", $output);
}
?>
