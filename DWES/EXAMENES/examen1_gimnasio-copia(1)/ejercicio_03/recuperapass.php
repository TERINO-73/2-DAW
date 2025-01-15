<?php
// recuperar_password.php
require_once '../útiles/config.php';
require_once '../útiles/funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    // Verificar si el correo existe en la base de datos
    $conexion = conectarPDO($database);
    $query = "SELECT id FROM usuarios WHERE email = :email";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $token = bin2hex(random_bytes(16));
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Guardar el token en la base de datos
        $update = "UPDATE usuarios SET token = :token, token_expiry = :expiry WHERE email = :email";
        $stmtUpdate = $conexion->prepare($update);
        $stmtUpdate->bindParam(':token', $token);
        $stmtUpdate->bindParam(':expiry', $expiry);
        $stmtUpdate->bindParam(':email', $email);
        $stmtUpdate->execute();

        // Enviar correo
        $resetLink = "http://example.com/restablecer_password.php?token=$token";
        $subject = "Recuperación de contraseña";
        $message = "<p>Haz clic en el siguiente enlace para restablecer tu contraseña:</p><a href='$resetLink'>$resetLink</a>";
        mail($email, $subject, $message, "Content-type: text/html; charset=utf-8");

        echo "<p>Se ha enviado un correo electrónico con instrucciones para restablecer tu contraseña.</p>";
    } else {
        echo "<p>No se encontró ningún usuario con ese correo electrónico.</p>";
    }
}
?>

<form method="POST" action="">
    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Enviar</button>
</form>