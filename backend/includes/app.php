<?php

require 'funciones.php';
require 'database.php';
require __DIR__ . '/../vendor/autoload.php';

// Cargar las variables de entorno desde .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Conectarnos a la base de datos
use Model\ActiveRecord;

ActiveRecord::setDB($db);
