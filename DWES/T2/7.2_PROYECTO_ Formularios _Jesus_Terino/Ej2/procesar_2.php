<?php
if (isset($_POST['tamano'])) {
    $tamano = intval($_POST['tamano']);

    // Verificar si el tamaño está entre 1 y 10
    if ($tamano < 1 || $tamano > 10) {
        echo "Por favor, ingrese un número entre 1 y 10.";
        echo '<br><a href="PROYECTO_ Formularios _Jesus_Terino2.php">Volver al formulario</a>';
        exit();
    }
    
    echo '<form action="procesar2_2.php" method="post">
            <table>';

    // Generar la matriz de casillas de texto
    for ($i = 0; $i < $tamano; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $tamano; $j++) {
            echo '<td><input type="text" name="matriz['.$i.']['.$j.']" required></td>';
        }
        echo "</tr>";
    }

    echo '  </table>
            <label for="fila">Fila:</label>
            <select id="fila" name="fila">';
    
    // Generar opciones de selección de filas
    for ($i = 0; $i < $tamano; $i++) {
        echo "<option value=\"$i\">$i</option>";
    }

    echo '</select>
          <label for="columna">Columna:</label>
          <select id="columna" name="columna">';

    // Generar opciones de selección de columnas
    for ($j = 0; $j < $tamano; $j++) {
        echo "<option value=\"$j\">$j</option>";
    }
    //HTML
    echo '</select>
          <label for="direccion">Dirección:</label>
          <select id="direccion" name="direccion">
              <option value="arriba">Arriba</option>
              <option value="abajo">Abajo</option>
              <option value="izquierda">Izquierda</option>
              <option value="derecha">Derecha</option>
              <option value="arriba-izquierda">Arriba e izquierda</option>
              <option value="arriba-derecha">Arriba y derecha</option>
              <option value="abajo-izquierda">Abajo e izquierda</option>
              <option value="abajo-derecha">Abajo y derecha</option>
          </select>
          <input type="hidden" name="tamano" value="'.$tamano.'">
          <input type="submit" value="Ver Trayectoria">
          </form>';
}
?>


