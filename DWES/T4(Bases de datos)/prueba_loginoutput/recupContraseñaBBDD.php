<?php
// Conexión a la base de datos
$mysql = "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
$user = "dwes_manana";
$password = "dwes_2024";

try {
    $conexion = new PDO($mysql, $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

// Verificar si se ha enviado el correo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Validar el formato del correo
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, ingresa un correo electrónico válido.";
    } else {
        // Generar el token seguro
        $tokenSeguro = bin2hex(openssl_random_pseudo_bytes(16));
        $expiracion = date("Y-m-d H:i:s", strtotime("+1 day"));  // El token expira en 1 día

        // Guardar el token en la base de datos
        $stmt = $conexion->prepare("INSERT INTO usuarios_recuperacion (email, token, expiracion) VALUES (:email, :token, :expiracion)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':token', $tokenSeguro);
        $stmt->bindParam(':expiracion', $expiracion);

        if ($stmt->execute()) {
            // Enviar el correo
            $mensaje = "
            <html>
            <head><title>Recupera tu contraseña</title></head>
            <body>
            <a href=\"http://localhost/clase/DWES/Login/verifyToken.php?token=$tokenSeguro\">Pulsa aquí para cambiar tu contraseña</a>
            </body>
            </html>
            ";

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=utf-8\r\n";
            $headers .= "From: dwes@php.com\r\n";

            if (mail($email, 'Recuperar contraseña', $mensaje, $headers)) {
                echo "Correo enviado correctamente a $email.";
            } else {
                echo "Error al enviar el correo.";
            }
        } else {
            echo "Error al guardar el token en la base de datos.";
        }
    }
} else {
    // Mostrar formulario de ingreso del correo
    echo '<form method="POST">
            <label for="email">Introduce tu correo electrónico:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Recuperar Contraseña">
          </form>';
}
?>