<?php
    require_once("../utiles/config.php");
    require_once("../utiles/funciones.php");

$conexion = conectarPDO($database);
if (isset($_GET['idTorneo'])) {
	$id = obtenerValorCampo('idTorneo');

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$nombre = obtenerValorCampo('nombre');
		$ciudad = obtenerValorCampo('ciudad');
		$superficie_id = obtenerValorCampo('superficie_id');

		if (!validarLongitudCadena($nombre, 3, 60)) {
			$errores['nombre'] = 'El nombre debe tener entre 3 y 60 caracteres.';
		}
	
		if (!validarLongitudCadena($ciudad, 3, 60)) {
			$errores['ciudad'] = 'Los ciudad deben tener entre 3 y 60 caracteres.';
		}
	
		if (!filter_var($superficie_id, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 3]])) {
			$errores['superficie_id'] = 'La superficie_id debe ser un número entre 1 y 3.';
		}

		if (empty($errores)) {
			$conexion = conectarPDO($database);
			$query = "INSERT INTO tenistas (nombre, ciudad, superficie_id, mano, anno_nacimiento) VALUES (:nombre, :ciudad, :superficie_id, :mano, :anno_nacimiento)";
			$stmt = $conexion->prepare($query);
			$stmt->bindParam(':nombre', $nombre);
			$stmt->bindParam(':ciudad', $ciudad);
			$stmt->bindParam(':superficie_id', $superficie_id);
			$stmt->execute();
		}

		$query = "UPDATE torneos SET nombre = :nombre, ciudad = :ciudad, superficie_id = :superficie_id WHERE id = :id";
		$stmt = $conexion->prepare($query);
		$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':ciudad', $ciudad);
		$stmt->bindParam(':superficie_id', $superficie_id);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		header('Location: listado.php');
	} else {
		$query = "SELECT * FROM torneos WHERE id = :id";
		$stmt = $conexion->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$torneo = $stmt->fetch(PDO::FETCH_ASSOC);

		echo "<form method='POST'>
        Nombre: <input type='text' name='nombre' value='{$torneo['nombre']}'>";
if (isset($errores['nombre']))
	echo "<span class='error'>{$errores['nombre']}</span>";
echo "<br>
        ciudad: <input type='text' name='ciudad' value='{$torneo['ciudad']}'>";
if (isset($errores['ciudad']))
	echo "<span class='error'>{$errores['ciudad']}</span>";
echo "<br>
        superficie_id: <input type='number' name='superficie_id' value='{$torneo['superficie_id']}'>";
if (isset($errores['superficie_id']))
	echo "<span class='error'>{$errores['superficie_id']}</span>";
echo "<br>
				<input type='submit' value='Modificar torneo'>
			</form>";
	}
}else{ 
	   // Si no se pasa el parámetro 'tenista_id', redirigir al listado de tenistas
    header("Location: listado.php");
    exit();}
?>
