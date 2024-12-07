<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Código de registro de usuarios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aquí iría la lógica para registrar al usuario
    // Por simplicidad, solo almacenaremos el nombre en la sesión
    $_SESSION['usuario_nombre'] = $_POST['nombre'];
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
