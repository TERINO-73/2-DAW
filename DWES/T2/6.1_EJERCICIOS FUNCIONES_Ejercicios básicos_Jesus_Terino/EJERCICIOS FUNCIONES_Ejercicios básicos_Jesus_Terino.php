<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIOS FUNCIONES_Ejercicios básicos_Jesus_Terino</title>
</head>

<body>
    <h3>EJ1: calcularVolumenCilindro</h3>
    <?php
    function calcularVolumenCilindro($altura, $radio)
    {
        $volumen = pi() * pow($radio, 2) * $altura;
        return $volumen;
    }

    $altura = 10;
    $radio = 5;
    echo "El volumen del cilindro es: " . calcularVolumenCilindro($altura, $radio);
    ?>

    <h3>sumarTresNumeros</h3>
    <?php
    function sumarTresNumeros($a, $b, $c)
    {
        return $a + $b + $c;
    }
    $a = 2;
    $b = 3;
    $c = 4;

    echo "La suma de los números es: " . sumarTresNumeros($a, $b, $c) . "\n";

    ?>

    <h3>EJ2.1: multiplicarTresNumeros</h3>
    <?
    function multiplicarTresNumeros($a, $b, $c)
    {
        return $a * $b * $c;
    }

    $a = 2;
    $b = 3;
    $c = 4;

    echo "El producto de los números es: " . multiplicarTresNumeros($a, $b, $c);
    ?>

    <h3>EJ3: eliminarNumerosAleatorios</h3>
    <?php
    function eliminarNumerosAleatorios(array &$array, $cantidad = 1)
    {
        $longitud = count($array);

        if ($cantidad > $longitud) {
            return false;
        }

        for ($i = 0; $i < $cantidad; $i++) {
            $indiceAleatorio = array_rand($array);
            unset($array[$indiceAleatorio]); // Eliminar el elemento
        }

        $array = array_values($array);

        return true;
    }

    $arrayNumeros = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    $cantidadEliminar = 3;

    if (eliminarNumerosAleatorios($arrayNumeros, $cantidadEliminar)) {
        echo "Eliminación realizada correctamente. Array resultante: ";
        print_r($arrayNumeros);
    } else {
        echo "No se pudo eliminar la cantidad solicitada.";
    }
    ?>




</body>

</html>