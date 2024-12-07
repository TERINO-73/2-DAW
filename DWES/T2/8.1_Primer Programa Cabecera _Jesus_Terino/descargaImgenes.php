<?php
// Verifica si se ha pasado el parámetro 'format' para iniciar la descarga
if (isset($_GET['format'])) {
    $format = $_GET['format'];
    $image_path = "imagen.$format"; // Cambia esto por la ruta real de tus imágenes

    // Establecer el tipo MIME basado en el formato
    switch ($format) {
        case 'jpeg':
            header('Content-Type: image/jpeg');
            header('Content-Disposition: attachment; filename="imagen.jpeg"');
            break;
        case 'png':
            header('Content-Type: image/png');
            header('Content-Disposition: attachment; filename="imagen.png"');
            break;
        case 'gif':
            header('Content-Type: image/gif');
            header('Content-Disposition: attachment; filename="imagen.gif"');
            break;
        default:
            die('Formato no soportado');
    }

    // Verificar si el archivo existe
    if (file_exists($image_path)) {
        readfile($image_path);
        exit;
    } else {
        die('El archivo no existe.');
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descarga de Imágenes</title>
</head>
<body>
    <h1>Descargar Imágenes</h1>
    <p>Selecciona el tipo de imagen que deseas descargar:</p>
    <ul>
        <li><a href="?format=jpeg">Descargar JPEG</a></li>
        <li><a href="?format=png">Descargar PNG</a></li>
        <li><a href="?format=gif">Descargar GIF</a></li>
    </ul>
</body>
</html>

