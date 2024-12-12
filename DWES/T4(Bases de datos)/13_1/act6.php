<?php
require 'conexion.php';

    try {
        $sql = "UPDATE productos SET precio = :precio WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([':precio' => $_POST['precio'], ':id' => $_POST['id']]);
        echo "Producto actualizado correctamente.";
    } catch (PDOException $e) {
        echo "Error al actualizar: " . $e->getMessage();
    }

?>
<form method="post">
    ID: <input type="number" name="id"><br>
    Nuevo Precio: <input type="number" step="0.01" name="precio"><br>
    <button type="submit">Actualizar Producto</button>
</form>
