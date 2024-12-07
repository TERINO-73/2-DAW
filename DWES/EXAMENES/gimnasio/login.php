<?php
session_start();
session_regenerate_id();

require_once 'horario.php';

$usuarios = array(
    'admin' => 'admin',
    'usuario' => 'usuario'
);

if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $contrasena) {
        $_SESSION['usuario'] = $usuario;
        inicializar_horario();
        header('Location: main.php');
        exit;
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>