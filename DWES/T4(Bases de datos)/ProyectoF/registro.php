<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <form action="nuevoUsuario.php" method="POST">
        <label>Nombre: <input type="text" name="nombre" required></label><br>
        <label>Usuario: <input type="text" name="usuario" required></label><br>
        <label>Contraseña: <input type="password" name="password" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
