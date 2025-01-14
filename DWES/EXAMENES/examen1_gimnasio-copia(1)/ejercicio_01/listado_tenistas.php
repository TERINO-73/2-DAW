<?php
// listado_tenistas.php
require_once '../utiles/config.php';
require_once '../utiles/funciones.php';

function obtenerConexion($config) {
    return conectarPDO($config);
}

$conexion = obtenerConexion($database);
$query = "SELECT * FROM tenistas";
$resultado = resultadoConsulta($conexion, $query);

echo "<table border='1'>";
echo "<thead><tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Altura</th><th>Mano</th><th>Año Nacimiento</th></tr></thead>";
echo "<tbody>";

while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>{$fila['id']}</td>";
    echo "<td>{$fila['nombre']}</td>";
    echo "<td>{$fila['apellidos']}</td>";
    echo "<td>{$fila['altura']}</td>";
    echo "<td>{$fila['mano']}</td>";
    echo "<td>{$fila['anno_nacimiento']}</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>