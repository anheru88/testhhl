<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

use App\Controllers\ClientesController;
use App\Controllers\WelcomeController;
use App\Core\Application;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../bootstrap.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/', [WelcomeController::class, 'index']);
$app->router->get('/clientes', [ClientesController::class, 'index']);
$app->router->get('/clientes/{$id}', [ClientesController::class, 'show']);

$app->run();