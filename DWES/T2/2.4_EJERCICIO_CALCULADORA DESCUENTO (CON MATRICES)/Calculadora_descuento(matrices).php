<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora con matrices</title>
</head>

<body>
    <?php
    $datos = [
        ["nombre" => "aluminio", "cantidad" => 10, "precioXU" => 28.82],
        ["nombre" => "plata", "cantidad" => 55, "precioXU" => 0.98],
        ["nombre" => "oro", "cantidad" => 3, "precioXU" => 77.5]
    ];

    define("DESCUENTO_PEQUENO", 0.10);
    define("LIMITE_DESCUENTO", 0.25);
    define("LIMITE_COMPRA_GRANDE", 0.10);
    $precioP1 = $datos[0]["precioXU"] * $datos[0]["cantidad"];
    $precioP2 = $datos[1]["precioXU"] * $datos[1]["cantidad"];
    $precioP3 = $datos[2]["precioXU"] * $datos[2]["cantidad"];
    $precioTotalSDF = $precioP1 + $precioP2 + $precioP3;
    $precioTotalCDF = $precioTotalSDF - $precioTotalSDF * DESCUENTO_PEQUENO;
    $cantidadTotal = $datos[0]["cantidad"] + $datos[1]["cantidad"] + $datos[2]["cantidad"];
    $precioTotalSD = number_format($precioTotalSDF,2);
    $precioTotalCD = number_format($precioTotalCDF,2);

    if ($cantidadTotal >= 100) {
        echo "<p>Es un compra grande</p>";
    } else {

        echo "<p>Es un compra normal<p>";
    }

    echo "<h1> RESUMEN DE COMPRA</h1>";
    for ($i = 0; $i < count($datos); $i++) {

        echo "Nombre: {$datos[$i]["nombre"]}";
        echo "   Precio/unidad: {$datos[$i]["precioXU"]}€   ";
        echo "   Cantidad: {$datos[$i]["cantidad"]} <br>   ";
    }
    
    echo "<br>Precio Sin Descuento: " . $precioTotalSD . "€";

    if ($cantidadTotal >= 100) {
        echo "<br>Precio Sin Descuento: " . $precioTotalSD . "€</p>";
    } else {

        echo "<br>Descuento: " . DESCUENTO_PEQUENO . " ";
        echo "<br>Precio con descuento: " . $precioTotalCD . "€";
    }
    ?>
</body>

</html>