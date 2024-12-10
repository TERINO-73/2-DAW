<?php

require_once 'Soporte.php';

class Juego extends Soporte {
    public int $numeroJugadores;

    public function __construct($titulo, $numero, $precio, $numeroJugadores) {
        parent::__construct($titulo, $numero, $precio);
        $this->numeroJugadores = $numeroJugadores;
    }

    public function muestraResumen(): string {
        return parent::muestraResumen() . ", número de jugadores: {$this->numeroJugadores}";
    }
}
