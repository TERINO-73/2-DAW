<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acceso denegado.");
}

$host = 'localhost';
$dbname = 'lol';
$username = "dwes_prueba";
$password = "73373";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    if (empty($nombre) || empty($usuario) || empty($_POST['password']) || empty($email)) {
        die("Todos los campos son obligatorios.");
    }

    $sql = "INSERT INTO usuario (nombre, usuario, password, email) VALUES (:nombre, :usuario, :password, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nombre' => $nombre,
        'usuario' => $usuario,
        'password' => $password,
        'email' => $email,
    ]);


    echo "El usuario $nombre ha sido introducido en el sistema con la contraseña (oculta por seguridad).";
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>
