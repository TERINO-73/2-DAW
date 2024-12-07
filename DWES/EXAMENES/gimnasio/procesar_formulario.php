<?php
session_start();

include 'horario.php';

// Recogemos el dato seleccionado por el usuario en el formulario.
// El usuario ha elegido entre los diferentes options de un select.
// Cada option contenía un value, que es recogido en la variable
$clase = $_GET['clase'];
$horario = $_GET['horario'];
$accion = $_GET['accion'];

// $_SESSION['nombre_clase'] => se trata de una variable que se 
// va a guardar durante toda la sesión del usuario. La variable
// podrá ser llamada en cualquier página que tenga iniciada una 
// sesión.
$_SESSION['nombre_clase'] = $clase;
$_SESSION['dato_horario'] = $horario;
$_SESSION['accion'] = $accion;

if ($accion == "anular reserva") {
    echo "Usted quiere anular una reserva";
} else {
    echo "Usted quiere realizar una reserva";
}
echo "<br>";
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
    <?= "Día: $_SESSION[dato_horario] <br> 
        Clase: $_SESSION[nombre_clase] <br><br>" ?>
    <form action="confirmar_seleccion.php" method="post">
        <input style="text-transform: capitalize" type="submit" name="confimar" value="confirmar">
    </form>
    <form action="eliminar_seleccion.php" method="post">
        <input style="text-transform: capitalize" type="submit" name="anular" value="anular seleccion">
    </form>
</body>

</html>