<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$dbname = 'lol';
$username = "dwes_prueba";
$password = "73373"; // Cambia según la configuración de tu servidor

try {
    // Crear conexión PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar_id'])) {
        $borrarId = $_POST['borrar_id'];

        // Borrar el campeón de la base de datos que coincida con la ID.
        // Utilizamos $stmt para ejecutar consultas con la base de datos
        $sql = "DELETE FROM lol_manana WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $borrarId]);

        // Redirigir para evitar reenvío del formulario
        header("Location: campeones2.php");
        exit;
    }
    // Consulta para obtener todos los campeones
    $sql = "SELECT id, nombre, rol, dificultad, descripcion FROM campeon";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Obtener los resultados en un array asociativo
    $campeones = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Campeones</title>
</head>
<body>
    <h1>Lista de Campeones de League of Legends</h1>

    <?php foreach ($campeones as $campeon): ?>
        <p>
            ID: <?php echo $campeon['id']; ?>,<br>
            Nombre: <?php echo $campeon['nombre']; ?>,<br>
            Rol: <?php echo $campeon['rol']; ?>,<br>
            Dificultad: <?php echo $campeon['dificultad']; ?>,<br>
            Descripción: <?php echo $campeon['descripcion']; ?><br>
            <a href="editando.php?id=<?php echo $campeon['id']; ?>">Editar</a> |
            <a href="borrar.php?id=<?php echo $campeon['id']; ?>" onclick="return confirm('Estás seguro de que deseas borrar a <?php echo $campeon['nombre']; ?>?');">Borrar</a>
        </p>
        <hr>
    <?php endforeach; ?>

</body>
</html>