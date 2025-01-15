<?php
// restablecer_password.php
require_once '../útiles/config.php';
require_once '../útiles/funciones.php';

if (!isset($_GET['token'])) {
    echo "<p>Token inválido.</p>";
    exit();
}

$token = $_GET['token'];
$conexion = conectarPDO($database);
$query = "SELECT id, token_expiry FROM usuarios WHERE token = :token";
$stmt = $conexion->prepare($query);
$stmt->bindParam(':token', $token);
$stmt->execute();

if ($stmt->rowCount() === 0) {
    echo "<p>Token inválido o expirado.</p>";
    exit();
}

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
if (strtotime($usuario['token_expiry']) < time()) {
    echo "<p>Token expirado.</p>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevaPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $update = "UPDATE usuarios SET password = :password, token = NULL, token_expiry = NULL WHERE id = :id";
    $stmtUpdate = $conexion->prepare($update);
    $stmtUpdate->bindParam(':password', $nuevaPassword);
    $stmtUpdate->bindParam(':id', $usuario['id']);
    $stmtUpdate->execute();

    echo "<p>Tu contraseña ha sido restablecida correctamente.</p>";
    exit();
}
?>

<form method="POST" action="">
    <label for="password">Nueva contraseña:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Restablecer</button>
</form>
