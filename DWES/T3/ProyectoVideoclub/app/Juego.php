<?php
require_once __DIR__ . '/../vendor/autoload.php';

class Juego extends Soporte
{
    protected string $consola;
    protected int $minNumJugadores;
    protected int $maxNumJugadores;

    public function __construct(string $titulo, int $numero, float $precio, string $consola, int $minNumJugadores, int $maxNumJugadores)
    {
        parent::__construct($titulo,  $numero,  $precio);
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    public function muestraResumen(): void
    {
        // Mostrar el resumen del soporte base
        echo "<br><strong>{$this->getTitulo()}</strong><br>";
        echo "{$this->precio} € (IVA no incluido)<br>";
        echo "Juego para: {$this->consola}<br>";
        if ($this->minNumJugadores == 1)
            echo "Para un jugador";
        else
            echo "Multijugador";
    }
}
