<?php
$output = shell_exec('cd /var/www/vhosts/app.countelseg.com/httpdocs && /opt/plesk/php/7.4/bin/php composer.phar dump-autoload 2>&1');
if ($output) {
    echo "Autoloader actualizado correctamente.\n";
    echo "<pre>$output</pre>";
} else {
    echo "Error al actualizar el autoloader.\n";
}
?>
