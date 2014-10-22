<?php
require_once __DIR__ . '/../bootstrap.php';

use APIsSilex\Cliente\Controllers\ClienteController;

$data = require_once __DIR__ . '/../src/APIsSilex/Views/CienteJsonView.php';

$cliente = new ClienteController();
$cliente->setCliente($data);
$cliente->getCliente($app);
        
$app->mount('/clientes', $cliente->connect($app));

$app->run();


/*
 * Desconsidere
 * Apenas como aviso!
 */
echo "<br>";
echo "<br>";
echo "<h1>Codigos de cliente existentes:</h1>";
echo "<h2>00001, 00002, 00003, 00004, 00005</h2>";
echo "<h2>http://127.0.0.1:8080/00001</h2>";