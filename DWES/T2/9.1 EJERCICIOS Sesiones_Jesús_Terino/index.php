<?php
session_start();

// Definir productos
$productos = [
    1 => ["nombre" => "Producto 1", "precio" => 10.00],
    2 => ["nombre" => "Producto 2", "precio" => 15.00],
    3 => ["nombre" => "Producto 3", "precio" => 20.00],
];

// Inicializar carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Temporizador de inactividad de 10 minutos
$inactivityLimit = 600;
if (isset($_SESSION['timeout']) && (time() - $_SESSION['timeout']) > $inactivityLimit) {
    session_unset();
    session_destroy();
    session_start();
}
$_SESSION['timeout'] = time();

// Agregar producto al carrito con cantidad específica
if (isset($_POST['id_producto']) && isset($productos[$_POST['id_producto']]) && isset($_POST['cantidad'])) {
    $id = $_POST['id_producto'];
    $cantidad = max(1, intval($_POST['cantidad'])); // Asegura que la cantidad sea al menos 1
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad'] += $cantidad;
    } else {
        $_SESSION['carrito'][$id] = [
            "nombre" => $productos[$id]["nombre"], 
            "precio" => $productos[$id]["precio"], 
            "cantidad" => $cantidad
        ];
    }
    exit(); // Evita más salida después de procesar
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <script>
        // Función para enviar formulario de producto usando fetch
        function agregarAlCarrito(idProducto) {
            const cantidadInput = document.getElementById('cantidad_' + idProducto);
            const cantidad = cantidadInput.value;

            // Enviar datos usando fetch
            fetch("index.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: "id_producto=" + idProducto + "&cantidad=" + cantidad
            })
            .then(response => {
                if (response.ok) {
                    // Restablecer el campo de cantidad solo para este producto
                    cantidadInput.value = 1;
                } 
                
            });
        }
    </script>
</head>
<body>
    <h1>Productos Disponibles</h1>
    <ul>
        <?php foreach ($productos as $id => $producto): ?>
            <li>
                <?= $producto["nombre"] ?> - $<?= number_format($producto["precio"], 2) ?>
                <input type="number" id="cantidad_<?= $id ?>" min="1" value="1" required>
                <button onclick="agregarAlCarrito(<?= $id ?>)">Agregar al carrito</button>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="carrito.php">Ver Carrito</a>
</body>
</html>
