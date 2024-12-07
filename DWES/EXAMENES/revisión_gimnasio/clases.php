


<!DOCTYPE html>
<html>
<head>
    <title>Gimnasio Iron Forge</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <?php
if (!isset($_GET['id_clase'])) {
    echo "No se ha seleccionado una Sesion. Regresa a la página principal.";
    exit();
}
$id_clase = $_GET['id_clase'];  // Obtener el ID de la película seleccionada

if($id_clase =='yoga'){
    echo "<img src='Yoga.jpg'>";
    echo "<p>Complementa tu rutina de gimnasio con yoga. Aumenta tu fuerza y resistencia de una manera diferente, mejora tu postura y alineación, y reduce el riesgo de lesiones. El yoga te ayudará a esculpir músculos y a ganar flexibilidad de una forma más suave y consciente.</p>";
}
if($id_clase =='zumba'){
    echo "<img src='zumba.jpg'>";
    echo "<p>¡Tonifica tu cuerpo y mejora tu condición física mientras te mueves al ritmo de la música! La Zumba es una forma divertida y efectiva de quemar calorías, fortalecer tus músculos y mejorar tu coordinación. ¡Olvídate de la monotonía y descubre una nueva forma de entrenar!.";
}
if($id_clase == 'crossfit'){
    echo "<img src='crossfit.jpg'>";
    echo "<p>¿Buscas un entrenamiento que te desafíe al máximo y te haga sentir como un auténtico atleta? ¡Nuestras clases de CrossFit son para ti! Combina ejercicios funcionales de alta intensidad con movimientos olímpicos, fortaleciendo todo tu cuerpo y mejorando tu resistencia, fuerza y agilidad. ¡Prepárate para sudar, quemar calorías y alcanzar tus metas de fitness más rápido que nunca!.</p>";
}
?>
    </header>
    <nav>
        <?php 
        include 'horario.php';
        
        foreach ($clases_gimnasio[$id_clase]as $clase) {
            echo "<p><a href='procesar_formulario.php?clase=" . $clases_gimnasio[$id_clase[0]] . "'>" . $clases_gimnasio[$id_clase[0]] . "</a></p>";
        }
        ?>

    </nav>

<nav></nav>
</body>
</html>

