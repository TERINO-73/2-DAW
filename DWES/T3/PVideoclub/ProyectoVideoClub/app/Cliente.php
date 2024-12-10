<?php

require_once 'Soporte.php';

class Cliente {
    public string $nombre;
    public int $numero;
    private array $soportesAlquilados = [];

    public function __construct($nombre, $numero) {
        $this->nombre = $nombre;
        $this->numero = $numero;
    }

    public function alquilar(Soporte $soporte): void {
        $this->soportesAlquilados[] = $soporte;
    }

    public function listarAlquilados(): void {
        foreach ($this->soportesAlquilados as $soporte) {
            echo $soporte->muestraResumen() . "<br>";
        }
    }
}
