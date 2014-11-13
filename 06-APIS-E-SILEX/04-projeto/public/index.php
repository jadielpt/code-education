<?php
require_once __DIR__ . '/../config/bootstrap.php';

//use APIsSilex\Client\Controllers\ClientController;
//use APIsSilex\Products\Controllers\ProductsController;
//
//$client = new ClientController();
//
//$app->mount('/clientes', $client->connect($app));
//
//$products = new ProductsController();
//
//$app->mount('/produtos', $products->connect($app));

$prod = new \APIsSilex\ProductsDb\Controllers\ProductsController();
$app->mount('/', $prod->connect($app));

$products = new \APIsSilex\ProductsApi\Controllers\ProductsController();
$app->mount('/api/produtos', $products->connect($app));


$app->run();