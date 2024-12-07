<?php
session_start();

$nombre_usuario = $_SESSION['usuario'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>¡Bienvenido al gimnasio, <?= $nombre_usuario ?>!</h2>
    <a href="clases.php">Seleccionar Clase & Horario</a><br>
    <a href="cerrar_sesion.php">Cerrar Sesi&oacute;n</a>
</body>

</html>