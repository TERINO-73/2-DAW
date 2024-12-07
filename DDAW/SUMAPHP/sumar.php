<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];

    if(is_numeric($numero1) && is_numeric($numero2)) {

        $suma = $numero1 + $numero2;
        echo "<h2>Resultado de la suma:</h2>";
        echo "<p>La suma de $numero1 + $numero2 es: $suma</p>";
    }else{

        echo "<p>Por favor ingrsa valores numericos validos.</p>";   
}
}else{
    echo "<p>Error al procesar la solicitud.</p>";
}
?>