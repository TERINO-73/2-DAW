<?php
// Incluimos la clase Coche
require_once 'Coche.php';

// Crear un objeto Coche
$miCoche = new Coche("Toyota", "Corolla");

// Simular un viaje
$miCoche->acelerar(50);
$miCoche->acelerar(20);
$miCoche->frenar(30);
$miCoche->frenar(50);

// Mostrar la velocidad final
echo "La velocidad final del coche es: " . $miCoche->getVelocidad() . " km/h.";
?>
