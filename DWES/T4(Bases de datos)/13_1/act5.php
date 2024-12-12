<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
      $sql = "INSERT INTO productos (nombre, descripcion, precio, stock, categoria) 
                VALUES (:nombre, :descripcion, :precio, :stock, :categoria)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([
            ':nombre' => $_POST['nombre'],
            ':descripcion' => $_POST['descripcion'],
            ':precio' => $_POST['precio'],
            ':stock' => $_POST['stock'],
            ':categoria' => $_POST['categoria']
        ]);

        echo "Producto insertado correctamente.";
    } catch (Exception $e) {
        echo "Error al insertar el producto: " . $e->getMessage();
    }
}
?>
<form method="post">
    Nombre: <input type="text" name="nombre" required><br>
    Descripción: <input type="text" name="descripcion" required><br>
    Precio: <input type="number" step="0.01" name="precio" required><br>
    Stock: <input type="number" name="stock" required><br>
    Categoría: <input type="text" name="categoria" required><br>
    <button type="submit">Insertar Producto</button>
</form>
