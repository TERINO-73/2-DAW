<?php

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use dawM\TESTCOMPOSER\Test;
// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('C:\xampp\htdocs\mañana\TEST-COMPOSER\your.log', Level::Warning));

// add records to the log
$log->warning('Foo');
$log->error('Bar');
?>