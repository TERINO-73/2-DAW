<?php

require_once '../vendor/autoload.php';

$nombre = $_POST['nombre'] ?? 'Desconocido';
$numero = $_POST['numero'] ?? 0;

$videoclub = new Videoclub("Mi Videoclub");
$videoclub->agregarCliente($nombre, $numero);
echo "Cliente agregado: $nombre con número $numero.";
