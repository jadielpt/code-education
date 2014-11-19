<?php
require_once __DIR__ . '/../config/bootstrap.php';

$products = new \Products\Controllers\ProductsController();
$app->mount('/', $products->connect($app));

$prod = new \Products\Controllers\ProductsCtlApi();
$app->mount('/api/produtos/', $prod->connect($app));

$app->run();