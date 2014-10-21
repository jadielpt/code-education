<?php
header('Content-type: application/json');
 
$lista = [ 
    'cliente' => [
        ['nome' => 'Maria José', 'email' => 'maria@email.com', 'cpf/cnpj' => '777.777.777-77'],
        ['nome' => 'João Maria', 'email' => 'joao@email.com', 'cpf/cnpj' => '777.777.777-77'],
        ['nome' => 'José Maria', 'email' => 'jose@email.com', 'cpf/cnpj' => '777.777.777-77'],
        ['nome' => 'Pedro João', 'email' => 'pedro@email.com', 'cpf/cnpj' => '777.777.777-77'],
        ['nome' => 'João Pedro', 'email' => 'jp@email.com', 'cpf/cnpj' => '777.777.777-77'],
    ]];

echo json_encode($lista, JSON_PRETTY_PRINT);