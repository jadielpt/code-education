<?php
require_once __DIR__ . '/../config/bootstrap.php';

$products = new \APIsSilex\ProductsApi\Controllers\ProductsControllerApi();
$app->mount('/api/produtos/', $products->connect($app));

$prod = new \APIsSilex\ProductsDb\Controllers\ProductsController();
$app->mount('/', $prod->connect($app));


$app->run();