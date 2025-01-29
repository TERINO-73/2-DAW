<?php
require_once __DIR__ . '/../vendor/autoload.php';

class Dvd extends Soporte
{
    protected string $idiomas;
    protected string $formatPantalla;

    public function __construct(string $titulo, int $numero, float $precio, string $idiomas, string $formatPantalla)
    {
        parent::__construct($titulo,  $numero,  $precio);
        $this->idiomas = $idiomas;
        $this->formatPantalla = $formatPantalla;
    }

    public function muestraResumen(): void
    {
        // Mostrar el resumen del soporte base
        echo "<br>Película en DVD:<br>";
        echo "<br><strong>{$this->getTitulo()}</strong><br>";
        echo "{$this->precio} € (IVA no incluido)<br>";
        echo "Idiomas: {$this->idiomas}<br>";
        echo "Formato Pantalla: {$this->formatPantalla}<br>";
    }
}
