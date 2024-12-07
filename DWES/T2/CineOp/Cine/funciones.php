<?php
session_start();

$asientos_ocupados_global = []; // Variable global para almacenar los asientos ocupados

function obtenerPelicula($id) {
    $peliculas = [
        1 => ['nombre' => 'Pelicula 1', 'descripcion' => 'Descripción de la Pelicula 1'],
        2 => ['nombre' => 'Pelicula 2', 'descripcion' => 'Descripción de la Pelicula 2'],
        3 => ['nombre' => 'Pelicula 3', 'descripcion' => 'Descripción de la Pelicula 3'],
    ];
    return $peliculas[$id] ?? null;
}

function obtenerHorariosPorPelicula($id) {
    return ['15:00', '17:00', '19:00'];
}

function obtenerAsientosOcupados($pelicula_id, $horario) {
    global $asientos_ocupados_global; // Acceder a la variable global
    return $asientos_ocupados_global["$pelicula_id-$horario"] ?? [];
}

function guardarAsientosOcupados($pelicula_id, $horario, $asientos) {
    global $asientos_ocupados_global; // Acceder a la variable global
    if (!isset($asientos_ocupados_global["$pelicula_id-$horario"])) {
        $asientos_ocupados_global["$pelicula_id-$horario"] = [];
    }
    $asientos_ocupados_global["$pelicula_id-$horario"] = array_unique(array_merge($asientos_ocupados_global["$pelicula_id-$horario"], $asientos));
}
