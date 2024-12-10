<?php
spl_autoload_register(function ($class) {
    $folders = ['app', 'util'];
    foreach ($folders as $folder) {
        $file = __DIR__ . '/../' . $folder . '/' . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            break;
        }
    }
});
