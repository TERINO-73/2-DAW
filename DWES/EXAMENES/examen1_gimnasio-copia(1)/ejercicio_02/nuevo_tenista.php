<?php
// nuevo_tenista.php
require_once '../utiles/config.php';
require_once '../utiles/funciones.php';

$errores = [];
$nombre = $apellidos = $altura = $mano = $anno_nacimiento = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = obtenerValorCampo('nombre');
    $apellidos = obtenerValorCampo('apellidos');
    $altura = obtenerValorCampo('altura');
    $mano = obtenerValorCampo('mano');
    $anno_nacimiento = obtenerValorCampo('anno_nacimiento');

    // Validaciones
    if (!validarLongitudCadena($nombre, 1, 50)) {
        $errores['nombre'] = 'El nombre debe tener entre 1 y 50 caracteres.';
    }

    if (!validarLongitudCadena($apellidos, 1, 50)) {
        $errores['apellidos'] = 'Los apellidos deben tener entre 1 y 50 caracteres.';
    }

    if (!filter_var($altura, FILTER_VALIDATE_INT, ["options" => ["min_range" => 50, "max_range" => 250]])) {
        $errores['altura'] = 'La altura debe ser un número entre 50 y 250.';
    }

    if ($mano !== 'Diestro' && $mano !== 'Zurdo') {
        $errores['mano'] = 'La mano debe ser "Diestro" o "Zurdo".';
    }

    if (!filter_var($anno_nacimiento, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1900, "max_range" => date('Y')]])) {
        $errores['anno_nacimiento'] = 'El año de nacimiento debe ser válido.';
    }

    if (empty($errores)) {
        $conexion = conectarPDO($database);
        $query = "INSERT INTO tenistas (nombre, apellidos, altura, mano, anno_nacimiento) VALUES (:nombre, :apellidos, :altura, :mano, :anno_nacimiento)";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':altura', $altura);
        $stmt->bindParam(':mano', $mano);
        $stmt->bindParam(':anno_nacimiento', $anno_nacimiento);
        $stmt->execute();
        echo "Tenista añadido con éxito.";
    }
}

echo "<form method='POST'>
        Nombre: <input type='text' name='nombre' value='" . htmlspecialchars($nombre) . "'>";
if (isset($errores['nombre'])) echo "<span class='error'>{$errores['nombre']}</span>";
echo "<br>
        Apellidos: <input type='text' name='apellidos' value='" . htmlspecialchars($apellidos) . "'>";
if (isset($errores['apellidos'])) echo "<span class='error'>{$errores['apellidos']}</span>";
echo "<br>
        Altura: <input type='number' name='altura' value='" . htmlspecialchars($altura) . "'>";
if (isset($errores['altura'])) echo "<span class='error'>{$errores['altura']}</span>";
echo "<br>
        Mano: <select name='mano'>
                  <option value='Diestro' " . ($mano === 'Diestro' ? 'selected' : '') . ">Diestro</option>
                  <option value='Zurdo' " . ($mano === 'Zurdo' ? 'selected' : '') . ">Zurdo</option>
              </select>";
if (isset($errores['mano'])) echo "<span class='error'>{$errores['mano']}</span>";
echo "<br>
        Año de Nacimiento: <input type='number' name='anno_nacimiento' value='" . htmlspecialchars($anno_nacimiento) . "'>";
if (isset($errores['anno_nacimiento'])) echo "<span class='error'>{$errores['anno_nacimiento']}</span>";
echo "<br>
        <input type='submit' value='Añadir Tenista'>
      </form>";
?>
