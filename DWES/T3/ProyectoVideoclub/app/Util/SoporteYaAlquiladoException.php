<?php
require_once __DIR__ . '/../vendor/autoload.php';

class SoporteYaAlquiladoException extends VideoclubException
{
    // Excepción para cuando un soporte ya está alquilado
    public function __construct($message = "El soporte ya está
alquilado.", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
?>