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
if (!isset($_GET['dia_clase'])) {
    echo "No se ha seleccionado una Sesion. Regresa a la página principal.";
    exit();
}
$nombre_clase = $_GET['nombre_clase'];  // Obtener el ID de la película seleccionada
$dia_clase = $_GET['dia_clase'];  // Obtener el ID de la película seleccionada

?>
    </header>
    <nav>
        <?php 
        include 'horario.php';
        
        foreach ($clases_gimnasio[$nombre_clase] as $clase) {
            
                    echo "<a href='procesar_formulario.php?nombre_clase=$nombre_clase&dia_clase=$dia_clase&hora_clase=".$clase['hora']."&reserva_libera=$reserva_libera'>¿Confirma la reserva para la clase de $nombre_clase  el $dia_clase a las ".$clase['hora']."</a><br/><br/>";
                
                    exit;
            }
        
        ?>

    </nav>

</body>
</html>

