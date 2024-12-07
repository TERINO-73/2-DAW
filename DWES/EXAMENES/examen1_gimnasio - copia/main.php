<!DOCTYPE html>
<html>
<head>
    <title>Gimnasio Iron Forge</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="logo.png" alt="Logo de Iron Forge">
        <h1>Donde se forjan las leyendas</h1>
    </header>
    <nav>
    <?php
// Simulación de las películas y sesiones disponibles
$clases = [
    ['id' => 'yoga'],
    ['id' => 'zumba'],
    ['id' => 'crossfit']
];

// Mostrar las películas

foreach ($clases as $clase) {
    echo "<a href='clases.php?nombre_clase=" . $clase['id'] . "'>" . $clase['id'] ."</a>"." ";
}
?>    </nav>

<nav><form action="index.php" method="post">

    <input type="submit" value="Cerrar Sesion">
</form></nav>

</body>
</html>

