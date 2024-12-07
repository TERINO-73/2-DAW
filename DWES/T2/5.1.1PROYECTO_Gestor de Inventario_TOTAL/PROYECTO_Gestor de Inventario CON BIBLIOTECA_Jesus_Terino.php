<?php 

// Función para inicializar inventarios
function inicializar_inventarios() {
    $inventario_actual = [
        ["producto" => "Teclado", "precio" => 20, "categoria" => "Electrónica", "cantidad" => 4],
        ["producto" => "Ratón", "precio" => 15, "categoria" => "Electrónica", "cantidad" => 10],
        ["producto" => "Monitor", "precio" => 100, "categoria" => "Electrónica", "cantidad" => 3],
        ["producto" => "Silla", "precio" => 80, "categoria" => "Muebles", "cantidad" => 5],
    ];

    $proveedor_a = [
        ["producto" => "Ratón", "precio" => 10, "categoria" => "Electrónica", "cantidad" => 20],
        ["producto" => "Lámpara", "precio" => 25, "categoria" => "Iluminación", "cantidad" => 15],
        ["producto" => "Escritorio", "precio" => 50, "categoria" => "Muebles", "cantidad" => 2],
    ];

    $proveedor_b = [
        ["producto" => "Monitor", "precio" => 92, "categoria" => "Electrónica", "cantidad" => 8],
        ["producto" => "Auriculares", "precio" => 30, "categoria" => "Electrónica", "cantidad" => 20],
        ["producto" => "Lámpara", "precio" => 20, "categoria" => "Iluminación", "cantidad" => 5],
    ];

    return [$inventario_actual, $proveedor_a, $proveedor_b];
}

// Función para obtener diferencias entre inventarios
function obtener_diferencias($productos_actual, $productos_proveedor) {
    return array_diff($productos_actual, $productos_proveedor);
}

// Función para unir inventarios
function unir_inventarios($inventario_actual, $proveedor_a, $proveedor_b) {
    return array_merge($inventario_actual, $proveedor_a, $proveedor_b);
}

// Función para contar productos por categorías
function contar_categorias($inventario_unido) {
    // Contar productos por categorías

    $categorias = array_column($inventario_unido, 'categoria');
    return array_count_values($categorias);
}

// Función para ordenar el inventario por precio
function ordenar_por_precio($inventario_unido) {
    // Ordenar los precios y aplicar ese orden al array de productos unidos
    $precios = array_column($inventario_unido, 'precio');
    sort($precios);
    $array_ordenado = [];
    foreach ($precios as $precio) {
        foreach ($inventario_unido as $elemento) {
            if ($elemento['precio'] == $precio) {
                $array_ordenado[] = $elemento;
                break;
            }
        }
    }
    return $array_ordenado;
}

// Función para eliminar duplicados y acumular cantidades
function eliminar_duplicados($inventario_unido) {

    $resultadoProductosEliminados = [];
    foreach ($inventario_unido as $item) {
        $clave = $item['producto'] . '|' . $item['categoria']; // Crear una clave única por producto y categoría

        if (!isset($resultadoProductosEliminados[$clave])) {
            $resultadoProductosEliminados[$clave] = [
                'producto' => $item['producto'],
                'categoria' => $item['categoria'],
                'total_precio' => 0,
                'total_cantidad' => 0,
            ];
        }

        $resultadoProductosEliminados[$clave]['total_precio'] += $item['precio'] * $item['cantidad'];
        $resultadoProductosEliminados[$clave]['total_cantidad'] += $item['cantidad'];
    }

    foreach ($resultadoProductosEliminados as $clave => $datos) {
        $resultadoProductosEliminados[$clave]['precio_promedio'] = $datos['total_precio'] / $datos['total_cantidad'];
        unset($resultadoProductosEliminados[$clave]['total_precio']);
    }

    return array_values($resultadoProductosEliminados); // Reindexar el array
}

// Función para dividir en secciones

function dividir_secciones($inventario) {
    return array_chunk($inventario, 2);
}

// Función para generar informe
function generar_informe($inventario) {
    $informe = [];
    foreach ($inventario as $item) {
        $informe[$item['producto']] = [
            "precio" => $item['precio_promedio'],
            "cantidad" => $item['total_cantidad'],
            "categoria" => $item['categoria'],
        ];
    }
    return $informe;
}

// Función para mostrar resultados
function mostrar_resultados($diferencias_proveedor_a, $diferencias_proveedor_b, $inventario_unido, $conteo_categorias, $resultadoProductosEliminados, $secciones_inventario, $informe_inventario) {
    echo "<pre>Diferencias con Proveedor A: "; print_r($diferencias_proveedor_a);echo "</pre>";
    echo "<pre>Diferencias con Proveedor B: "; print_r($diferencias_proveedor_b); echo "</pre>";
    echo "<pre>Inventario Unido sin eliminar duplicados: "; print_r($inventario_unido); echo "</pre>";
    echo "<pre>Conteo de productos por categoría: "; print_r($conteo_categorias); echo "</pre>";
    echo "<pre>Inventario Único eliminando duplicados , sumando cantidades y promediando precios: "; print_r($resultadoProductosEliminados); echo "</pre>";
    echo "<pre>Secciones del Inventario: "; print_r($secciones_inventario); echo "</pre>";
    echo "<pre>Informe del Inventario final: "; print_r($informe_inventario); echo "</pre>";
}

?>