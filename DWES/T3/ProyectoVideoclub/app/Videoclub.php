<?php

require_once __DIR__ . '/../vendor/autoload.php';
// namespace Dwes\Videoclub;

class Videoclub
{
    private string $direccion;
    private array $productos = [];
    private array $socios = [];
    private int $numProductosAlquilados;
    private int $numTotalAlquileres;

    public function __construct(string $direccion)
    {
        $this->direccion = $direccion;
    }

    // Incluir productos en el videoclub (a través de los métodos específicos)
    public function incluirJuego(string $titulo, float $precio, string $consola, int $minNumJugadores, int $maxNumJugadores): void
    {
        $juego = new Juego($titulo, count($this->productos), $precio, $consola, $minNumJugadores, $maxNumJugadores);
        $this->incluirProducto($juego);
    }

    public function incluirDvd(string $titulo, float $precio, string $idiomas, string $formatPantalla): void
    {
        $dvd = new Dvd($titulo, count($this->productos), $precio, $idiomas, $formatPantalla);
        $this->incluirProducto($dvd);
    }

    public function incluirCintaVideo(string $titulo, float $precio, int $duracion): void
    {
        $cinta = new CintaVideo($titulo, count($this->productos), $precio, $duracion);
        $this->incluirProducto($cinta);
    }

    // Método privado para añadir productos al array de productos
    private function incluirProducto(Soporte $producto): void
    {
        $this->productos[] = $producto;
        echo "Incluido soporte " . (count($this->productos) - 1) . "<br>";
    }

    // Incluir un nuevo socio (cliente)
    public function incluirSocio(string $nombre, int $numero = 0): void
    {
        $cliente = new Cliente($nombre, $numero ?: count($this->socios));
        $this->socios[] = $cliente;
        echo "Incluido socio " . (count($this->socios) - 1) . "<br>";
    }

    // Crea un nuevo método en Videoclub llamado alquilarSocioProductos(int numSocio, array
    // numerosProductos), el cual debe recibir un array con los productos a alquilar.
    // Antes de alquilarlos, debe comprobar que todos los soportes estén disponibles, de
    // manera que si uno no lo está, no se le alquile ninguno.
    public function alquilarSocioProductos(int $clienteId, array $productos)
    {
        echo "<br><br>";
        $cliente = $this->socios[$clienteId];

        echo "Cliente: " . $cliente->getNombre() . "<br>";

        foreach ($productos as $miProducto => $valor) {
            // Instanciamos un producto para comprobar si está alquilado 
            $producto = $this->productos[$miProducto];
            
            if ($cliente->tieneAlquilado($producto))
                echo "El cliente ya tiene alquilado el soporte: " . $producto->getTitulo() . "<br>";
            else
                echo "El cliente no tiene alquilado el soporte: " . $producto->getTitulo() . "<br>";

            echo "índice del producto: " . $miProducto . "<br>";
        }
    }


    // Alquilar un producto a un socioº
    public function alquilaSocioProducto(int $clienteId, int $productoId): void
    {
        $cliente = $this->socios[$clienteId];
        $producto = $this->productos[$productoId];

        // Verifica si el producto ya está alquilado o si el cliente tiene un alquiler máximo
        if ($cliente->tieneAlquilado($producto)) {
            echo "El cliente ya tiene alquilado el soporte " . $producto->getTitulo() . "<br>";
        } elseif ($cliente->getNumSoportesAlquilados() >= $cliente->getMaxAlquilerConcurrente()) {
            echo "Este cliente tiene " . $cliente->getNumSoportesAlquilados() . " elementos alquilados. No puede alquilar más en este videoclub hasta que no devuelva algo.<br>";
        } else {
            $cliente->alquilar($producto);
            echo "Alquilado soporte a: " . $cliente->getNombre() . "<br>";
            $producto->muestraResumen();
        }
    }

    // Listar todos los productos disponibles en el videoclub
    public function listarProductos(): void
    {
        echo "Listado de los " . count($this->productos) . " productos disponibles:<br>";
        foreach ($this->productos as $index => $producto) {
            echo ($index + 1) . ".- ";
            $producto->muestraResumen();
            echo "<br>";
        }
    }

    // Listar todos los socios con su información
    public function listarSocios(): void
    {
        echo "<br>";
        echo "Listado de " . count($this->socios) . " socios del videoclub:<br>";
        foreach ($this->socios as $index => $socio) {
            echo ($index + 1) . ".- Cliente " . $socio->getNumero() . ": " . $socio->getNombre() . "<br>";
            echo "Alquileres actuales: " . $socio->getNumSoportesAlquilados() . "<br>";
        }
    }

    /**
     * Get the value of numProductosAlquilados
     */
    public function getNumProductosAlquilados()
    {
        return $this->numProductosAlquilados;
    }

    /**
     * Get the value of numTotalAlquileres
     */
    public function getNumTotalAlquileres()
    {
        return $this->numTotalAlquileres;
    }
}
