<?php
    require_once("../utiles/config.php");
    require_once("../utiles/funciones.php");

$conexion = conectarPDO($database);
$query = "SELECT * FROM torneos ORDER BY nombre DESC;";
$stmt = $conexion->prepare($query);
$stmt->execute();



echo "<table border='1'>";
echo "<tr><th>Nombre</th><th>Ciudad</th><th>Superficie del terreno</th><th>Acciones</th></tr>";

while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>{$fila['nombre']}</td>";
    echo "<td>{$fila['ciudad']}</td>";
    echo "<td>{$fila['superficie_id']}</td>";
    echo "<td><a href='modificar.php?idTorneo={$fila['id']}' class='estilo_enlace'>&#9998</a></td>";
 
    echo "</tr>";
}

echo "</table>";
?>
