<?php
session_start();
include 'funciones.php';

// Obtener datos de la sesión
$asientosOcupados = obtenerAsientosOcupados();
$pelicula = $_SESSION['pelicula'] ?? 'Desconocida';
$horario = $_SESSION['horario'] ?? 'Desconocido';
$total = count($asientosOcupados) * 10; // Suponiendo que cada asiento cuesta 10

// Verificar si hay asientos seleccionados
if (empty($asientosOcupados)) {
    echo "No se han seleccionado asientos.";
    exit();
}

// Guardar información en un archivo de texto
$datosCompra = "Película: $pelicula\nHorario: $horario\nAsientos: " . implode(", ", $asientosOcupados) . "\nTotal: $total €";
file_put_contents('compra.txt', $datosCompra); // Guardamos en 'compra.txt'

echo "<h1>Gracias por su compra</h1>";
echo "<p>Película: $pelicula</p>";
echo "<p>Horario: $horario</p>";
echo "<p>Asientos: " . implode(", ", $asientosOcupados) . "</p>";
echo "<p>Total: $total €</p>";
echo "<p>Descargue sus entradas aquí: <a href='compra.txt' download='entradas.txt'>Descargar Entradas</a></p>";

// Limpiar asientos ocupados y establecer tiempo
$_SESSION['ultimo_pago'] = time();
limpiarAsientosOcupadosSiEsNecesario();
?>
