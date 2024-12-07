<?php
session_start();
include 'funciones.php';

$pelicula_id = $_GET['pelicula_id'];
$horario = $_GET['horario'];
$asientosOcupados = obtenerAsientosOcupados($pelicula_id, $horario);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seleccionar Asientos</title>
    <style>
        .ocupado {
            background-color: red;
            color: white;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <h1>Selecciona tus Asientos</h1>
    <form action="pago.php" method="post">
        <?php for ($fila = 1; $fila <= 5; $fila++): ?>
            <div>
                <?php for ($columna = 1; $columna <= 6; $columna++): ?>
                    <?php $ocupado = in_array("$fila-$columna", $asientosOcupados) ? 'ocupado' : ''; ?>
                    <button type="submit" name="asientos[]" value="<?php echo "$fila-$columna"; ?>" class="<?php echo $ocupado; ?>" <?php if ($ocupado) echo 'disabled'; ?>>
                        <?php echo "$fila-$columna"; ?>
                    </button>
                <?php endfor; ?>
            </div>
        <?php endfor; ?>
        <input type="hidden" name="pelicula_id" value="<?php echo $pelicula_id; ?>">
        <input type="hidden" name="horario" value="<?php echo $horario; ?>">
    </form>
</body>
</html>
