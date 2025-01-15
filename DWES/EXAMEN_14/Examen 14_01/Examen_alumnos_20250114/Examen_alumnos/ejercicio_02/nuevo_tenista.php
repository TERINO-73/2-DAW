<?php
require_once("../utiles/config.php");
require_once("../utiles/funciones.php");
$conexion = conectarPDO($database);

$errores = [];
$nombre = $apellidos = $altura = $mano = $anno_nacimiento = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$nombre = obtenerValorCampo('nombre');
	$apellidos = obtenerValorCampo('apellidos');
	$altura = obtenerValorCampo('altura');
	$mano = obtenerValorCampo('mano');
	$anno_nacimiento = obtenerValorCampo('anno_nacimiento');
	$titulo = obtenerValorCampo('titulo');
	$anno = obtenerValorCampo('anno');

	// Validaciones
	if (!validarLongitudCadena($nombre, 3, 50)) {
		$errores['nombre'] = 'El nombre debe tener entre 3 y 50 caracteres.';
	}

	if (!validarLongitudCadena($apellidos, 5, 100)) {
		$errores['apellidos'] = 'Los apellidos deben tener entre 5 y 100 caracteres.';
	}

	if (!filter_var($altura, FILTER_VALIDATE_INT, ["options" => ["min_range" => 120, "max_range" => 250]])) {
		$errores['altura'] = 'La altura debe ser un número entre 120 y 250.';
	}

	if ($mano !== 'Diestro' && $mano !== 'Zurdo') {
		$errores['mano'] = 'La mano debe ser "Diestro" o "Zurdo".';
	}

	if (!filter_var($anno_nacimiento, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1900, "max_range" => date('Y')]])) {
		$errores['anno_nacimiento'] = 'El año de nacimiento debe ser válido.';
	}

	if (empty($errores)) {
		$query = "INSERT INTO tenistas (nombre, apellidos, altura, mano, anno_nacimiento) VALUES (:nombre, :apellidos, :altura, :mano, :anno_nacimiento)";
		$stmt = $conexion->prepare($query);
		$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':apellidos', $apellidos);
		$stmt->bindParam(':altura', $altura);
		$stmt->bindParam(':mano', $mano);
		$stmt->bindParam(':anno_nacimiento', $anno_nacimiento);
		$stmt->execute();
		echo "Tenista sin titulo añadido con exito.";

		$query = "INSERT INTO titulos (anno,tenista_id,torneo_id) VALUES (:anno, :tenista_id, :torneo_id)";
		$stmt = $conexion->prepare($query);
		$stmt->bindParam(':nombre', $anno);
		$stmt->bindParam(':apellidos', $tenista_id);
		$stmt->bindParam(':altura', $torneo_id);
		echo "Titulo añadido con exito.";

	}

}



echo "<form method='POST'>
        Nombre: <input type='text' name='nombre' value='" .$nombre . "'>";
if (isset($errores['nombre']))
	echo "<span class='error'>{$errores['nombre']}</span>";
echo "<br>
        Apellidos: <input type='text' name='apellidos' value='" . $apellidos . "'>";
if (isset($errores['apellidos']))
	echo "<span class='error'>{$errores['apellidos']}</span>";
echo "<br>
        Altura: <input type='number' name='altura' value='" . $altura . "'>";
if (isset($errores['altura']))
	echo "<span class='error'>{$errores['altura']}</span>";
echo "<br>
        Mano: <select name='mano'>
                  <option value='Diestro' " . ($mano === 'Diestro' ? 'selected' : '') . ">Diestro</option>
                  <option value='Zurdo' " . ($mano === 'Zurdo' ? 'selected' : '') . ">Zurdo</option>
              </select>";
if (isset($errores['mano']))
	echo "<span class='error'>{$errores['mano']}</span>";
echo "<br>
        Año de Nacimiento: <input type='number' name='anno_nacimiento' value='" . htmlspecialchars($anno_nacimiento) . "'>";
if (isset($errores['anno_nacimiento']))
	echo "<span class='error'>{$errores['anno_nacimiento']}</span>";
	echo "<br>";


	$query =  "
	SELECT * FROM torneos ";
	$resultado = resultadoConsulta($conexion, $query);
echo "<fieldset>
	<legend>Título</legend>
	<p>
		<select id=
		
		'torneo' name='torneo'>
			<option value=''>Seleccione Torneo</option>";
			while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
				echo" <option value='{$fila['nombre']}'>{$fila['nombre']}</option>";
				}

echo"		</select>
		<span style='color: red'>
		</span>
	</p>
	<p>
		<select id='anno' name='anno'>
			<option value=''>Seleccione Año</option>";
			for ( $i = 1968;$i<=2025;$i++ ) {
				echo "<option value='$i'>$i</option>";

				}
	echo"	</select>
		<span style='color: red'>
		</span>
	</p>
</fieldset>
	<br>
	<input type='submit' value='Añadir Tenista'>
</form>"
?>