<?php
session_start();  // Inicia la sesión si no está iniciada ya
session_unset();  // Elimina todas las variables de sesión
session_destroy();  // Destruye la sesión completamente

// Redirige al usuario a la página de inicio (index.php)
header("Location: index.php");
exit;
?>