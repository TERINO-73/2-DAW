<?php
require_once __DIR__ . '/../vendor/autoload.php';

class ClienteNoEncontradoException extends VideoclubException
{
    // Excepción para cuando no se encuentra un cliente
    public function __construct($message = "El cliente no fue
encontrado.", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
?>