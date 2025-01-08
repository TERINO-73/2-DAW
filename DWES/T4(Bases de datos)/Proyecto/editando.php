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

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        // Obtener datos del campeón por ID
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM campeon WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $campeon = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$campeon) {
            die("Campeón no encontrado.");
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Actualizar datos del campeón
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $rol = $_POST['rol'];
        $dificultad = $_POST['dificultad'];
        $descripcion = $_POST['descripcion'];

        $stmt = $pdo->prepare("UPDATE campeon SET nombre = :nombre, rol = :rol, dificultad = :dificultad, descripcion = :descripcion WHERE id = :id");
        $stmt->execute([
            'nombre' => $nombre,
            'rol' => $rol,
            'dificultad' => $dificultad,
            'descripcion' => $descripcion,
            'id' => $id
        ]);

        header("Location: campeones2.php");
        exit;
    }
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando Campeón</title>
</head>
<body>
    <h1>Editando Campeón</h1>
    <form action="editando.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $campeon['id']; ?>">
        <label>Nombre: <input type="text" name="nombre" value="<?php echo $campeon['nombre']; ?>" required></label><br>
        <label>Rol: <input type="text" name="rol" value="<?php echo $campeon['rol']; ?>" required></label><br>
        <label>Dificultad: <input type="text" name="dificultad" value="<?php echo $campeon['dificultad']; ?>" required></label><br>
        <label>Descripción: <br><textarea name="descripcion" required><?php echo $campeon['descripcion']; ?></textarea></label><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
