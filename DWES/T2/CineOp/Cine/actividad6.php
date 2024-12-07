<?php
include 'comunidades.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $busqueda = strtolower($_POST['buscar']);
    $resultados = [];

    foreach ($comunidades as $comunidad => $nobjeto) {
        if (strpos(strtolower($comunidad), $busqueda) !== false) {
            $resultados[] = "Comunidad: $comunidad";
        }

        foreach ($nobjeto['provincias'] as $provincia) {
            if (strpos(strtolower($provincia), $busqueda) !== false) {
                $resultados[] = "Provincia: $provincia (Comunidad: $comunidad)";
            }
        }

        foreach ($nobjeto['capital'] as $capital => $valor) {
            if (strpos(strtolower($capital), $busqueda) !== false) {
                $resultados[] = "Capital: $capital (Comunidad: $comunidad)";
            }
        }
    }

    if (empty($resultados)) {
        echo "No se encontraron resultados para <strong>$busqueda</strong>.<br>";
    } else {
        echo "Resultados para <strong>$busqueda</strong>:<br>";
        echo implode("<br>", $resultados);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Buscar en Comunidades</title>
</head>

<body>
    <h1>Buscar en Comunidades</h1>
    <form method="POST" action="">
        <label for="buscar">Buscar por comunidad, provincia o
            capital:</label>
        <input type="text" id="buscar" name="buscar">
        <button type="submit">Buscar</button>
    </form>