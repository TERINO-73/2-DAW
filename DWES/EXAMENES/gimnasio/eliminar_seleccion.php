<?php
session_start();
unset($_SESSION['nombre_clase']);
unset($_SESSION['dato_horario']);
unset($_SESSION['accion']);

header("Location: main.php");
exit;
?>