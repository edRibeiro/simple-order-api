<?php

use App\Core\Router;
use Dotenv\Dotenv;

require '../vendor/autoload.php';


$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

Router::run();
