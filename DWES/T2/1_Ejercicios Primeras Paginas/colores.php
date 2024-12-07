<?php
$min = 0;
$max = 255;
$aleatorio1 = rand($min,$max);
$aleatorio2 = rand($min,$max);
$aleatorio3 = rand($min,$max);
// se generan tres numeros aleatorios
$color = "rgb($aleatorio1,$aleatorio2,$aleatorio3)";
// se meten los tres números creados anteriormente en un rgb para que muestre el color
echo "<p style='color:$color'>Guapo</p>";
// muestro una palabre con el estilo del color creado anteriormente
?>

