<?php
session_start();

// Código de inicio de sesión (ejemplo simple)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aquí iría la lógica de inicio de sesión
    // Por simplicidad, asumimos que cualquier nombre es válido
    $_SESSION['usuario_nombre'] = $_POST['nombre'];
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
   
