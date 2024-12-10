<?php
include 'comunidades.php';

foreach ($comunidades as $comunidad => $nobjeto) {
    foreach ($nobjeto['capital'] as $capital => $valor) {
        echo "Capital: $capital, Población: {$valor['poblacion']}<br>";
    }
}
