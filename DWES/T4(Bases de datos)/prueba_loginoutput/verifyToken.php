<?php
session_start();

$mysql = "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
$user = "dwes_manana";
$password = "dwes_2024";

try {
    $conexion = new PDO($mysql, $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

// Verificar si el token llega en la URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Buscar el token en la base de datos
    $stmt = $conexion->prepare("SELECT email FROM usuarios_recuperacion WHERE token = :token AND expiracion > NOW()");
    $stmt->bindParam(':token', $token);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        $email = $usuario['email'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nueva_contrasena'])) {
            $nuevaContrasena = password_hash($_POST['nueva_contrasena'], PASSWORD_BCRYPT);

            // Actualizar la contraseña en la base de datos
            $updateStmt = $conexion->prepare("UPDATE usuarios SET contrasena = :contrasena WHERE email = :email");
            $updateStmt->bindParam(':contrasena', $nuevaContrasena);
            $updateStmt->bindParam(':email', $email);

            if ($updateStmt->execute()) {
                // Eliminar el token usado
                $deleteStmt = $conexion->prepare("DELETE FROM usuarios_recuperacion WHERE token = :token");
                $deleteStmt->bindParam(':token', $token);
                $deleteStmt->execute();

                // Mostrar mensaje y redirigir tras 3 segundos
                echo "<p>Contraseña actualizada correctamente. Redirigiendo al inicio de sesión...</p>";
                echo "<script>
                        setTimeout(function() {
                            window.location.href = 'loginBásico.php';
                        }, 3000);
                      </script>";
                exit; // Detener ejecución para evitar mostrar el formulario
            } else {
                echo "<p>Error al actualizar la contraseña.</p>";
            }
        }
        ?>

        <!-- Formulario para cambiar la contraseña -->
        <form method="POST">
            <label for="nueva_contrasena">Introduce tu nueva contraseña</label>
            <input type="password" name="nueva_contrasena" placeholder="Nueva Contraseña" required>
            <input type="submit" value="Cambiar">
        </form>

        <?php
    } else {
        echo "<p>El token es inválido o ha expirado.</p>";
    }
} else {
    echo "<p>No se proporcionó un token válido.</p>";
}
?>