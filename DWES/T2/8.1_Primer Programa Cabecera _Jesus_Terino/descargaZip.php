<?php 
require 'vendor/autoload.php'; // Asegúrate de que esta línea esté presente

use PhpZip\ZipFile;
 
$zip = new ZipFile();
try {
    $zip->addFile('mi_archivo.txt', 'mi_archivo.txt');
    $zip->addFile('mi_archivo2.txt', 'mi_archivo2.txt');
    
    // Crea el archivo ZIP y lo prepara para su descarga
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="archivos.zip"');
    echo $zip->outputAsString();
} catch (\PhpZip\Exception\ZipException $e) {
    // Maneja la excepción
    echo 'Error: ' . $e->getMessage();
} finally {
    $zip->close(); // Asegúrate de cerrar el zip correctamente
}

exit;
?>
