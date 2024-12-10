<?php

require_once '../vendor/autoload.php';

$videoclub = new Videoclub("Mi Videoclub");
$videoclub->agregarCliente("Juan", 1);
$videoclub->listarClientes();
