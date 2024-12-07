<?php
// archivo_descarga_texto.php
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="mi_archivo.txt"');
echo "Este es el contenido del archivo de texto.";
exit;
?>
