<?php
if (isset($_POST['tamano'], $_POST['matriz'], $_POST['fila'], $_POST['columna'], $_POST['direccion'])) {
    $tamano = intval($_POST['tamano']);
    $matriz = $_POST['matriz']; 
    $fila = intval($_POST['fila']); 
    $columna = intval($_POST['columna']); 
    $direccion = $_POST['direccion']; 

    $trayectoria = [];

    // Definir los movimientos posibles según la dirección
    $movimientos = [
        'arriba' => [-1, 0], 
        'abajo' => [1, 0],
        'izquierda' => [0, -1], 
        'derecha' => [0, 1],
        'arriba-izquierda' => [-1, -1], 
        'arriba-derecha' => [-1, 1],
        'abajo-izquierda' => [1, -1], 
        'abajo-derecha' => [1, 1]
    ];

    list($mov_fila, $mov_col) = $movimientos[$direccion];

  
    while ($fila >= 0 && $fila < $tamano && $columna >= 0 && $columna < $tamano) {
        $trayectoria[] = $matriz[$fila][$columna];
        $fila += $mov_fila; 
        $columna += $mov_col; 
    }


    echo "<h2>Trayectoria de los elementos desde ($fila, $columna) hacia '$direccion':</h2>";
    if (count($trayectoria) > 0) {
        echo "<ul>";
        foreach ($trayectoria as $elemento) {
            echo "<li>$elemento</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No hay elementos en la trayectoria.</p>";
    }
    echo '<br><a href="PROYECTO_ Formularios _Jesus_Terino2.php">Volver al formulario</a>';

} else {
    echo "Datos incompletos.";
    echo '<br><a href="PROYECTO_ Formularios _Jesus_Terino2.php">Volver al formulario</a>';

}
?>


