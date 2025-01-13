<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Inicio de Sesión</h1>
    <?php
    // Función para conectar a la base de datos
    function conectarPDO(string $host, string $user, string $password, string $bbdd): PDO {
        try {
            $mysql = "mysql:host=$host;dbname=$bbdd;charset=utf8";
            $conexion = new PDO($mysql, $user, $password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }
        return $conexion;
    }

    // Configuración de conexión a la base de datos
    $host = "localhost";
    $user = "dwes_manana";
    $passwordDB = "dwes_2024";
    $bbdd = "dwes_manana_prueba";

    // Validar si se enviaron datos del formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $emailFormulario = isset($_POST['email']) ? $_POST['email'] : null;
        $contrasenaFormulario = isset($_POST['contrasena']) ? $_POST['contrasena'] : null;

        // Conectar a la base de datos
        $conexion = conectarPDO($host, $user, $passwordDB, $bbdd);

        // Buscar usuario en la base de datos
        $select = "SELECT email, contrasena FROM usuarios WHERE email = :email";
        $consulta = $conexion->prepare($select);
        $consulta->execute(['email' => $emailFormulario]);

        // Verificar si el usuario existe
        if ($consulta->rowCount() > 0) {
            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

            // Verificar la contraseña
            if (password_verify($contrasenaFormulario, $usuario['contrasena'])) {
                // Crear la sesión y redirigir al área privada
                session_name("sesion-privada");
                session_start();
                $_SESSION['email'] = $usuario['email'];

                header('Location: privado.php');
                exit();
            } else {
                echo '<p style="color: red">La contraseña es incorrecta.</p>';
            }
        } else {
            echo '<p style="color: red">El usuario no existe.</p>';
        }
    }
    ?>

    <!-- Formulario de inicio de sesión -->
    <form method="post">
        <p>
            <input type="text" name="email" placeholder="correo@del.usuario" required>
        </p>
        <p>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
        </p>
        <p>
            <input type="submit" value="Entrar">
        </p>
    </form>
    <a href="recupContraseñaBBDD.php" style="display: inline-block; margin: 10px; text-decoration: none; color: white; background-color: #007BFF; padding: 10px 20px; border-radius: 5px;">
   RECUPERAR CONTRASEÑA
</a>
<a href="registro.php" style="display: inline-block; margin: 10px; text-decoration: none; color: white; background-color: #28A745; padding: 10px 20px; border-radius: 5px;">
    REGISTRO
</a>
</body>
</html>
