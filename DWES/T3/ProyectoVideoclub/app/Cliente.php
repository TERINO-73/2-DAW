<?php


require_once __DIR__ . '/../vendor/autoload.php';
class Cliente
{
    private string $nombre;
    public int $numero;
    protected array $soportesAlquilados = [];
    protected int $numSoportesAlquilados = 0;
    protected int $maxAlquilerConcurrente;

    // Constructor con valor por defecto para maxAlquilerConcurrente
    function __construct(string $nombre, int $numero, int $maxAlquilerConcurrente = 3)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    // Verifica si el cliente tiene alquilado un soporte específico
    public function tieneAlquilado(Soporte $s): bool
    {
        foreach ($this->soportesAlquilados as $soporte) {
            if ($soporte->numero === $s->numero) {
                return true;
            }
        }
        return false;
    }

    // Alquila un soporte si no está alquilado y no ha superado el límite
    public function alquilar(Soporte $s): bool
    {
        if ($this->tieneAlquilado($s)) {
            echo "El cliente ya tiene alquilado el soporte {$s->getTitulo()}.<br>";
            return false;
        }

        if ($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente) {
            echo "Este cliente tiene {$this->maxAlquilerConcurrente} soportes alquilados. No puede alquilar más hasta que no devuelva algo.<br>";
            return false;
        }

        $this->soportesAlquilados[] = $s;
        $this->numSoportesAlquilados++;
        echo "Alquilado soporte a: {$this->nombre}<br>";
        $s->muestraResumen();
        return true;
    }

    // Devuelve un soporte
    public function devolver(int $numSoporte): bool
    {
        foreach ($this->soportesAlquilados as $index => $soporte) {
            if ($soporte->numero === $numSoporte) {
                unset($this->soportesAlquilados[$index]);
                $this->soportesAlquilados = array_values($this->soportesAlquilados);  // Reindexar el array
                $this->numSoportesAlquilados--;
                echo "Soporte devuelto: {$soporte->getTitulo()}.<br>";
                return true;
            }
        }
        echo "No se ha podido encontrar el soporte en los alquileres de este cliente.<br>";
        return false;
    }

    // Lista los alquileres actuales del cliente
    public function listarAlquileres(): void
    {
        echo "El cliente tiene {$this->numSoportesAlquilados} soportes alquilados.<br>";
        foreach ($this->soportesAlquilados as $soporte) {
            $soporte->muestraResumen();
        }
    }

    // Getter y setter para 'numero'
    public function setNumero(int $numero)
    {
        $this->numero = $numero;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    // Getter para 'numSoportesAlquilados'
    public function getNumSoportesAlquilados(): int
    {
        return $this->numSoportesAlquilados;
    }

    public function getMaxAlquilerConcurrente(): int
    {
        return $this->maxAlquilerConcurrente;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }
}

?>
