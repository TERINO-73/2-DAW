<?php
include 'comunidades.php';
foreach ($comunidades as $comunidad => $nobjeto) {
    echo "$comunidad: ";
    echo implode(", ", $nobjeto['provincias']);
    echo "<br>";
}
