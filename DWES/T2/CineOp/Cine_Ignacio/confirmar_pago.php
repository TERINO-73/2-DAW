<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Aquí podrías incluir la lógica para procesar el pago
// y enviar el correo con las entradas.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;
    $horario = isset($_POST['horario']) ? $_POST['horario'] : null;
    $asientos = isset($_POST['asientos']) ? explode(',', $_POST['asientos']) : [];

    if ($titulo && $horario && !empty($asientos)) {
        // Lógica de pago (simulada)
        // Por ejemplo, guardar los asientos en una sesión o enviar un correo
        // Se puede añadir lógica aquí si es necesario

        // Mostrar el mensaje de agradecimiento
        $mensaje = "Gracias por comprar en el cine de Jesús Terino Rodríguez.";
    } else {
        die("Falta información para confirmar el pago.");
    }
} else {
    die("Acceso no permitido.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Pago</title>
    <style>
        .mensaje {
            color: green;
            font-size: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Confirmación de Pago</h1>
    <p class="mensaje"><?php echo isset($mensaje) ? htmlspecialchars($mensaje) : ''; ?></p>
    <p>Película: <?php echo htmlspecialchars($titulo); ?></p>
    <p>Horario: <?php echo htmlspecialchars($horario); ?></p>
    <p>Asientos: <?php echo htmlspecialchars(implode(', ', $asientos)); ?></p>
</body>
</html>
