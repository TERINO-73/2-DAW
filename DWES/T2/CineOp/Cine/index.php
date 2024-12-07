<?php
session_start();
include 'funciones.php';

// Definimos las películas y horarios
$peliculas = [
    ['id' => 1, 'nombre' => 'Pelicula 1', 'descripcion' => 'Descripción de la Pelicula 1'],
    ['id' => 2, 'nombre' => 'Pelicula 2', 'descripcion' => 'Descripción de la Pelicula 2'],
    ['id' => 3, 'nombre' => 'Pelicula 3', 'descripcion' => 'Descripción de la Pelicula 3']
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cine de Jesús Terino Rodriguez</title>
</head>
<body>
    <h1>Bienvenido al Cine</h1>
    <?php foreach ($peliculas as $pelicula): ?>
        <h2><?php echo $pelicula['nombre']; ?></h2>
        <p><?php echo $pelicula['descripcion']; ?></p>
        <a href="seleccion_pelicula.php?id=<?php echo $pelicula['id']; ?>">Seleccionar Película</a>
    <?php endforeach; ?>
</body>
</html>
