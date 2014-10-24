<?php
require_once __DIR__ . '/../config/bootstrap.php';

use APIsSilex\Client\Controllers\ClientController;

$data = require_once __DIR__ . '/../src/APIsSilex/Views/CientJsonView.php';

$client = new ClientController();
$client->setClient($data);
$client->getClient($app);
        
$app->mount('/clientes', $client->connect($app));

$app->run();