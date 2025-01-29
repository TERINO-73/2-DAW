<?php
session_start();

if ($_SESSION['usuario'] !== 'cliente') {
    header("Location: login.php");
    exit;
}

echo "<h1>Bienvenido, cliente</h1>";
echo "<a href='util/listadoClientes.php'>Ver Productos</a><br>";
echo "<a href='cerrarSesion.php'>Cerrar sesión</a>";
