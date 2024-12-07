<?php

// Ejercicio 1: Formularios Básicos con Método GET y POST
echo "<h1>Ejercicio 1: Formularios Básicos con Método GET y POST</h1>";
echo '<form action="procesar.php" method="get">
        Nombre: <input type="text" name="nombre"><br>
        Email: <input type="email" name="email"><br>
        Edad: <input type="number" name="edad"><br>
        <input type="submit" value="Enviar">
      </form>';

echo "<hr>";

// Ejercicio 2: Uso de Distintos Controles de Formulario
echo "<h1>Ejercicio 2: Uso de Distintos Controles de Formulario</h1>";
echo '<form action="procesar.php" method="post">
        Texto: <input type="text" name="texto"><br>
        Contraseña: <input type="password" name="password"><br>
        Comentarios: <textarea name="comentarios"></textarea><br>
        ¿Te gusta el PHP? <input type="checkbox" name="gusta_php"><br>
        Género: 
        <input type="radio" name="genero" value="masculino"> Masculino
        <input type="radio" name="genero" value="femenino"> Femenino<br>
        País: 
        <select name="pais">
          <option value="españa">España</option>
          <option value="mexico">México</option>
        </select><br>
        <input type="submit" value="Enviar">
      </form>';

echo "<hr>";

// Ejercicio 3: Manejo de Archivos con input type='file'
echo "<h1>Ejercicio 3: Manejo de Archivos</h1>";
echo '<form action="procesar.php" method="post" enctype="multipart/form-data">
        Selecciona un archivo: <input type="file" name="archivo"><br>
        <input type="submit" value="Subir archivo">
      </form>';

echo "<hr>";

// Ejercicio 4: Formulario con Múltiples Botones de Envío
echo "<h1>Ejercicio 4: Formulario con Múltiples Botones de Envío</h1>";
echo '<form action="procesar.php" method="post">
        <input type="submit" name="accion" value="Guardar">
        <input type="submit" name="accion" value="Cancelar">
      </form>';

echo "<hr>";

// Ejercicio 5: Validación de Campos y Gestión de Errores
echo "<h1>Ejercicio 5: Validación de Campos y Gestión de Errores</h1>";
echo '<form action="procesar.php" method="post">
        Nombre: <input type="text" name="nombre"><br>
        Email: <input type="email" name="email"><br>
        <input type="submit" value="Enviar">
      </form>';

echo "<hr>";

// Ejercicio 6: Comprobación de números con is_numeric() y ctype_digit()
echo "<h1>Ejercicio 6: Comprobación de Números</h1>";
echo '<form action="procesar.php" method="post">
        Número: <input type="text" name="numero"><br>
        <input type="submit" value="Comprobar">
      </form>';

echo "<hr>";

// Ejercicio 7: Comprobación de tipos de datos con funciones is_
echo "<h1>Ejercicio 7: Comprobación de Tipos de Datos</h1>";
echo '<form action="procesar.php" method="post">
        Valor: <input type="text" name="valor"><br>
        <input type="submit" value="Comprobar Tipo">
      </form>';

echo "<hr>";

// Ejercicio 8: Validación con funciones ctype_
echo "<h1>Ejercicio 8: Validación con ctype_</h1>";
echo '<form action="procesar.php" method="post">
        Valor: <input type="text" name="valor"><br>
        <input type="submit" value="Validar">
      </form>';

echo "<hr>";

// Ejercicio 9: Validación con filter_var()
echo "<h1>Ejercicio 9: Validación con filter_var()</h1>";
echo '<form action="procesar.php" method="post">
        Email: <input type="text" name="email"><br>
        URL: <input type="text" name="url"><br>
        <input type="submit" value="Validar">
      </form>';

?>