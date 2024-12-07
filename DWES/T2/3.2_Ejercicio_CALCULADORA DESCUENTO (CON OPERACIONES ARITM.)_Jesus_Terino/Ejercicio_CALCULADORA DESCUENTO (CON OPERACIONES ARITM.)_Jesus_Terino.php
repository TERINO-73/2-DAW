<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio_CALCULADORA DESCUENTO (CON OPERACIONES ARITM.)_Jesus_Terino</title>
</head>

<body>
    <?php
    $datos = [
        ["nombre" => "aluminio", "cantidad" => 10, "precioXU" => 28.82],
        ["nombre" => "plata", "cantidad" => 55, "precioXU" => 0.98],
        ["nombre" => "oro", "cantidad" => 3, "precioXU" => 77.5]
    ];

    define("DESCUENTO_PEQUENO", 0.10);
    define("DESCUENTO_ADICIONAL", 0.05);
    define("IVA", 0.15);
    define("LIMITE_CANTIDAD_ADICIONAL", 40);
    define("LIMITE_COMPRA_GRANDE", 100);

    $precioP1 = $datos[0]["precioXU"] * $datos[0]["cantidad"];
    $precioP2 = $datos[1]["precioXU"] * $datos[1]["cantidad"];
    $precioP3 = $datos[2]["precioXU"] * $datos[2]["cantidad"];
    $precioTotalSDF = $precioP1 + $precioP2 + $precioP3;

    $cantidadTotal = $datos[0]["cantidad"] + $datos[1]["cantidad"] + $datos[2]["cantidad"];

    $precioTotalCDF = $precioTotalSDF - ($precioTotalSDF * DESCUENTO_PEQUENO);

    if ($cantidadTotal > LIMITE_CANTIDAD_ADICIONAL) {
        $precioTotalCDF -= ($precioTotalCDF * DESCUENTO_ADICIONAL);
    }

    $iva = $precioTotalCDF * IVA;
    $precioConIVA = $precioTotalCDF + $iva;

    $precioPromedio = $precioTotalSDF / $cantidadTotal;

    $esPar = ($cantidadTotal % 2 == 0) ? "par" : "impar";

    $compraGrande = ($cantidadTotal >= LIMITE_COMPRA_GRANDE) ? "Es una compra grande" : "Es una compra normal";

    $promocionEspecial = ($precioTotalSDF > 500 || $cantidadTotal > 50) ? "¡Recibes un producto gratis!" : "No hay promociones especiales.";

    $precioTotalSD = number_format($precioTotalSDF, 2);
    $precioTotalCD = number_format($precioTotalCDF, 2);
    $precioConIVAFormat = number_format($precioConIVA, 2);
    $precioPromedioFormat = number_format($precioPromedio, 2);
    $ivaFormat = number_format($iva, 2);

    echo "<h1>RESUMEN DE COMPRA</h1>";
    echo nl2br("$compraGrande\n");

    for ($i = 0; $i < count($datos); $i++) {
        echo nl2br("Nombre: {$datos[$i]["nombre"]}\n");
        echo nl2br("Precio/unidad: {$datos[$i]["precioXU"]}€\n");
        echo nl2br("Cantidad: {$datos[$i]["cantidad"]}\n\n");
    }

    echo nl2br("Total sin descuento: $precioTotalSD €\n");
    if ($cantidadTotal > LIMITE_CANTIDAD_ADICIONAL) {
        echo nl2br("Descuento adicional aplicado: " . DESCUENTO_ADICIONAL * 100 . "%\n");
    }
    echo nl2br("Precio con descuento: $precioTotalCD €\n");
    echo nl2br("IVA (15%): $ivaFormat €\n");
    echo nl2br("Precio total con IVA: $precioConIVAFormat €\n");
    echo nl2br("Promedio de precio por unidad: $precioPromedioFormat €\n");
    echo nl2br("Cantidad total de productos: $cantidadTotal (Es una cantidad $esPar)\n");
    echo nl2br("$promocionEspecial\n");
    ?>
</body>

</html>
