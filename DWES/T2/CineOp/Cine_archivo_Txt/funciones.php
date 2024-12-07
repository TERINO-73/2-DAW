<?php
function obtenerPeliculas() {
    return [
        [
            'titulo' => 'Terrifier 3',
            'descripcion' => 'Terrifier 3 es una película de slasher estadounidense de 2024, dirigida y escrita por Damien Leone. Está protagonizada por Lauren LaVera, Elliott Fullam, David Howard Thornton y Samantha Scaffidi, quienes repiten sus papeles de películas anteriores.',
            'horarios' => ['12:00', '15:00', '18:00']
        ],
        [
            'titulo' => 'Creed 3',
            'descripcion' => 'En Los Ángeles durante el año 2002, Adonis "Donnie" Creed se escapa con su mejor amigo Damian "Dame" Anderson para ver a este último competir en un combate de boxeo. Después de que Dame gana, Donnie se encuentra con un hombre llamado Leon en una tienda de conveniencia, a quien ataca',
            'horarios' => ['13:00', '16:00', '19:00']
        ],
        [
            'titulo' => 'Gru mi villano favorito 4',
            'descripcion' => 'Despicable Me 4 (titulada Mi villano favorito 4 en Hispanoamérica y Gru 4: Mi villano favorito en España) es una película de comedia animada estadounidense producida por Illumination y distribuida por Universal Pictures.',
            'horarios' => ['14:00', '17:00', '20:00']
        ],
    ];
}

function obtenerPelicula($titulo) {
    $peliculas = obtenerPeliculas(); 

    foreach ($peliculas as $pelicula) {
        if ($pelicula['titulo'] === $titulo) {
            return $pelicula; 
        }
    }

    return null; 
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Archivo para almacenar los asientos ocupados
define('ASIENTOS_FILE', 'asientos_ocupados.txt');

// Función para obtener los asientos ocupados desde el archivo
function obtenerAsientosOcupados() {
    if (file_exists(ASIENTOS_FILE)) {
        return file(ASIENTOS_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }
    return [];
}

// Función para guardar los asientos ocupados en el archivo
function guardarAsientosOcupados($asientos) {
    $asientosOcupados = obtenerAsientosOcupados();
    $asientosOcupados = array_merge($asientosOcupados, $asientos);
    file_put_contents(ASIENTOS_FILE, implode("\n", array_unique($asientosOcupados)));
}

// Función para limpiar los asientos ocupados
function limpiarAsientosOcupados() {
    file_put_contents(ASIENTOS_FILE, "");
}

// Limpiar los asientos ocupados si ha pasado más de 1 minuto
function limpiarAsientosOcupadosSiEsNecesario() {
    if (isset($_SESSION['ultimo_pago'])) {
        $tiempoLimite = 60; // 1 minuto
        $tiempoActual = time();
        
        // Si ha pasado más de 1 minuto desde el último pago, limpiar los asientos
        if (($tiempoActual - $_SESSION['ultimo_pago']) >= $tiempoLimite) {
            limpiarAsientosOcupados();
        }
    }
}




?>
