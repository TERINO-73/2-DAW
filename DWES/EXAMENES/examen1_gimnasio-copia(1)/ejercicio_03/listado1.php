<?php
// listado.php
require_once '../útiles/config.php';
require_once '../útiles/funciones.php';

function obtenerConexion($config) {
    return conectarPDO($config);
}

$conexion = obtenerConexion($database);
$query = "SELECT tor.id, tor.nombre, tor.fecha FROM torneos tor";
$resultado = resultadoConsulta($conexion, $query);

echo "<table border='1'>";
echo "<thead><tr><th>ID Torneo</th><th>Nombre</th><th>Fecha</th></tr></thead>";
echo "<tbody>";

while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>{$fila['id']}</td>";
    echo "<td>{$fila['nombre']}</td>";
    echo "<td>{$fila['fecha']}</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
