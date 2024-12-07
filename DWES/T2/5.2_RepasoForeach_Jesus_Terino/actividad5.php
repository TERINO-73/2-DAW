<?php
include 'comunidades2.php';

echo "<table border='1'>";
echo "<tr><th>Comunidad</th><th>Población Total</th></tr>";

foreach ($comunidades as $comunidad => $nobjeto) {
    $poblacionTotal = 0;
    foreach ($nobjeto['provincias'] as $provincia => $datos) {
        $poblacionTotal += $datos['poblacion'];
    }
    echo "<tr><td>$comunidad</td><td>" . number_format($poblacionTotal, 0, ',', '.') . " habitantes</td></tr>";
}

echo "</table>";
?>
