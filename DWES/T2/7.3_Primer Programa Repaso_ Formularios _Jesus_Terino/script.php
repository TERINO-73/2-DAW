<style>
    /* Estilo para el cuerpo, define tamaño de fuente */
    body {
        font-size: 20px; /* Faltaba px */
    }

    /* Clase container, define el estilo para los bloques de contenido */
    .container {
        background-color: #e1eeff; /* Color de fondo */
        width: fit-content; /* Ajuste automático del ancho */
        padding: .5em; /* Espaciado interno */
        border-radius: 10px; /* Bordes redondeados */
        font-family: Arial, Helvetica, sans-serif; /* Tipografía */
        margin: 5px; /* Margen externo */
    }

</style>

<?php
// Ejercicio 1: Contar números pares e impares de una tirada de dados

$rollDiceNumber = rand(1, 10); // Genera entre 1 y 10 dados al azar
$evenNumbers = 0;
$oddNumbers = 0;

echo "<h2>Ejercicio 1</h2>";
echo "<div class='container'>";
echo "<b>$rollDiceNumber dados</b>";
echo "<br>";

// Loop para tirar los dados y contar pares e impares
for ($i = 0; $i < $rollDiceNumber; $i++) {
    $numeroAleatorio = rand(1, 6); // Número de cada dado
    echo "<img src='img/$numeroAleatorio.svg' alt='die'>"; // Imagen del dado
    if ($numeroAleatorio % 2 == 0) {
        $evenNumbers++; // Cuenta pares
    } else {
        $oddNumbers++; // Cuenta impares
    }
}
echo "<br>";
echo "Han salido $evenNumbers números pares y $oddNumbers número impar."; // Muestra el resultado
echo "</div>";

echo "<hr>"; // Separador

// Ejercicio 2: Juego del dado más alto
$firstPlayerDieNumber = rand(1, 6);
$secondPlayerDieNumber = rand(1, 6);

echo "<h2>Ejercicio 2</h2>";
echo "<p><b>Jugador 1:</b></p>";
echo "<img src='img/$firstPlayerDieNumber.svg' alt='die'>";
echo "<br>";
echo "<p><b>Jugador 2:</b></p>";
echo "<img src='img/$secondPlayerDieNumber.svg' alt='die'>";

// Comparación de los dados de los jugadores
if ($firstPlayerDieNumber > $secondPlayerDieNumber) {
    echo "<p>Ha ganado el jugador 1.</p>";
} elseif ($firstPlayerDieNumber < $secondPlayerDieNumber) {
    echo "<p>Ha ganado el jugador 2.</p>";
} else {
    echo "<p>Ha sido un empate.</p>";
}
echo "<hr>";

// Ejercicio 3: Comparar dados de dos jugadores en 4 rondas
$playerOne = array();
$playerTwo = array();
$winsPlayerOne = 0;
$winsPlayerTwo = 0;
$draws = 0;

echo "<h2>Ejercicio 3</h2>";
echo "<p>Jugador 1:</p>";

// Jugador 1 tira 4 dados
for ($i = 0; $i < 4; $i++) {
    $playerOne[$i] = rand(1, 6);
    echo "<img src='img/$playerOne[$i].svg' alt='die'>";
}
echo "<br>";
echo "<p>Jugador 2:</p>";

// Jugador 2 tira 4 dados
for ($i = 0; $i < 4; $i++) {
    $playerTwo[$i] = rand(1, 6);
    echo "<img src='img/$playerTwo[$i].svg' alt='die'>";
}

// Comparación de cada dado
for ($i = 0; $i < count($playerOne); $i++) {
    if ($playerOne[$i] > $playerTwo[$i]) {
        $winsPlayerOne++; // Gana Jugador 1
    } else if ($playerTwo[$i] > $playerOne[$i]) {
        $winsPlayerTwo++; // Gana Jugador 2
    } else {
        $draws++; // Empate
    }
}
echo "<br>";
echo "<h3>Resultado</h3>";
if ($draws == 4) {
    echo "<p>Han empatado siempre.</p>";
} else {
    echo "<p>El jugador 1 ha ganado <b>$winsPlayerOne</b> veces, el jugado 2 ha ganado <b>$winsPlayerTwo</b> veces y los jugadores han empatado <b>$draws</b> veces.</p>";
}
echo "<hr>";

// Ejercicio 4: Elimina un valor de una tirada de dados
$diceArray = array();
$removeNumber = rand(1, 6);

echo "<h2>Ejercicio 4</h2>";
echo "<div class='container'>";
echo "<p><b>Tirada de 6 dados</b></p>";
echo "<br>";

// Tirada de 6 dados
for ($i = 0; $i < 6; $i++) {
    $diceArray[$i] = rand(1, 6);
    echo "<img src='img/$diceArray[$i].svg' alt='die'>";
}

echo "<br>";
echo "<p><b>Dado a eliminar</b></p>";
echo "<img src='img/$removeNumber.svg' alt='die'>";
echo "<br>";

echo "<p><b>Dados restantes</b></p>";
// Muestra los dados que no sean iguales al que se eliminó
foreach ($diceArray as $dieNumber) {
    if ($dieNumber != $removeNumber) {
        echo "<img src='img/$dieNumber.svg' alt='die'>";
    }
}
echo "</div>";
?>

