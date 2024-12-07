<?php
include 'comunidades.php';

echo "<table border='1'>";
echo "<tr><th>Comunidad</th><th>Población Total</th></tr>";

foreach ($comunidades as $comunidad => $nobjeto) {
    $poblacionTotal = 0;
    foreach ($nobjeto['capital'] as $capital => $valor) {
        $poblacionTotal += $valor['poblacion'];
    }
    echo "<tr><td>$comunidad</td><td>$poblacionTotal</td></tr>";
}

echo "</table>";
