<?php 
$cantidad = count($_REQUEST);
echo"Tus datos originales son: ";

for($i = 0; $i <$cantidad; $i++) {
    echo  "$_REQUEST[$i]  ";

}

echo "</br>Tus datos invertidos son : ";


for($i = $cantidad-1; 0 <= $i; $i--) {

    echo "$_REQUEST[$i]  ";
}

?>