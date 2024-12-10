<?php

class Dvd{
    public string $titulo;
    private int $numero;
    protected float $precio;
    private string $idiomas;

    private string $formato_pantalla;
    private static float $IVA = 0.21; 

    public function __construct(string $titulo, int $numero, float $precio,float $idiomas,string $formato_pantalla) {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
        $this->idiomas = $idiomas;
        $this->formato_pantalla= $formato_pantalla;


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
        echo "<br>Idiomas:{$this->idiomas}";
        echo "<br>Formato Pantalla:{$this->formato_pantalla}";
    }


}