<?php

// Definir arrays para el inventario actual, proveedor A y proveedor B
$inventario_actual = [
    ["producto" => "Teclado", "precio" => 20, "categoria" => "Electrónica", "cantidad" => 4],
    ["producto" => "Ratón", "precio" => 15, "categoria" => "Electrónica", "cantidad" => 10],
    ["producto" => "Monitor", "precio" => 120, "categoria" => "Electrónica", "cantidad" => 3],
    ["producto" => "Silla", "precio" => 50, "categoria" => "Muebles", "cantidad" => 5],
];

$proveedor_a = [
    ["producto" => "Teclado", "precio" => 20, "categoria" => "Electrónica", "cantidad" => 20],
    ["producto" => "Ratón", "precio" => 15, "categoria" => "Iluminación", "cantidad" => 15],
    ["producto" => "Escritorio", "precio" => 50, "categoria" => "Muebles", "cantidad" => 2],
];

$proveedor_b = [
    ["producto" => "Monitor", "precio" => 92, "categoria" => "Electrónica", "cantidad" => 8],
    ["producto" => "Auriculares", "precio" => 30, "categoria" => "Electrónica", "cantidad" => 20],
    ["producto" => "Lámpara", "precio" => 20, "categoria" => "Iluminación", "cantidad" => 5],
];



// Comparar inventarios: array_diff
$productos_inventario_actual = array_column($inventario_actual, 'producto');
$productos_proveedor_a = array_column($proveedor_a, 'producto');
$diferencias_proveedor_a = array_diff($productos_inventario_actual, $productos_proveedor_a);

echo "<pre>Productos en inventario actual pero no en proveedor A:\n";
print_r($diferencias_proveedor_a);
echo "</pre>";

// Unir inventarios: array_merge
$inventario_combinado = array_merge($inventario_actual, $proveedor_a, $proveedor_b);
echo "<pre>Inventario combinado:\n";
print_r($inventario_combinado);
echo "</pre>";

// Eliminar productos duplicados: array_unique (basado en nombre del producto)
$productos = array_column($inventario_combinado, 'producto');
$productos_unicos = array_unique($productos);

$inventario_sin_duplicados = [];
foreach ($inventario_combinado as $item) {
    if (in_array($item['producto'], $productos_unicos)) {
        $inventario_sin_duplicados[] = $item;
        // Elimina el producto de la lista de productos únicos para evitar duplicados
        $productos_unicos = array_diff($productos_unicos, [$item['producto']]);
    }
}

echo "<pre>Inventario sin duplicados:\n";
print_r($inventario_sin_duplicados);
echo "</pre>";

// Contar productos por categorías: array_count_values
$categorias = array_column($inventario_sin_duplicados, 'categoria');
$conteo_categorias = array_count_values($categorias);

echo "<pre>Conteo de productos por categoría:\n";
print_r($conteo_categorias);
echo "</pre>";

// Ordenar productos por precio: asort
$precios = array_column($inventario_sin_duplicados, 'precio');
asort($precios);

$inventario_ordenado_por_precio = [];
foreach ($precios as $key => $precio) {
    $inventario_ordenado_por_precio[] = $inventario_sin_duplicados[$key];
}

echo "<pre>Inventario ordenado por precio (menor a mayor):\n";
print_r($inventario_ordenado_por_precio);
echo "</pre>";

// Buscar un producto específico en el inventario (ejemplo: "Teclado")
$nombre_buscado = "Teclado";
$producto_buscado = null;

foreach ($inventario_sin_duplicados as $producto) {
    if ($producto['producto'] == $nombre_buscado) {
        $producto_buscado = $producto;
        break;
    }
}

echo "<pre>Producto buscado ($nombre_buscado):\n";
print_r($producto_buscado);
echo "</pre>";

// Rellenar inventario con nuevos productos: array_fill
$nuevos_productos = array_fill(0, 3, ["producto" => "Nuevo producto", "precio" => 25, "categoria" => "Nuevos", "cantidad" => 1]);
$inventario_completo = array_merge($inventario_ordenado_por_precio, $nuevos_productos);

echo "<pre>Inventario con nuevos productos añadidos:\n";
print_r($inventario_completo);
echo "</pre>";

// Reindexar inventario: array_values
$inventario_reindexado = array_values($inventario_completo);

echo "<pre>Inventario reindexado:\n";
print_r($inventario_reindexado);
echo "</pre>";

// Dividir inventario en secciones: array_chunk
$inventario_seccionado = array_chunk($inventario_reindexado, 2);

echo "<pre>Inventario dividido en secciones de 2 productos:\n";
print_r($inventario_seccionado);
echo "</pre>";

// Generar informe del inventario
$informe_inventario = [];
foreach ($inventario_reindexado as $producto) {
    $informe_inventario[$producto['producto']] = [
        'precio' => $producto['precio'],
        'categoria' => $producto['categoria'],
        'cantidad' => $producto['cantidad']
    ];
}

echo "<pre>Informe del inventario:\n";
print_r($informe_inventario);
echo "</pre>";

?>
