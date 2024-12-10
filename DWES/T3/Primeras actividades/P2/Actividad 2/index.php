<?php 
require_once 'Producto.php';
// Crear un nuevo producto
$producto1 = new Producto(1, "Camiseta", 19.99, 10);

// Intentar vender 5 unidades
if ($producto1->disminuirStock(5)) {
    echo "Venta realizada con éxito.";
} else {
    echo "No hay suficiente stock.";
}





?>