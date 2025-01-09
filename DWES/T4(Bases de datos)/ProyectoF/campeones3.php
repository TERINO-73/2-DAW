<?php
$host = 'localhost';
$dbname = 'lol';
$username = "dwes_prueba";
$password = "73373";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ordenar según los parámetros en la URL
    $columna = $_GET['columna'] ?? 'id';
    $orden = $_GET['orden'] ?? 'ASC';

    // Validar entradas
    $columnasValidas = ['id', 'nombre', 'rol', 'dificultad', 'descripcion'];
    $ordenesValidos = ['ASC', 'DESC'];

    if (!in_array($columna, $columnasValidas) || !in_array($orden, $ordenesValidos)) {
        die("Parámetros inválidos.");
    }

    $sql = "SELECT id, nombre, rol, dificultad, descripcion FROM campeon ORDER BY $columna $orden";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

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
    <table border="1">
        <thead>
            <tr>
                <th>
                    ID
                    <a href="?columna=id&orden=ASC">˄</a>
                    <a href="?columna=id&orden=DESC">˅</a>
                </th>
                <th>
                    Nombre
                    <a href="?columna=nombre&orden=ASC">˄</a>
                    <a href="?columna=nombre&orden=DESC">˅</a>
                </th>
                <th>
                    Rol
                    <a href="?columna=rol&orden=ASC">˄</a>
                    <a href="?columna=rol&orden=DESC">˅</a>
                </th>
                <th>
                    Dificultad
                    <a href="?columna=dificultad&orden=ASC">˄</a>
                    <a href="?columna=dificultad&orden=DESC">˅</a>
                </th>
                <th>
                    Descripción
                    <a href="?columna=descripcion&orden=ASC">˄</a>
                    <a href="?columna=descripcion&orden=DESC">˅</a>
                </th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($campeones as $campeon): ?>
                <tr>
                    <td><?php echo $campeon['id']; ?></td>
                    <td><?php echo $campeon['nombre']; ?></td>
                    <td><?php echo $campeon['rol']; ?></td>
                    <td><?php echo $campeon['dificultad']; ?></td>
                    <td><?php echo $campeon['descripcion']; ?></td>
                    <td>
                        <a href="editando.php?id=<?php echo $campeon['id']; ?>">Editar</a>
                        <a href="borrar.php?id=<?php echo $campeon['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas borrar a <?php echo htmlspecialchars($campeon['nombre']); ?>?');">Borrar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="registro.php?id=<?php echo $campeon['id']; ?>">nuevoUsuario</a>

</body>
</html>
