<?php
// listado.php

require_once '../utiles/config.php';
require_once '../utiles/funciones.php';

$conexion = conectarPDO($database);
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$query = "SELECT * FROM tenistas WHERE nombre LIKE :filter OR apellidos LIKE :filter";
$stmt = $conexion->prepare($query);
$stmt->bindValue(':filter', "%$filter%");
$stmt->execute();

echo "<form method='GET'>
        Filtrar: <input type='text' name='filter' value='{$filter}'>
        <input type='submit' value='Filtrar'>
      </form>";

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Altura</th><th>Mano</th><th>Año Nacimiento</th><th>Acciones</th></tr>";

while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>{$fila['id']}</td>";
    echo "<td>{$fila['nombre']}</td>";
    echo "<td>{$fila['apellidos']}</td>";
    echo "<td>{$fila['altura']}</td>";
    echo "<td>{$fila['mano']}</td>";
    echo "<td>{$fila['anno_nacimiento']}</td>";
    echo "<td><a href='modificar.php?id={$fila['id']}'>Modificar</a></td>";
    echo "</tr>";
}

echo "</table>";
?>
