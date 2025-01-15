<?php 

require_once("../utiles/config.php");
require_once("../utiles/funciones.php");

// Comprobar si el parámetro 'tenista_id' está en la URL
if (isset($_GET['tenista_id'])) {
    $tenista_id = $_GET['tenista_id'];

    // Conexión a la base de datos
    $conexion = conectarPDO($database);

    // Consulta SQL para obtener los torneos ganados por el tenista
    $sql = "
        SELECT t.nombre AS torneo, t.ciudad, s.nombre AS superficie, tt.anno
        FROM titulos tt
        INNER JOIN torneos t ON tt.torneo_id = t.id
        INNER JOIN superficies s ON t.superficie_id = s.id
        WHERE tt.tenista_id = ?
        ORDER BY tt.anno DESC;
    ";

    // Preparar la consulta
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(1, $tenista_id, PDO::PARAM_INT);
    $stmt->execute();

    // Obtener el resultado de la consulta
    $torneos_ganados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Cerrar la conexión
    $conexion = null;
} else {
    // Si no se pasa el parámetro 'tenista_id', redirigir al listado de tenistas
    header("Location: listado_tenistas.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de torneos del tenista</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h1>Listado de torneos ganados por un tenista</h1>

    <?php if (!empty($torneos_ganados)): ?>
        <h2>Torneos ganados:</h2>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Torneo</th>
                    <th>Ciudad</th>
                    <th>Superficie</th>
                    <th>Año</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($torneos_ganados as $torneo): ?>
                    <tr>
                        <td><?php echo $torneo['torneo']; ?></td>
                        <td><?php echo $torneo['ciudad']; ?></td>
                        <td><?php echo $torneo['superficie']; ?></td>
                        <td><?php echo $torneo['anno']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>El tenista no ha ganado torneos.</p>
    <?php endif; ?>

    <div class="contenedor">
        <div class="enlaces">
            <a href="listado_tenistas.php">Volver al listado de tenistas</a>
        </div>
    </div>
</body>
</html>