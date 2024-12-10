<?php
session_start();

// Incluir el autoload
require_once '../vendor/autoload.php';

// Verificar si la sesión contiene un objeto válido de Videoclub
if (isset($_SESSION['videoclub'])) {
    $data = $_SESSION['videoclub'];
    if (is_string($data)) {
        // Intentar deserializar si los datos son una cadena válida
        $videoclub = unserialize($data);
        if (!$videoclub instanceof Videoclub) {
            // Si no es un objeto Videoclub válido, inicializar de nuevo
            $videoclub = new Videoclub("Mi Videoclub");
        }
    } else {
        // Si los datos no son una cadena, inicializar un nuevo objeto
        $videoclub = new Videoclub("Mi Videoclub");
    }
} else {
    // Si no hay datos en la sesión, inicializar un nuevo objeto
    $videoclub = new Videoclub("Mi Videoclub");
}

// Procesar la solicitud para agregar un cliente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? 'Sin nombre';
    $numero = intval($_POST['numero'] ?? 0);
    $videoclub->agregarCliente($nombre, $numero);

    // Actualizar el objeto Videoclub en la sesión
    $_SESSION['videoclub'] = serialize($videoclub);
    echo "<p>Cliente agregado: $nombre con número $numero.</p>";
}

// Mostrar los clientes
echo "<h1>Listado de Clientes</h1>";
$videoclub->listarClientes();

?>

<!-- Formulario para agregar un nuevo cliente -->
<h2>Agregar un Nuevo Cliente</h2>
<form method="POST" action="listadoClientes.php">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br>
    <label for="numero">Número:</label>
    <input type="number" id="numero" name="numero" required>
    <br>
    <button type="submit">Agregar Cliente</button>
</form>
