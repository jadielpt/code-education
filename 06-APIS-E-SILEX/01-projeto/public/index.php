<?php
require_once __DIR__ . '/../bootstrap.php';

use APIsSilex\Cliente\Controllers\ClienteController;

//$app->mount('/', include_once __DIR__ . '/../src/APIsSilex/Cliente/Controllers/cliente.php');

//$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
//if (php_sapi_name() === 'cli-server' && is_file($filename)) {
//    return false;
//}
//
//var_dump($filename);

$lista = [ 
    '00001' => [
        'nome' => 'Maria Jose', 'email' => 'maria@email.com', 'cpf-cnpj' => '777.777.777-77'
        ],
    '00002' => [
        'nome' => 'Joao Maria', 'email' => 'joao@email.com', 'cpf-cnpj' => '777.777.777-77'
        ],
    '00003' => [
        'nome' => 'Jose Maria', 'email' => 'jose@email.com', 'cpf-cnpj' => '777.777.777-77'
        ],
    '00004' => [
        'nome' => 'Pedro Joao', 'email' => 'pedro@email.com', 'cp-cnpj' => '777.777.777-77'
        ],
    '00005' => [
        'nome' => 'Joao Pedro', 'email' => 'jp@email.com', 'cpf-cnpj' => '777.777.777-77'
        ]
    ];

$cliente = new ClienteController();
$cliente->setCliente($lista);
$test = $cliente->getCliente($app);
var_dump($test);

//$test1 = $cliente->connect($app);
//var_dump($test1);
        


$app->mount('/', $cliente->connect($app));

$app->run();