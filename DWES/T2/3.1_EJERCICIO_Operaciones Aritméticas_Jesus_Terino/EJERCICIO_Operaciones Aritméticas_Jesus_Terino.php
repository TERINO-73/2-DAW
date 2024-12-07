<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO_Operaciones Aritméticas_Jesus_Terino</title>
</head>
<body>
    <h1>EJERCICIO_Operaciones Aritméticas_Jesus_Terino</h1>
    
    <h3>Ejercicio 1</h3>
    <?php 
     $ancho = 18;
     $alto = 15;
     $perimetro = $alto * 2 + $ancho * 2;
     $area = $ancho * $alto;
     echo "El área y el perímetro de un rectángulo de $alto de alto y $ancho de ancho es $area y $perimetro respectivamente";
    ?>

    <h3>Ejercicio 2</h3>
    <?php 
     $n1 = 18;
     $n2 = 15;
     $cociente = $n1/$n2;
     $resto = $n1%$n2;
     echo "El cociente y el resto de la división de $alto y $ancho es $cociente y $resto respectivamente";
    ?>

    <h3>Ejercicio 3</h3>
    <?php 
     $num = 5;
     echo "Pre-incremento: " . ++$num . "<br>";
     echo "Post-incremento: " . $num++ . "<br>";
     echo "Valor final: " . $num;
    ?>

    <h3>Ejercicio 4</h3>
    <?php 
     $numero = 5.6789;
     echo "Número original: $numero<br>";
     echo "Número redondeado a 2 decimales: " . round($numero, 2);
    ?>

    <h3>Ejercicio 5</h3>
    <?php 
     $base = 3;
     $exponente = 4;
     $resultado = $base ** $exponente;
     echo "$base elevado a la $exponente es $resultado";
    ?>

    <h3>Ejercicio 6</h3>
    <?php 
     $numeroAleatorio = mt_rand(1, 50);
     echo "Número aleatorio entre 1 y 50: $numeroAleatorio";
    ?>

    <h3>Ejercicio 7</h3>
    <?php 
     $entero = 5;
     $cadena = "5";
     echo "Comparación con == : " . ($entero == $cadena ? 'Verdadero' : 'Falso') . "<br>";
     echo "Comparación con === : " . ($entero === $cadena ? 'Verdadero' : 'Falso');
    ?>

    <h3>Ejercicio 8</h3>
    <?php 
     $numeroGrande = 1234567.8912;
     echo "Número formateado: " . number_format($numeroGrande, 3, '.', ',');
    ?>

    <h3>Ejercicio 9</h3>
    <?php 
     $numeroEvaluar = 15;
     if ($numeroEvaluar >= 10 && $numeroEvaluar <= 20) {
         echo "$numeroEvaluar está entre 10 y 20";
     } else {
         echo "$numeroEvaluar no está entre 10 y 20";
     }
    ?>

    <h3>Ejercicio 10</h3>
    <?php 
     $letra = 'a';
     echo "Letra original: $letra<br>";
     $letra++;
     echo "Letra después del incremento: $letra";
    ?>
</body>
</html>