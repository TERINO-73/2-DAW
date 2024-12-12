<?php
try
{
$mysql =
"mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
$user = "dwes_prueba";
$password = "73373";
$opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$conexion = new PDO($mysql, $user, $password);
}
catch (PDOException $e)
{
// Mostramos mensaje en caso de error
echo "<p>" .$e->getMessage()."</p>";
exit();
}
$resultado = $conexion->query('select * FROM mensajes');
while ($registro = $resultado->fetch(PDO::FETCH_BOUND)) {
    echo "<p>Id: $id</p>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Mensaje: $mensaje</p>";
    }
    $conexion = null;
    ?>