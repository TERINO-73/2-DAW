<?php
session_start();
include 'funciones.php';

// Obtener las películas
$peliculas = obtenerPeliculas();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cine - Películas</title>
</head>
<body>
    <h1>Bienvenido al Cine</h1>
    
   
      <p>! Aquí están las películas disponibles:</p>
    
 

    <h2>Películas disponibles</h2>
    <ul>
        <?php foreach ($peliculas as $pelicula): ?>
            <li>
                <h3><?php echo htmlspecialchars($pelicula['titulo']); ?></h3>
                <p><?php echo htmlspecialchars($pelicula['descripcion']); ?></p>
                <h4>Horarios:</h4>
                <ul>
                    <?php foreach ($pelicula['horarios'] as $horario): ?>
                        <li>
                            <a href="seleccion_pelicula.php?titulo=<?php echo urlencode($pelicula['titulo']); ?>&horario=<?php echo urlencode($horario); ?>">
                                <?php echo htmlspecialchars($horario); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
