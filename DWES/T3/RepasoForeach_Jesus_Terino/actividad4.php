
<!DOCTYPE html>
<html>
<head>
<title>Buscar Provincia</title>
</head>
<body>
<h1>Buscar Provincia</h1>
<form method="POST" action="">
<label for="provincia">Ingrese el nombre de la provincia:</label>
<input type="text" id="provincia" name="provincia">
<button type="submit">Buscar</button>
</form>
    <?php
include 'comunidades.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $provinciaBuscada = $_POST['provincia'];
    $encontrada = false;

    foreach ($comunidades as $comunidad => $nobjeto) {
        if (in_array($provinciaBuscada, $nobjeto['provincias'])) {
            echo "La provincia $provinciaBuscada pertenece a $comunidad.<br>";
            $encontrada = true;
            break;
        }
    }

    if (!$encontrada) {
        echo "Provincia <strong>$provinciaBuscada</strong> no encontrada.<br>";
    }
}
?>