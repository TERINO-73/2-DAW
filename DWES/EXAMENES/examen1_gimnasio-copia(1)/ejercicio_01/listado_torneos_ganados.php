<?php
// listado_torneos_ganados.php
require_once '../utiles/config.php';
require_once '../utiles/funciones.php';

function obtenerConexion($config) {
    return conectarPDO($config);
}

$conexion = obtenerConexion($database);

if (!isset($_GET['id_tenista'])) {
    header('Location: listado_tenistas.php');
    exit();
}

$id_tenista = (int)$_GET['id_tenista'];
$query = "SELECT t.nombre AS torneo, t.ciudad, s.nombre AS superficie, tt.anno
        FROM titulos tt
        INNER JOIN torneos t ON tt.torneo_id = t.id
        INNER JOIN superficies s ON t.superficie_id = s.id
        WHERE tt.tenista_id = ?
        ORDER BY tt.anno DESC;";
$stmt = $conexion->prepare($query);
$stmt->bindParam(':id_tenista', $id_tenista);
$stmt->execute();

if ($stmt->rowCount() === 0) {
    echo "<p>No se encontraron torneos ganados para este tenista.</p>";
    echo "<a href='listado_tenistas.php'>Volver al listado de tenistas</a>";
    exit();
}

echo "<table border='1'>";
echo "<thead><tr><th>Nombre Tenista</th><th>Apellidos</th><th>Torneo</th><th>Ciudad</th><th>Superficie</th></tr></thead>";
echo "<tbody>";

while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>{$fila['nombre']}</td>";
    echo "<td>{$fila['apellidos']}</td>";
    echo "<td>{$fila['torneo_nombre']}</td>";
    echo "<td>{$fila['ciudad']}</td>";
    echo "<td>{$fila['superficie_id']}</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
