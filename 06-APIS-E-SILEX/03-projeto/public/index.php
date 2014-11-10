<?php
require_once __DIR__ . '/../config/bootstrap.php';

use APIsSilex\Client\Controllers\ClientController;
use APIsSilex\Products\Controllers\ProductsController;

$client = new ClientController();
   
$app->mount('/clientes', $client->connect($app));

$products = new ProductsController();

$app->mount('/produtos', $products->connect($app));

$app->run();