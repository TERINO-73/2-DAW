<?php


class Soporte {
    public string $titulo;
    private int $numero;
    protected float $precio;
    private static float $IVA = 0.21; 

    public function __construct(string $titulo, int $numero, float $precio) {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }


    public function getPrecio(): float {
        return $this->precio;
    }


    public function getPrecioConIVA(): float {
        return round($this->precio * (1 + self::$IVA), 2);
    }       

    public function muestraResumen(): void {
        echo "<br><strong>{$this->titulo}</strong>";
        echo "<br>{$this->precio} € (IVA no incluido)";
    }
}
