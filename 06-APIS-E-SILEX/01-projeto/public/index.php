<?php
require_once __DIR__ . '/../bootstrap.php';

$app->mount('/', include_once __DIR__ . '/../src/APIsSilex/Cliente/Controllers/cliente.php');

$lista = [ 
    'cliente' => [
        ['nome' => 'Maria José', 'email' => 'maria@email.com', 'cpf/cnpj' => '777.777.777-77'],
        ['nome' => 'João Maria', 'email' => 'joao@email.com', 'cpf/cnpj' => '777.777.777-77'],
        ['nome' => 'José Maria', 'email' => 'jose@email.com', 'cpf/cnpj' => '777.777.777-77'],
        ['nome' => 'Pedro João', 'email' => 'pedro@email.com', 'cpf/cnpj' => '777.777.777-77'],
        ['nome' => 'João Pedro', 'email' => 'jp@email.com', 'cpf/cnpj' => '777.777.777-77'],
    ]];

$test = new APIsSilex\Cliente\Controllers\ClienteController();
$test->setCliente($lista);
echo $test->getCliente($app);

$app->run();