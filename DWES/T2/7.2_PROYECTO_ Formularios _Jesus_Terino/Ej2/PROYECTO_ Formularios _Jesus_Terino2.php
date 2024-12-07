<?php
echo '<h2>Selecciona el tamaño de la matriz</h2>
    <form action="procesar_2.php" method="post">
        <label for="tamano">Tamaño de la matriz (1-10):</label>
        <input type="number" id="tamano" name="tamano" min="1" max="10" required>
        <input type="submit" value="Enviar">
    </form>';
?>

