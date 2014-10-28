<?php
require_once __DIR__ . '/../config/bootstrap.php';

use APIsSilex\Client\Controllers\ClientController;

$client = new ClientController();
   
$app->mount('/clientes', $client->connect($app));

$app->run();