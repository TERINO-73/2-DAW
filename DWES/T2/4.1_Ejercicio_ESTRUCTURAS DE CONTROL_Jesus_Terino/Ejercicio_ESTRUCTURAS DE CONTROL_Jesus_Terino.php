<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio_ESTRUCTURAS DE CONTROL_Jesus_Terino</title>
</head>
<body>
    <h1>Ejercicio_ESTRUCTURAS DE CONTROL_Jesus_Terino</h1>

    
    <h3>Ejercicio 1</h3>
    <pre>
    <?php
        for ($i = 1; $i <= 3; $i++) {
            echo "Sentencia de la variable $i incluyendo el valor $i<br>";
            for ($j = 'a'; $j <= 'd'; $j++) {
                echo "Sentencia de la variable $j incluyendo el valor $j<br>";
            }
        }
    ?>
    </pre>


    <h3>Ejercicio 2</h3>
    <pre>
    <?php
        for ($primero = 1; $primero <= 3; $primero++) {
            $dado1 = rand(1, 6); 
            echo "Sentencia del primer dado incluyendo el valor $dado1 en la tirada $primero<br>";

            for ($segundo = 1; $segundo <= $dado1; $segundo++) {
                $dado2 = rand(1, 6); 
                echo "Sentencia del segundo dado incluyendo el valor $dado2<br>";
            }
        }
    ?>
    </pre>


    <h3>Ejercicio 3</h3>
    <pre>
    <?php
        $numero = 5; 
        $factorial = 1;
        for ($i = 1; $i <= $numero; $i++) {
            $factorial *= $i;
        }
        echo "El factorial de $numero es $factorial<br>";
    ?>
    </pre>
</body>
</html>
