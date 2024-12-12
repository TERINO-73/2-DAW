<?php
require 'conexion.php'; // Conexión a la base de datos

try {
    $query = $conexion->query("SELECT * FROM productos");

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Stock</th><th>Categoría</th></tr>";
    
    foreach ($query as $row) {
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
