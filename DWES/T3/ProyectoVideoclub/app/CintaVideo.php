<?php 
require_once __DIR__ . '/../vendor/autoload.php';

class CintaVideo extends Soporte
{
    protected int $duracion;

    public function __construct(string $titulo, int $numero, float $precio, int $duracion)
    {
        parent::__construct( $titulo,  $numero,  $precio);
        $this->duracion = $duracion;
    }

    public function muestraResumen(): void {
        // Mostrar el resumen del soporte base
        echo "<br>Película en VHS:<br>";
        echo "<br><strong>{$this->getTitulo()}</strong><br>";
        echo "{$this->precio} € (IVA no incluido)<br>";
        echo "Duración: {$this->duracion} minutos";
    }
}

?>