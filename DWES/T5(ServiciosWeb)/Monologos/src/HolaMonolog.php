<?php
namespace Monologos;

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;

class HolaMonolog
{
    private $miLog;
    private $hora;

    public function __construct($hora)
    {
        $this->miLog = new Logger('Monologos');

        $this->miLog->pushHandler(new RotatingFileHandler(__DIR__ . '/../logs/app.log', 0, Logger::DEBUG));

        $this->hora = $hora;
        if ($this->hora < 0 || $this->hora > 24) {
            $this->miLog->warning("La hora proporcionada ($hora) no es válida.");
        }

        $this->miLog->pushHandler(new \Monolog\Handler\StreamHandler('php://stderr', Logger::DEBUG));
        $this->miLog->pushProcessor(new \Monolog\Processor\IntrospectionProcessor());
    }

    public function saludar()
    {
        $mensaje = $this->getSaludo();
        $this->miLog->info("Saludo: $mensaje");
    }

    public function despedir()
    {
        $mensaje = $this->getDespedida();
        $this->miLog->info("Despedida: $mensaje");
    }

    private function getSaludo()
    {
        if ($this->hora < 12) {
            return '¡Buenos días!';
        } elseif ($this->hora < 19) {
            return '¡Buenas tardes!';
        } else {
            return '¡Buenas noches!';
        }
    }

    private function getDespedida()
    {
        if ($this->hora < 12) {
            return '¡Hasta luego!';
        } elseif ($this->hora < 19) {
            return '¡Hasta pronto!';
        } else {
            return '¡Hasta mañana!';
        }
    }
}