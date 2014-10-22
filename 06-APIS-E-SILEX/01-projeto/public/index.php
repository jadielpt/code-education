<?php
require_once __DIR__ . '/../bootstrap.php';

use APIsSilex\Cliente\Controllers\ClienteController;

$data = require_once __DIR__ . '/../src/APIsSilex/Views/CienteJsonView.php';

$cliente = new ClienteController();
$cliente->setCliente($data);
$cliente->getCliente($app);
        
$app->mount('/clientes', $cliente->connect($app));

$app->run();