<?php
// modificar.php
require_once '../útiles/config.php';
require_once '../útiles/funciones.php';

$conexion = conectarPDO($database);
$id = obtenerValorCampo('id');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = obtenerValorCampo('nombre');
    $apellidos = obtenerValorCampo('apellidos');
    $altura = obtenerValorCampo('altura');
    $mano = obtenerValorCampo('mano');
    $anno_nacimiento = obtenerValorCampo('anno_nacimiento');

    $query = "UPDATE tenistas SET nombre = :nombre, apellidos = :apellidos, altura = :altura, mano = :mano, anno_nacimiento = :anno_nacimiento WHERE id = :id";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':altura', $altura);
    $stmt->bindParam(':mano', $mano);
    $stmt->bindParam(':anno_nacimiento', $anno_nacimiento);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header('Location: listado.php');
} else {
    $query = "SELECT * FROM tenistas WHERE id = :id";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $tenista = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<form method='POST'>
            Nombre: <input type='text' name='nombre' value='{$tenista['nombre']}' required><br>
            Apellidos: <input type='text' name='apellidos' value='{$tenista['apellidos']}' required><br>
            Altura: <input type='number' name='altura' value='{$tenista['altura']}' required><br>
            Mano: <select name='mano'>
                      <option value='Diestro' ".($tenista['mano'] == 'Diestro' ? 'selected' : '').">Diestro</option>
                      <option value='Zurdo' ".($tenista['mano'] == 'Zurdo' ? 'selected' : '').">Zurdo</option>
                  </select><br>
            Año de Nacimiento: <input type='number' name='anno_nacimiento' value='{$tenista['anno_nacimiento']}' required><br>
            <input type='submit' value='Modificar Tenista'>
          </form>";
}
?>
