<?php
abstract class Vehiculo {
protected $marca;
protected $modelo;
protected $anno;
public function __construct($marca, $modelo, $anno) {
$this->marca = $marca;
$this->modelo = $modelo;
$this->anno = $anno;
}
abstract public function calcularImpuesto();
public function getInformacion() {
$propiedades = get_object_vars($this);
return json_encode($propiedades);
}
public function clonarVehiculo() {
return clone $this;
}
}
class Coche extends Vehiculo {
private $cilindrada;
public function __construct($marca, $modelo, $anno, $cilindrada) {
parent::__construct($marca, $modelo, $anno);
$this->cilindrada = $cilindrada;
}
public function getInformacion() {
$propiedades = get_object_vars($this);
// Agregamos la cilindrada a la salida
$propiedades['cilindrada'] = $this->cilindrada;
return json_encode($propiedades);
}
public function calcularImpuesto() {
$impuesto = 0;
// Ejemplo simplificado basado en tramos de cilindrada (ajustara la normativa)
if ($this->cilindrada <= 1000) {
$impuesto = $this->cilindrada * 0.05; // 5% paracilindradas menores o iguales a 1000cc
} else if ($this->cilindrada <= 1500) {
$impuesto = $this->cilindrada * 0.07; // 7% paracilindradas entre 1001cc y 1500cc
} else {
$impuesto = $this->cilindrada * 0.09; // 9% paracilindradas superiores a 1500cc
}
return $impuesto;
}
}


class Moto extends Vehiculo
{
    private $cilindrada;
    public function __construct($marca, $modelo, $anno, $cilindrada)
    {
        parent::__construct($marca, $modelo, $anno);
        $this->cilindrada = $cilindrada;
    }
    public function getInformacion()
    {
        $propiedades = get_object_vars($this);
        // Agregamos la cilindrada a la salida
        $propiedades['cilindrada'] = $this->cilindrada;
        return json_encode($propiedades);
    }
    public function calcularImpuesto()
    {
        $impuesto = 0;
        // Ejemplo simplificado basado en tramos de cilindrada (ajustara la normativa)
        if ($this->cilindrada <= 1000) {
            $impuesto = $this->cilindrada * 0.05; // 5% paracilindradas menores o iguales a 1000cc
        } else if ($this->cilindrada <= 1500) {
            $impuesto = $this->cilindrada * 0.07; // 7% paracilindradas entre 1001cc y 1500cc
        } else {
            $impuesto = $this->cilindrada * 0.09; // 9% paracilindradas superiores a 1500cc
        }
        return $impuesto;
    }
}
class Camion extends Vehiculo
{
    private $cargaMaxima;
    public function __construct($marca, $modelo, $anno, $cargaMaxima)
    {
        parent::__construct($marca, $modelo, $anno);
        $this->cargaMaxima = $cargaMaxima;
    }
    public function getInformacion()
    {
        $propiedades = get_object_vars($this);
        // Agregamos la carga máxima a la salida
        $propiedades['cargaMaxima'] = $this->cargaMaxima;
        return json_encode($propiedades);
    }
    public function calcularImpuesto()
    {
        $impuesto = 0;
        // Ejemplo simplificado basado en tramos de cilindrada (ajustara la normativa)
        if ($this->cargaMaxima <= 10000) {
            $impuesto = $this->cargaMaxima * 0.05; // 5% paracilindradas menores o iguales a 1000cc
        } else if ($this->cargaMaxima <= 15000) {
            $impuesto = $this->cargaMaxima * 0.07; // 7% paracilindradas entre 1001cc y 1500cc
        } else {
            $impuesto = $this->cargaMaxima * 0.09; // 9% paracilindradas superiores a 1500cc
        }
        return $impuesto;
    }
}
// Ejemplo de uso
$coche = new Coche("Toyota", "Corolla", 2023, 1500);
echo "<br>Información del coche: " . $coche->getInformacion() . "<br>";
echo "<br>Impuesto del coche: " . $coche->calcularImpuesto() . "<br>";
$clon = $coche->clonarVehiculo();
echo "<br>Información del clon: " . $clon->getInformacion() . "<br>";
// Utilizando introspección para obtener información sobre las clases
echo "<br>";
var_dump(get_class_methods('Coche'));
echo "<br>";
$camion = new Camion("Mercedes-Benz", "Actros", 1.996, 150000);
echo "<br>Información del camión: " . $camion->getInformacion() .
    "<br>";
echo "<br>Impuesto del camión: " . $camion->calcularImpuesto() .
    "<br>";
$clon = $camion->clonarVehiculo();
echo "<br>Información del clon: " . $clon->getInformacion() . "<br>";
// Utilizando introspección para obtener información sobre las clases
echo "<br>";
var_dump(get_class_methods('Camion'));
echo "<br>";

?>