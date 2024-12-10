<?php
// programa.php

// Incluir el archivo de la clase Usuario
require_once 'Usuario.php';

// Crear un nuevo usuario
$usuario = new Usuario("Jesús Terino", "terino@gmail.com", "contraseña");

// Mostrar el nombre del usuario
echo "Nombre del usuario: " . $usuario->getNombre() ."<br/>";

// Cambiar la contraseña del usuario
$usuario->cambiarPassword("nueva_contraseña");
echo "Contraseña cambiada.";
?>
