<?php 
// autoload.php
spl_autoload_register(function ($class) {
    // Reemplazar el namespace por la ruta correspondiente
    $prefix = 'T3\\ProyectoVideoclub\\';
    $base_dir = __DIR__ . '\\app';
    $base_excp = __DIR__ . '\\util';

    // Eliminar el namespace y reemplazar los backslashes por directorios
    $file = $base_dir . "\\" . $class . '.php';
    $file_excp = $base_excp . "\\" . $class . '.php';

    if (file_exists($file)) {
        require $file;
    } else if (file_exists($file_excp)) {
        require $file_excp;
    }
});

?>
