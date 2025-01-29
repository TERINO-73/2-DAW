<?php

namespace DWES\ProyectoVideoclub\Util;

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use psr\Log\LoggerInterface;

class LogFactory
{
    public static function createLogger(string $canal, string $path): LoggerInterface
    {
        $logger = new Logger($canal);
        $logger->pushHandler(new RotatingFileHandler("../logs/videoclub.log",50,100));
        return $logger;
        
    }
}
