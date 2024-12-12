<?php
require_once 'conexion.php'; // Conexión a la base de datos

try {
    // Verificar si la conexión se ha establecido
    if (!isset($conexion)) {
        throw new Exception("No se pudo establecer la conexión a la base de datos.");
    }

    // Consulta a una tabla inexistente para forzar un error
    $query = $conexion->query("SELECT * FROM tabla_inexistente");

    // Si la consulta se ejecuta (improbable), se muestra un mensaje
    echo "Consulta ejecutada exitosamente.";
} catch (PDOException $e) {
    echo "<h3>Error Detectado:</h3>";
    echo "Mensaje: " . $e->getMessage() . "<br>";
    echo "Código de Error: " . $e->getCode() . "<br>";

    // Mostrar detalles adicionales con errorInfo
    if (isset($conexion) && $conexion->errorInfo()) {
        $errorInfo = $conexion->errorInfo();
        echo "SQLSTATE: " . $errorInfo[0] . "<br>";
        echo "Código Específico del Driver: " . $errorInfo[1] . "<br>";
        echo "Mensaje del Driver: " . $errorInfo[2] . "<br>";
    }
}
?>
