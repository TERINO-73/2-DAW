<?php
require 'conexion.php'; // Conexión a la base de datos

try {
    // Verificar si la conexión se ha establecido
    if (!isset($conexion)) {
        throw new Exception("No se pudo establecer la conexión a la base de datos.");
    }

    $query = $conexion->query("SELECT nombre FROM productos");

    echo "<h3>Nombres de los Productos:</h3>";
    echo "<ul>";

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo "<li>{$row['nombre']}</li>";
    }

    echo "</ul>";
} catch (Exception $e) {
    echo "Error al realizar la consulta: " . $e->getMessage();
}
?>
