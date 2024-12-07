<?php
include 'comunidades.php';

$comunidades['Madrid'] = [
    'provincias' => ['Madrid'],
    'capital' => ['Madrid' => ['poblacion' => 3223332, 
    'informacion_adicional' => 'Capital de España.']],
];

foreach ($comunidades as $comunidad => $nobjeto) {
    echo "<strong>$comunidad:</strong><br>";
    echo "Provincias: " . implode(", ", $nobjeto['provincias']) . "<br>";
    foreach ($nobjeto['capital'] as $capital => $valor) {
        echo "Capital: $capital, Población: {$valor['poblacion']}<br>";
    }
 
}
