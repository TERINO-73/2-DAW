<?php

require_once("PROYECTO_Gestor de Inventario CON BIBLIOTECA_Jesus_Terino.php");

// Ejecución del programa
list($inventario_actual, $proveedor_a, $proveedor_b) = inicializar_inventarios();
    
// Comparar inventarios con proveedor A y B con la función array_column

$productos_actual = array_column($inventario_actual, 'producto');
$productos_proveedor_a = array_column($proveedor_a, 'producto');
$productos_proveedor_b = array_column($proveedor_b, 'producto');


$diferencias_proveedor_a = obtener_diferencias($productos_actual, $productos_proveedor_a);
$diferencias_proveedor_b = obtener_diferencias($productos_actual, $productos_proveedor_b);

$inventario_unido = unir_inventarios($inventario_actual, $proveedor_a, $proveedor_b);
$conteo_categorias = contar_categorias($inventario_unido);
$array_ordenado = ordenar_por_precio($inventario_unido);
$resultadoProductosEliminados = eliminar_duplicados($inventario_unido);
$secciones_inventario = dividir_secciones($resultadoProductosEliminados);
$informe_inventario = generar_informe($resultadoProductosEliminados);

mostrar_resultados($diferencias_proveedor_a, $diferencias_proveedor_b, $inventario_unido, $conteo_categorias, $resultadoProductosEliminados, $secciones_inventario, $informe_inventario);

?>
