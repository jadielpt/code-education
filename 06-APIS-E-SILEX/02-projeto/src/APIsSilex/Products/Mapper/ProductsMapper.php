<?php

namespace APIsSilex\Products\Mapper;

use APIsSilex\Products\Interfaces\ProductsMapperInterface;
use APIsSilex\Products\Interfaces\ProductsInterface;


class ProductsMapper implements ProductsMapperInterface
{
    public function insert(ProductsInterface $products)
    {
        return [ 
            '00001' => ['name' => 'Maria Jose', 'email' => 'maria@email.com', 'cpf-cnpj' => '777.777.777-77'],
            '00002' => ['name' => 'Joao Maria', 'email' => 'joao@email.com', 'cpf-cnpj' => '777.777.777-77'],
            '00003' => ['name' => 'Jose Maria', 'email' => 'jose@email.com', 'cpf-cnpj' => '777.777.777-77'],
            '00004' => ['name' => 'Pedro Joao', 'email' => 'pedro@email.com', 'cp-cnpj' => '777.777.777-77'],
            '00005' => ['name' => 'Joao Pedro', 'email' => 'jp@email.com', 'cpf-cnpj' => '777.777.777-77']
            ];
    }
}
