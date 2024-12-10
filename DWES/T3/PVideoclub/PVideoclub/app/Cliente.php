<?php

require_once "Soporte.php";

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
    public function getNumero(): float
    {
        return $this->numero;
    }

    public function listarAlquileres(): void {
        foreach ($this->soportesAlquilados as $soporte) {
            echo $soporte->muestraResumen() . "<br>";
        }
    }

    public function devolver(int $numSoporte): bool{

        foreach ($this->soportesAlquilados as $soporte) {
            if($this->numero == $numSoporte){
                $this->soportesAlquilados[$soporte] = null;
                return true;
            }
        }
        echo "Este soporte no esta alquilado";
        return false;
    }

    public function tieneAlquilado(Soporte $s): bool{
        
        foreach ($this->soportesAlquilados as $soporte) {
            if($this == $s)
                return true;
            
            
            
        }
        
        return false;
    }
}
