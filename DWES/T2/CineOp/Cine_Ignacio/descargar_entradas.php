<?php
session_start();
include 'funciones.php';
// Verificar que el usuario ha realizado el pago y que hay asientos seleccionados
if (!isset($_SESSION['asientos_seleccionados']) || empty($_SESSION['asientos_seleccionados'])) {
    echo "No tienes entradas para descargar.";
    exit();
}

$pelicula_id = $_GET['pelicula_id'];
$sesion_id = $_GET['sesion_id'];
$asientos_seleccionados = $_SESSION['asientos_seleccionados'];  // Asientos seleccionados

// Obtener los detalles de la película y la sesión
$pelicula_nombre = obtenerPelicula($pelicula_id);
$sesion_hora = obtenerSesion($sesion_id);

// Crear el contenido del archivo .txt
$contenido = "Entradas de Cine\n";
$contenido .= "Película: $pelicula_nombre\n";
$contenido .= "Sesión: $sesion_hora\n";
$contenido .= "Asientos seleccionados: " . implode(", ", $asientos_seleccionados) . "\n";

// Crear y enviar el archivo .txt al navegador
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="entradas.txt"');
echo
    $contenido;
exit();
?>