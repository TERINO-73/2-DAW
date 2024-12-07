<?php
session_start();
include 'funciones.php';

$pelicula_id = $_GET['id'];
$horarios = obtenerHorariosPorPelicula($pelicula_id);
$pelicula = obtenerPelicula($pelicula_id);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pelicula['nombre']; ?></title>
</head>
<body>
    <h1><?php echo $pelicula['nombre']; ?></h1>
    <h2>Horarios:</h2>
    <?php foreach ($horarios as $horario): ?>
        <a href="seleccion_asientos.php?pelicula_id=<?php echo $pelicula_id; ?>&horario=<?php echo urlencode($horario); ?>"><?php echo $horario; ?></a><br>
    <?php endforeach; ?>
</body>
</html>
