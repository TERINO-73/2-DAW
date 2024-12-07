<?php
session_start();
include 'funciones.php';

$mensaje = "";
$pelicula = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $asientosSeleccionados = $_POST['asientos'];
    $pelicula_id = $_POST['pelicula_id'];
    $horario = $_POST['horario'];

    // Guardar asientos ocupados
    guardarAsientosOcupados($pelicula_id, $horario, $asientosSeleccionados);

    $pelicula = obtenerPelicula($pelicula_id);
    $mensaje = "Gracias por comprar en el cine de Jesús Terino Rodriguez";

    // Generar el archivo de texto
    $contenido = "Compra:\nPelícula: {$pelicula['nombre']}\nHorario: {$horario}\nAsientos: " . implode(', ', $asientosSeleccionados);
    $file_name = "entrada_{$pelicula_id}.txt";
    file_put_contents($file_name, $contenido);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pago</title>
</head>
<body>
    <h1><?php echo $mensaje; ?></h1>
    <?php if ($pelicula): ?>
        <p>Película: <?php echo $pelicula['nombre']; ?></p>
        <p>Horario: <?php echo $horario; ?></p>
        <p>Asientos: <?php echo implode(', ', $asientosSeleccionados); ?></p>
        <a href="<?php echo $file_name; ?>" download="<?php echo $file_name; ?>">Descargar Entrada</a>
    <?php endif; ?>
</body>
</html>
