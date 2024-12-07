<?php
session_start();
include 'funciones.php';

$pelicula_id = $_GET['pelicula_id'];
$sesion_id = $_GET['sesion_id'];

// Verificar si el usuario ha seleccionado asientos
if (!isset($_SESSION['asientos_seleccionados']) || empty($_SESSION['asientos_seleccionados'])) {
    echo "No se han seleccionado asientos. Por favor, selecciona tus asientos antes de proceder.";
    exit();
}

// Obtener los asientos seleccionados por el usuario
$asientos_seleccionados = $_SESSION['asientos_seleccionados'];
// Calcular el total
$total = calcularTotal($asientos_seleccionados);

// Actualizar los asientos ocupados en la sesión
actualizarAsientosOcupados($sesion_id, $asientos_seleccionados);




// Mostrar el resumen de la compra
echo "<h1>Resumen de tu compra</h1>";
echo "<p>Película: " . obtenerPelicula($pelicula_id) . "</p>";
echo "<p>Sesión: " . obtenerSesion($sesion_id) . "</p>";
echo "<p>Asientos seleccionados: " . implode(", ", $asientos_seleccionados) . "</p>";
echo "<p>Total a pagar: $" . $total . "</p>";
echo "<p><strong>¡Pago realizado con éxito!</strong></p>";

// Opción para descargar las entradas
echo "<p><a href='descargar_entradas.php?pelicula_id=$pelicula_id&sesion_id=$sesion_id'>Descargar tus entradas</a></p>";
?>