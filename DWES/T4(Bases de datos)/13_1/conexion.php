<?php
try{
    $mysql =
    "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
    $user = "dwes_manana";
    $password ="73373";
    $conexion = new PDO($mysql,$user,$password);
    echo "<p>Conectada a la BBDD</p>";
    echo "Drivers:";
    print_r(PDO::getAvailableDrivers());

} catch (PDOException $e) {
    // Mostramos el mensaje en caso de error
    echo "<p>" . $e->getMessage() . "</p>";
}
?>
