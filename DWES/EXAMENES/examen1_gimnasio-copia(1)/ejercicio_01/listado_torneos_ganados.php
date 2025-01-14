<?php
// listado_torneos_ganados.php
require_once '../útiles/config.php';
require_once '../útiles/funciones.php';

function obtenerConexion($config) {
    return conectarPDO($config);
}

$conexion = obtenerConexion($database);

if (!isset($_GET['id_tenista'])) {
    header('Location: listado_tenistas.php');
    exit();
}

$id_tenista = (int)$_GET['id_tenista'];
$query = "SELECT t.nombre, t.apellidos, tor.nombre AS torneo_nombre, tor.fecha FROM tenistas t INNER JOIN torneos tor ON t.id = tor.tenista_id WHERE t.id = :id_tenista";
$stmt = $conexion->prepare($query);
$stmt->bindParam(':id_tenista', $id_tenista);
$stmt->execute();

if ($stmt->rowCount() === 0) {
    header('Location: listado_tenistas.php');
    exit();
}

echo "<table border='1'>";
echo "<thead><tr><th>Nombre Tenista</th><th>Apellidos</th><th>Torneo</th><th>Fecha</th></tr></thead>";
echo "<tbody>";

while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>{$fila['nombre']}</td>";
    echo "<td>{$fila['apellidos']}</td>";
    echo "<td>{$fila['torneo_nombre']}</td>";
    echo "<td>{$fila['fecha']}</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>