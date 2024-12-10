<?php
abstract class Empleado {
protected $nombre;
protected $apellido;
protected $salario;
public function __construct($nombre, $apellido, $salario) {
$this->nombre = $nombre;
$this->apellido = $apellido;
$this->salario = $salario;
}
abstract public function calcularSueldo();
public function getInformacion() {
$propiedades = get_object_vars($this);
return json_encode($propiedades);
}
public function clonarEmpleado() {
return clone $this;
}
}
class EmpleadoTiempoCompleto extends Empleado {
public function calcularSueldo() {
// Lógica para calcular el salario de un empleado a tiempo

return $this->salario;
}
}

class EmpleadoPorHoras extends Empleado
{
    protected $horasTrabajadas;
    public function __construct(
        $nombre,
        $apellido,
        $salario,
        $horasTrabajadas
    ) {
        parent::__construct($nombre, $apellido, $salario);
        $this->horasTrabajadas = $horasTrabajadas;
    }
    public function calcularSueldo()
    {
        // Lógica para calcular el salario de un empleado por horas
        return $this->salario * $this->horasTrabajadas;
    }
}
// Ejemplo de uso
$empleadoTiempoCompleto = new EmpleadoTiempoCompleto(
    "Juan",
    "Perez",
    2500
);
$empleadoPorHoras = new EmpleadoPorHoras("Maria", "Lopez", 15, 160);
echo "<br>Información del empleado a tiempo completo: " .
    $empleadoTiempoCompleto->getInformacion() . "<br>";
echo "<br>Sueldo del empleado a tiempo completo: " .
    $empleadoTiempoCompleto->calcularSueldo() . "<br>";
echo "<br>Información del empleado por horas: " .
    $empleadoPorHoras->getInformacion() . "<br>";
echo "<br>Sueldo del empleado a tiempo completo: " .
    $empleadoPorHoras->calcularSueldo() . "<br>";
$clon = $empleadoTiempoCompleto->clonarEmpleado();
echo "<br>Información del clon coincide con la de su padre: " .
    $clon->getInformacion() . "<br>";
// Utilizando introspección para obtener información sobre las clases
echo "<br>Las clases definidas en el método EmpleadoTiempoCompleto
son;<br>";
var_dump(get_class_methods('EmpleadoTiempoCompleto'));

?>
