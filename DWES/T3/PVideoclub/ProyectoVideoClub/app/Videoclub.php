<?php

require_once 'Cliente.php';

class Videoclub {
    private string $nombre;
    private array $clientes = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function agregarCliente($nombre, $numero): void {
        $this->clientes[] = new Cliente($nombre, $numero);
    }

    public function listarClientes(): void {
        foreach ($this->clientes as $cliente) {
            echo "Cliente {$cliente->numero}: {$cliente->nombre}<br>";
        }
    }
}
