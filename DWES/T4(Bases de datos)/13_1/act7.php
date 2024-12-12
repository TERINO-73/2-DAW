<?php
require 'conexion.php'; // Conexión a la base de datos

try {
    // Verificar si la conexión se ha establecido
    if (!isset($conexion)) {
        throw new Exception("No se pudo establecer la conexión a la base de datos.");
    }

    $conexion->beginTransaction();

    $conexion->exec("INSERT INTO productos (nombre, descripcion, precio, stock, categoria) 
                VALUES ('Producto A', 'Descripción A', 100.00, 10, 'Categoría A')");
    $conexion->exec("INSERT INTO productos (nombre, descripcion, precio, stock, categoria) 
                VALUES ('Producto B', 'Descripción B', 150.00, 15, 'Categoría B')");

    $conexion->commit();
    echo "Transacción completada con éxito.";
} catch (Exception $e) {
    $conexion->rollBack();
    echo "Error en la transacción: " . $e->getMessage();
}
?>
