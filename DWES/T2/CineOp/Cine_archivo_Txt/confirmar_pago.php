<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;
    $horario = isset($_POST['horario']) ? $_POST['horario'] : null;
    $asientos = isset($_POST['asientos']) ? explode(',', $_POST['asientos']) : [];

    if ($titulo && $horario && !empty($asientos)) {
        // Crear contenido del archivo
        $contenido = "Gracias por comprar en el cine de Jesús Terino Rodríguez.\n";
        $contenido .= "Detalles de tu compra:\n";
        $contenido .= "Película: " . $titulo . "\n";
        $contenido .= "Horario: " . $horario . "\n";
        $contenido .= "Asientos: " . implode(', ', $asientos) . "\n";
        
        // Nombre del archivo
        $nombreArchivo = "entrada_cine_" . time() . ".txt"; // Nombre único por timestamp

        // Enviar cabeceras para la descarga del archivo
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="' . $nombreArchivo . '"');
        header('Content-Length: ' . strlen($contenido));

        // Imprimir el contenido del archivo
        echo $contenido;
        exit; // Finalizar el script después de enviar el archivo
    } else {
        die("Falta información para confirmar el pago.");
    }
} else {
    die("Acceso no permitido.");
}
