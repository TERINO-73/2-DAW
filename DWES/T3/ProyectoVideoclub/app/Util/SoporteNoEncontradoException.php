<?php
require_once __DIR__ . '/../vendor/autoload.php';

class SoporteNoEncontradoException extends VideoclubException
{
    // Excepción para cuando no se encuentra un soporte
    public function __construct($message = "El soporte no fue
encontrado.", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
?>