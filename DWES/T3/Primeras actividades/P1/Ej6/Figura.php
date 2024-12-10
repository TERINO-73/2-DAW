<?php
abstract class Figura {
public $color;
public function __construct($color) {
$this->color = $color;
}
abstract public function calcularArea();
public function getInformacion() {
$propiedades = get_object_vars($this);
return json_encode($propiedades);
}
public function clonarFigura() {
return clone $this;
}
}
class Circulo extends Figura {
private $radio;
public function __construct($color, $radio) {
parent::__construct($color);
$this->radio = $radio;
}
public function calcularArea() {
return pi() * pow($this->radio, 2);
}
}
class Rectangulo extends Figura {
private $base;
private $altura;
public function __construct($color, $base, $altura) {
parent::__construct($color);
$this->base = $base;
$this->altura = $altura;
}
public function calcularArea() {
return $this->base * $this->altura;
}
}

class Triangulo extends Figura
{
    private $base;
    private $altura;
    public function __construct($color, $base, $altura)
    {
        parent::__construct($color);
        $this->base = $base;
        $this->altura = $altura;
    }
    public function calcularArea()
    {
        return 0.5 * $this->base * $this->altura;
    }
}
// Ejemplo de uso
$circulo = new Circulo("rojo", 5);
echo "El color del círculo es: " . $circulo->color . "<br>";
echo "Información del círculo: " . $circulo->getInformacion() . "<br>";
echo "Área del círculo: " . $circulo->calcularArea() . "<br>";
$rectangulo = new Rectangulo("azul", 4, 6);
echo "El color del rectángulo es: " . $circulo->color . "<br>";
echo "Información del rectángulo: " . $rectangulo->getInformacion() .
    "<br>";
echo "Área del rectángulo: " . $rectangulo->calcularArea() . "<br>";
$triangulo = new Triangulo("verde", 3, 4);
echo "El color del triángulo elegido es: " . $circulo->color . "<br>";
echo "Información del triángulo: " . $triangulo->getInformacion() .
    "<br>";
echo "Área del triángulo: " . $triangulo->calcularArea() . "<br>";

?>