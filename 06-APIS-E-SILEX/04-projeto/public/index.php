<?php
require_once __DIR__ . '/../config/bootstrap.php';

$prod = new \APIsSilex\ProductsApi\Controllers\ProductsCtlApi();
$app->mount('/api/produtos/', $prod->connect($app));

//$prod = new APIsSilex\ProductsDb\Controllers\ProductsController();
//$app->mount('/produtos', $prod->connect($app));


$app->run();