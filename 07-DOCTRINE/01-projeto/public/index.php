<?php
require_once __DIR__ . '/../config/bootstrap.php';

$products = new \Products\Controllers\ProductsController();
$app->mount('/', $products->connect($app));

$app->run();