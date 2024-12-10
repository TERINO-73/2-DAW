<?php
class Coche {
    private $marca;
    private $modelo;
    private $velocidad;

    // Constructor
    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = 0; // Velocidad inicial
    }

    // Método para acelerar
    public function acelerar($cantidad) {
        $this->velocidad += $cantidad;
    }

    // Método para frenar
    public function frenar($cantidad) {
        $this->velocidad -= $cantidad;
        if ($this->velocidad < 0) {
            $this->velocidad = 0;
        }
    }

    // Método para obtener la velocidad actual
    public function getVelocidad() {
        return $this->velocidad;
    }
}
?>
