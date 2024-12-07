<?php
class Clase {
    public $nombre;
    public $horarios = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function agregarHorario($dia, $hora, $plazasTotales) {
        $this->horarios[$dia] = new Horario($dia, $hora, $plazasTotales);
    }

    public function getHorario($dia) {
        return $this->horarios[$dia] ?? null;
    }
}

class Horario {
    public $dia;
    public $hora;
    public $plazasTotales;
    public $plazasDisponibles;
    public $reservado;

    public function __construct($dia, $hora, $plazasTotales) {
        $this->dia = $dia;
        $this->hora = $hora;
        $this->plazasTotales = $plazasTotales;
        $this->plazasDisponibles = $plazasTotales;
        $this->reservado = false;
    }

    public function reservar() {
        if (!$this->reservado && $this->plazasDisponibles > 0) {
            $this->plazasDisponibles--;
            $this->reservado = true;
            return true;
        }
        return false;
    }

    public function liberar() {
        if ($this->reservado) {
            $this->plazasDisponibles++;
            $this->reservado = false;
            return true;
        }
        return false;
    }
}

class Gimnasio {
    public $clases = [];

    public function inicializarClases() {
        $yoga = new Clase("Yoga");
        $yoga->agregarHorario("lunes", "19:00", 20);
        $yoga->agregarHorario("miércoles", "08:00", 20);
        $yoga->agregarHorario("viernes", "10:00", 20);

        $zumba = new Clase("Zumba");
        $zumba->agregarHorario("martes", "18:00", 20);
        $zumba->agregarHorario("jueves", "19:30", 20);

        $crossfit = new Clase("CrossFit");
        $crossfit->agregarHorario("lunes", "18:00", 20);
        $crossfit->agregarHorario("miércoles", "14:30", 20);
        $crossfit->agregarHorario("viernes", "20:30", 20);

        $this->clases = [
            "yoga" => $yoga,
            "zumba" => $zumba,
            "crossfit" => $crossfit,
        ];
    }

    public function getClase($nombre) {
        return $this->clases[strtolower($nombre)] ?? null;
    }
}
?>
