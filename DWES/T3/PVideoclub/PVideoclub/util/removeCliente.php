<?php
session_start();
// Verificar si se proporcionó un cliente para eliminar
if (isset($_GET['cliente'])) {
$clienteAEliminar = $_GET['cliente'];
// Verificar si el cliente está en la lista y eliminarlo
if (isset($_SESSION['clientes'])) {
$_SESSION['clientes'] = array_filter($_SESSION['clientes'],
function ($cliente) use ($clienteAEliminar) {
return $cliente !== $clienteAEliminar;
});
}
}
// Redirigir de vuelta al listado
header("Location: listadoClientes.php");
exit;