<?php

class CintaVideo{
    public string $titulo;
    private int $numero;
    protected float $precio;
    private float $duracion;
    private static float $IVA = 0.21; 

    public function __construct(string $titulo, int $numero, float $precio,float $duracion) {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
        $this->duracion = $duracion;


    }


    public function getPrecio(): float {
        return $this->precio;
    }


    public function getPrecioConIVA(): float {
        return round($this->precio * (1 + self::$IVA), 2);
    }       

    public function muestraResumen(): void {
        echo "Pelicula en VHS:<br/>";
        echo "<br><strong>{$this->titulo}</strong>";
        echo "<br>{$this->precio} € (IVA no incluido)";
        echo "<br>Duración:{$this->duracion}";
    }


}