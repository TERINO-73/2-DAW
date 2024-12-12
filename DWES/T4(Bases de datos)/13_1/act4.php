<?php
require 'conexion.php'; // Conexión a la base de datos

try {
    // Verificar si la conexión se ha establecido
    if (!isset($conexion)) {
        throw new Exception("No se pudo establecer la conexión a la base de datos.");
    }

    $query = $conexion->query("SELECT * FROM productos");

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Stock</th><th>Categoría</th></tr>";

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['nombre']}</td>";
        echo "<td>{$row['descripcion']}</td>";
        echo "<td>{$row['precio']}</td>";
        echo "<td>{$row['stock']}</td>";
        echo "<td>{$row['categoria']}</td>";
        echo "</tr>";
    }

    echo "</table>";
} catch (Exception $e) {
    echo "Error en la consulta: " . $e->getMessage();
}
?>
