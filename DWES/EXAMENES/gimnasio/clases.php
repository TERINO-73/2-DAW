<?php
session_start();

require_once 'horario.php';

$clases = $_SESSION['horarios_clases'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php foreach ($clases as $clase => $valor): ?>
        <h1 style="text-transform: capitalize"><?= $clase ?></h1>
        <?php
        switch ($clase):
            case "yoga":
                echo "<section class='actividad'>
            <h2>Clase de Yoga</h2>
            <img src='yoga.jpg' alt='Postura de Yoga by Miguel CC BY-SA 2.0'>
            <p>
             Complementa tu rutina de gimnasio con yoga. Aumenta tu fuerza y resistencia de una manera diferente,
             mejora tu postura y alineación, y reduce el riesgo de lesiones.
             El yoga te ayudará a esculpir músculos y a ganar flexibilidad de una forma más suave y consciente.
            </p>
            </section>";
                break;

            case "zumba":
                echo "<section class='actividad'>
                <h2>Clase de Zumba</h2>
                <img src='zumba.jpg' alt='Zumba by Claude PERON CC BY-SA 3.0'>
                <p>¡Tonifica tu cuerpo y mejora tu condición física mientras te mueves al ritmo de la música! La Zumba es una forma divertida y efectiva de quemar calorías, fortalecer tus músculos y mejorar tu coordinación. ¡Olvídate de la monotonía y descubre una nueva forma de entrenar!.</p>
            </section>";
                break;

            case "crossfit":
                echo "<section class='actividad'>
                <h2>Clase de Crossfit</h2>
                <img src='crossfit.jpg' alt='Clase de Crossfit'>
                <p>¿Buscas un entrenamiento que te desafíe al máximo y te haga sentir como un auténtico atleta? ¡Nuestras clases de CrossFit son para ti! Combina ejercicios funcionales de alta intensidad con movimientos olímpicos, fortaleciendo todo tu cuerpo y mejorando tu resistencia, fuerza y agilidad. ¡Prepárate para sudar, quemar calorías y alcanzar tus metas de fitness más rápido que nunca!.</p>
            </section>";
                break;

        endswitch; ?>
        <form action="procesar_formulario.php" method="get">
            <!-- Utilizo un botón que no se mostrará en la página para enviar 
            la información de qué clase ha seleccionado el usuario un horario -->
            <input type="hidden" name="clase" value="<?= $clase ?>">
            <select name="horario">
                <?php foreach ($valor as $horario => $datosHorario): ?>
                    <option value="<?= $horario ?>" value="<?= $clase ?>"><?= $horario ?></option>
                <?php endforeach; ?>
            </select>
            <input style="text-transform: capitalize" type="submit" name="accion" value="reservar">
            <input style="text-transform: capitalize" type="submit" name="accion" value="anular reserva">
        </form>
    <?php endforeach; ?>
</body>

</html>