<?php

require_once __DIR__ . '/vendor/autoload.php';

use Monologos\HolaMonolog;

$hora = 15;
$holaMonolog = new HolaMonolog($hora);
$holaMonolog->saludar();
$holaMonolog->despedir();




