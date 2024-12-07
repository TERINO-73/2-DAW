<?php

    $nombreProducto = "Gramo de oro";
    $cantidad = 15;
    $precio = 77.98;
    $descuento = 0.15;

    $precioSD = $precio * $cantidad;
    $precioCD = $precioSD - $precioSD * $descuento;

    echo"<h1>Venta de oro</h1>";

if ($precioSD > 500) {
    echo "<p>Siendo el precio del gramo $precio € y la cantidad que usted se quiere llevar $cantidad </p>";

    echo "<p> El precio  pagar seria de $precioSD" ."€ y con el descuento se quedaria a $precioCD €";

}else{
    echo "<p>Siendo el precio del gramo $precio € y la cantidad que usted se quiere llevar $cantidad </p>";

    echo "<p> El precio  pagar seria de $precioSD" ."€";


}

if ($precioSD > 1000) {
    echo "<p>Es un compra grande</p>";
}else{

    echo "<p>Es un compra normal<p>";
}

echo "<h3> RESUMEN DE COMPRA</h3>";
echo "<p>Nombre: ". $nombreProducto ."</p>". PHP_EOL ."<p>Precio/unidad: ". $precio ."</p>";
echo "<p>Cantidad: ". $cantidad ."</p>". PHP_EOL ."<p>Precio Sin Descuento: ". $precioSD ."</p>";
echo "<p>Descuento: ". $descuento ."</p>" . PHP_EOL ."<p>Precio con descuento: ". $precioCD ."</p>";
?>