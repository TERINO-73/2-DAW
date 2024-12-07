<?php
session_start();

// Temporizador de inactividad de 10 minutos
$inactivityLimit = 600;
if (isset($_SESSION['timeout']) && (time() - $_SESSION['timeout']) > $inactivityLimit) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
$_SESSION['timeout'] = time();

// Actualizar cantidad de productos en el carrito
if (isset($_POST['update_id']) && isset($_POST['update_cantidad']) && isset($_SESSION['carrito'][$_POST['update_id']])) {
    $id = $_POST['update_id'];
    $cantidad = max(1, intval($_POST['update_cantidad'])); // Asegura que la cantidad sea al menos 1
    $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
    header("Location: carrito.php");
    exit();
}

// Eliminar producto del carrito
if (isset($_GET['remove']) && isset($_SESSION['carrito'][$_GET['remove']])) {
    unset($_SESSION['carrito'][$_GET['remove']]);
    header("Location: carrito.php");
    exit();
}

// Realizar compra (vaciar el carrito)
if (isset($_GET['comprar'])) {
    $_SESSION['carrito'] = [];
    header("Location: carrito.php?mensaje=compra");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Tu Carrito</h1>

    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'compra'): ?>
        <p>¡Compra realizada con éxito!</p>
    <?php endif; ?>

    <?php if (!empty($_SESSION['carrito'])): ?>
        <ul>
            <?php foreach ($_SESSION['carrito'] as $id => $producto): ?>
                <li>
                    <?= $producto["nombre"] ?> - $<?= number_format($producto["precio"], 2) ?> x <?= $producto["cantidad"] ?>
                    = $<?= number_format($producto["precio"] * $producto["cantidad"], 2) ?>
                    <form action="carrito.php" method="post" style="display: inline;">
                        <input type="hidden" name="update_id" value="<?= $id ?>">
                        <input type="number" name="update_cantidad" min="1" value="<?= $producto['cantidad'] ?>" required>
                        <button type="submit">Actualizar cantidad</button>
                    </form>
                    <a href="?remove=<?= $id ?>">Eliminar</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <p>Total: $<?= number_format(array_sum(array_map(function($producto) {
            return $producto['precio'] * $producto['cantidad'];
        }, $_SESSION['carrito'])), 2) ?></p>

        <a href="?comprar=true">Realizar Compra</a>
    <?php else: ?>
        <p>Tu carrito está vacío.</p>
    <?php endif; ?>

    <a href="index.php">Volver a productos</a>
</body>
</html>
