<?php
require_once __DIR__ . '/../vendor/autoload.php';
abstract class Soporte implements resumible {
    private string $titulo;
    public int $numero;
    protected float $precio;
    private static float $IVA = 0.21; 
    public bool $alquilado = false;

    public function __construct(string $titulo, int $numero, float $precio) {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    /**
     * Obtiene el precio del soporte sin IVA.
     * @return float
     */
    public function getPrecio(): float {
        return $this->precio;
    }

    /**
     * Calcula y obtiene el precio del soporte con IVA.
     * @return float
     */
    public function getPrecioConIVA(): float {
        return round($this->precio * (1 + self::$IVA), 2);
    }       

    public function muestraResumen(): void {
        echo "<br><strong>{$this->titulo}</strong>";
        echo "<br>{$this->precio} € (IVA no incluido)";
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }
}