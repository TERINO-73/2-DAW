<?php
// listado_tenistas.php
require_once '../útiles/config.php';
require_once '../útiles/funciones.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$conexion = conectarPDO($database);
$query = "SELECT id, nombre, apellidos FROM tenistas";
$stmt = $conexion->prepare($query);
$stmt->execute();

echo "<table border='1'>";
echo "<thead><tr><th>Nombre</th><th>Apellidos</th><th>Acciones</th></tr></thead>";
echo "<tbody>";

while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>{$fila['nombre']}</td>";
    echo "<td>{$fila['apellidos']}</td>";
    echo "<td>";
    
    // Solo el administrador puede ver los trofeos
    if ($_SESSION['usuario']['rol'] === 'admin') {
        echo "<a href='listado_torneos_ganados.php?id_tenista={$fila['id']}'>Ver trofeos</a>";
    } else {
        echo "No autorizado";
    }

    echo "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>