<?php
namespace Dwes\ProyectoVideoclub;

abstract class Soporte
{
    public string $titulo;
    public int $numero;
    protected float $precio;
    private static float $IVA = 0.21;

    public function __construct(string $titulo, int $numero, float $precio)
    {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getPrecioConIVA(): float
    {
        return round($this->precio * (1 + self::$IVA), 2);
    }

    abstract public function muestraResumen(): void;
}
?>