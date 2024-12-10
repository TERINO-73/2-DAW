<?php

require_once "Soporte.php";

class CintaVideo extends Soporte {
    public int $duracion;

    public function __construct($titulo, $numero, $precio, $duracion) {
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;
    }

    public function muestraResumen(): void {
        echo parent::muestraResumen() . ", duración: {$this->duracion} min";
    }
    
    
    
}
