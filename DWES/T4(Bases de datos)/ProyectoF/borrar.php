<?php
$host = 'localhost';
$dbname = 'lol';
$username = "dwes_prueba";
$password = "73373"; // Cambia según la configuración de tu servidor


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        // Conexión a la base de datos
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Consultar el nombre del campeón a eliminar
        $query = "SELECT nombre FROM campeon WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            // Obtener el nombre del campeón
            $campeon = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Eliminar al campeón
            $deleteQuery = "DELETE FROM campeon WHERE id = :id";
            $deleteStmt = $pdo->prepare($deleteQuery);
            $deleteStmt->bindParam(':id', $id, PDO::PARAM_INT);
            $deleteStmt->execute();
            
            // Redirigir al listado de campeones después de eliminar
            header("Location: campeones2.php");
            exit();
        } else {
            echo "No se encontró el campeón con el ID proporcionado.";
        }
        
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
} else {
    echo "No se ha proporcionado un ID para borrar.";
}
?>