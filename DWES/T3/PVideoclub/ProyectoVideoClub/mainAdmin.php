<?php
session_start();

if ($_SESSION['usuario'] !== 'admin') {
    header("Location: login.php");
    exit;
}

echo "<h1>Bienvenido, administrador</h1>";
echo "<a href='util/listadoClientes.php'>Ver Clientes</a><br>";
echo "<a href='cerrarSesion.php'>Cerrar sesión</a>";

