<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios_Tipos de datos (Con Matrices )</title>
</head>
<body>
    <h1>Ejercicios_Tipos de datos (Con Matrices )</h1>
    <h3>Ejercicio 1</h3>
    <?php 
    $colores = ["Amarillo", "Azul", "Carmesí","Verde","Morado"];
    echo"El tercer color que he puesto es el $colores[2]";
    ?>
    <h3>Ejercicio 2</h3>

    <?php 
    $auto = ["Marca" => "Peugeot","Modelo" => "Hibrido","Año"=>2018];
    echo "El modelo del peugeot el el " . $auto["Modelo"];
    ?>
    <h3>Ejercicio 3</h3>
    <?php
    $datos = [
    ["nombre" => "pepe", "edad" => 25, "nota" => 8],
    ["nombre" => "juan", "edad" => 22, "nota" => 6],
    ["nombre" => "pedro", "edad" => 27, "nota" => 7]
    ];
    echo "El nombre del segundo estudiante es {$datos[1]["nombre"]} ";
    ?>
    <h3>Ejercicio 4</h3>
    <?php 
        $diasSemana =["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];
        echo "<pre>";
        print_r($diasSemana);
        echo "</pre>";
    ?>
    <h3>Ejercicio 5</h3>
    <?php 
    $numeros = [1,2,3];
    $numeros[] = 4;
    $numeros[] = 8;
    echo"$numeros[4]";
    ?>
    <h3>Ejercicio 6</h3>
    <?php 
        $numeros = [1,2,3];
        $numeros2 =[4,5,7];
        $resultado = array_merge($numeros, $numeros2);
        echo "<pre>";
        print_r($resultado);
        echo "</pre>";
    ?>
    <h3>Ejercicio 7</h3>
    <?php 
            $numeros = [1,2,3];
            $numeros2 =[4,5,7];
            $resultado = array_merge($numeros, $numeros2);
            $cuenta = count($resultado);
            echo"$cuenta";
    ?>
    <h3>Ejercicio 8</h3>
    <?php 
        $numeros = [1,2,3,4,5];
        echo "<pre>";
        print_r($numeros);
        echo "</pre>";
        unset($numeros[2]);
        echo "<pre>";
        print_r($numeros);
        echo "</pre>";

    ?>
    <h3>Ejercicio 9</h3>
    <?php 
    $cuadrados = [5 => 25, 9 => 81];
    $cuadradosCopia = $cuadrados;
    echo "<pre>";
    print_r($cuadradosCopia);
    echo "</pre>";
    ?>

    <h3>Ejercicio 10</h3>
    <?PHP 
        define(constant_name: "VelocidadLuz_ms",5);
        echo "El valor de la velocidad de la luz en metross por segundo es" . VelocidadLuz_ms . "m/s";
    ?>
    <h3>Ejercicio 11</h3>
    <?php 
    define("App_name", "Calculadora");
    echo "Mi app se llama " . App_name . " y es la mejor";
    ?>
    
    <h3>Ejercio 12</h3>
    <?php 
    print_r(PHP_VERSION);

    ?>

    <h3>Ejercicio 13</h3>
    <?php
    print "<pre>";
    print_r(get_defined_constants());
    print "</pre>";
    ?>













</body>
</html>