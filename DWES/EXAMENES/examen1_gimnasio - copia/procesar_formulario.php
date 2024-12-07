<?php
session_start();
include 'horario.php';
$nombre_clase = $_GET['nombre_clase'];
$dia_clase = $_GET['dia_clase'];
$hora_clase = $_GET['hora_clase'];
$reserva_libera = $_GET['reserva_libera'];

$contenido = "Reserva clase gymnasio\n";
$contenido .= "Nombre clase: $nombre_clase\n";
$contenido .= "Dia clase: $dia_clase\n";
$contenido .= "Hora clase:$hora_clase  \n";

// Crear y enviar el archivo .txt al navegador
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="entradas.txt"');
echo
    $contenido;
exit();
?>