<?php

require_once 'Soporte.php';

class Dvd extends Soporte {
    public string $idioma;

    public function __construct($titulo, $numero, $precio, $idioma) {
        parent::__construct($titulo, $numero, $precio);
        $this->idioma = $idioma;
    }

    public function muestraResumen(): string {
        return parent::muestraResumen() . ", idioma: {$this->idioma}";
    }
}
