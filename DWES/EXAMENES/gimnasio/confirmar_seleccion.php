<?php
session_start();

// Depende de la acción del usuario ejecutar la función
// reservar_plaza() o liberar_plaza()

// Un usuario solo puede reservar una plaza en una clase
// y horario específicios sino lo ha hecho anteriormente.

// Y un usuario puede liberar una plaza de una clase y 
// de un horario específicos si ya ha realizado una
// reserva en dicho contexto previamente

require_once 'horario.php';

$clases = $_SESSION['horarios_clases'];

if (!isset($_SESSION['nombre_clase'])) {
    echo "No se ha seleccionado ninguna clase. Regresa a la página principal.";
} else {

    echo "<pre>";
    print_r($_SESSION['horarios_clases']);
    echo "</pre>";

    $clase = $_SESSION['nombre_clase'];
    $horario = $_SESSION['dato_horario'];

    if ($_SESSION['accion'] == "reservar") {
        $resultado_reserva = reservar_plaza($clase, $horario);

        if ($resultado_reserva == true) {
            echo "Se ha realizado la reserva con éxito";
        } else {
            echo "No se ha podido realizar la reserva. Es posible que usted ya haya reservado con anterioridad";
        }
    } else {
        $resultado_liberar = liberar_plaza($clase, $horario);

        if ($resultado_liberar == true) {
            echo "Se ha liberado la plaza reservada con éxito";
        } else {
            echo "No se ha podido liberar la plaza. Es posible que usted no haya reservado ninguna plaza";
        }
    }

    // Comprobar si el usuario hizo clic en el botón de descargar resumen
    if (isset($_POST['resumen'])) {
        // Crear el contenido del archivo
        $contenido = "Resumen de selección:\n\n";
        $contenido .= "Clase: $clase\n";
        $contenido .= "Horario: $horario\n";

        // Nombre del archivo de descarga
        $nombre_archivo = "resumen_seleccion.txt";

        // Configuración de las cabeceras para la descarga del archivo
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="' . $nombre_archivo . '"');
        header('Content-Length: ' . strlen($contenido));

        // Enviar el contenido del archivo al navegador
        echo $contenido;

        // Detener la ejecución del script para evitar que el HTML adicional se envíe después
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <p>Clase reservada: <?= $_SESSION['nombre_clase'] ?></p>
    <p>Clase reservada: <?= $_SESSION['dato_horario'] ?></p>
    <form action="confirmar_seleccion.php" method="post">
        <input type="submit" name="resumen" value="Descargar resumen">
    </form>
    <a href="main.php">Volver al inicio</a>
</body>

</html>