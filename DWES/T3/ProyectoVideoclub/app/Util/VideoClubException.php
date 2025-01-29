<?php
require_once __DIR__ . '/../vendor/autoload.php';

class VideoclubException extends \Exception
{
    // Excepción base para el videoclub
    public function __construct(
        $message = "Error en el Videoclub",
        $code = 0,
        \Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
?>