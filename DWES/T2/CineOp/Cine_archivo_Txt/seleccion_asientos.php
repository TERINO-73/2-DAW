<?php
session_start();
include 'funciones.php';

// Inicializar los asientos
$filas = 5;
$columnas = 6;

// Verificar si hay asientos ocupados
$asientosOcupados = obtenerAsientosOcupados();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['asientos'])) {
    $asientosSeleccionados = $_POST['asientos'];
    guardarAsientosOcupados($asientosSeleccionados);
    header('Location: pago.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Selección de Asientos</title>
</head>
<body>
    <h1>Seleccione sus Asientos</h1>
    <form method="POST" action="">
        <table>
            <?php for ($i = 0; $i < $filas; $i++): ?>
                <tr>
                    <?php for ($j = 0; $j < $columnas; $j++): ?>
                        <?php
                        $asiento = "F" . ($i + 1) . "C" . ($j + 1);
                        $ocupado = in_array($asiento, $asientosOcupados) ? 'disabled' : '';
                        ?>
                        <td>
                            <label>
                                <input type="checkbox" name="asientos[]" value="<?= $asiento ?>" <?= $ocupado ?>> <?= $asiento ?>
                            </label>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
        <button type="submit">Confirmar Asientos</button>
    </form>
</body>
</html>
