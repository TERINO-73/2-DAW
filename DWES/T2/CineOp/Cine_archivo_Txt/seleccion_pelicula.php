<?php
session_start();
include 'funciones.php';

// Obtener los parámetros de la URL
$titulo = isset($_GET['titulo']) ? $_GET['titulo'] : null;
$horario = isset($_GET['horario']) ? $_GET['horario'] : null;

// Validar que los parámetros no estén vacíos
if ($titulo === null || $horario === null) {
    die("Película o horario no especificados.");
}

// Obtener información de la película
$pelicula = obtenerPelicula($titulo);
if ($pelicula === null) {
    die("Película no encontrada.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Selección de Película</title>
</head>
<body>
    <h1>Has seleccionado: <?php echo htmlspecialchars($pelicula['titulo']); ?></h1>
    <p>Horario: <?php echo htmlspecialchars($horario); ?></p>
    <a href="seleccion_asientos.php?titulo=<?php echo urlencode($pelicula['titulo']); ?>&horario=<?php echo urlencode($horario); ?>">Seleccionar Asientos</a>
</body>
</html>
