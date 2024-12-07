<!DOCTYPE html>
<html>

<head>
    <title>Gimnasio Iron Forge</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <?php
        if (!isset($_GET['nombre_clase'])) {
            echo "No se ha seleccionado una Sesion. Regresa a la página principal.";
            exit();
        }
        $nombre_clase = $_GET['nombre_clase'];  // Obtener el ID de la película seleccionada

        if ($nombre_clase == 'yoga') {
            echo "<img src='Yoga.jpg'>";
            echo "<p>Complementa tu rutina de gimnasio con yoga. Aumenta tu fuerza y resistencia de una manera diferente, mejora tu postura y alineación, y reduce el riesgo de lesiones. El yoga te ayudará a esculpir músculos y a ganar flexibilidad de una forma más suave y consciente.</p>";
        }
        if ($nombre_clase == 'zumba') {
            echo "<img src='zumba.jpg'>";
            echo "<p>¡Tonifica tu cuerpo y mejora tu condición física mientras te mueves al ritmo de la música! La Zumba es una forma divertida y efectiva de quemar calorías, fortalecer tus músculos y mejorar tu coordinación. ¡Olvídate de la monotonía y descubre una nueva forma de entrenar!.";
        }
        if ($nombre_clase == 'crossfit') {
            echo "<img src='crossfit.jpg'>";
            echo "<p>¿Buscas un entrenamiento que te desafíe al máximo y te haga sentir como un auténtico atleta? ¡Nuestras clases de CrossFit son para ti! Combina ejercicios funcionales de alta intensidad con movimientos olímpicos, fortaleciendo todo tu cuerpo y mejorando tu resistencia, fuerza y agilidad. ¡Prepárate para sudar, quemar calorías y alcanzar tus metas de fitness más rápido que nunca!.</p>";
        }
        ?>
    </header>
    <nav>
        <?php
        include 'horario.php';

        $i = 1;

        foreach ($clases_gimnasio[$nombre_clase] as $clase => $valor) {
            foreach ($clases_gimnasio[$nombre_clase] as $clase_i) {
                if ($i != 0) {
                    echo "<a href='confirmo.php?nombre_clase=$nombre_clase&dia_clase=$clase'>Reserva para clase de $nombre_clase  el dia $clase a las " . $clase_i['hora'] . " </a><br/><br/>";

                }

            }

        }

        ?>

    </nav>

    <nav></nav>
</body>

</html>