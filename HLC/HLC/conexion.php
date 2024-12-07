<?php

$hostname= 'localhost';
$database= 'productos';
$username= 'root';
$password= '';

$conexion= new mysqli($hostname, $username, $password, $database);
if ($conexion->connect_errno) {
	echo "lo sentimos, error al conectar";
}

?>
