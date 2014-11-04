<?php

namespace APIsSilex\Products\Mapper;

use APIsSilex\Products\Interfaces\ProductsMapperInterface;
use APIsSilex\Products\Interfaces\ProductsInterface;

use Doctrine\DBAL\Connections;

class ProductsMapper implements ProductsMapperInterface
{
    protected $connections;
    
    function __construct(Connections $conn) {
        $this->connections = $conn;
    }

    public function insert(ProductsInterface $products)
    {
        $this->connections->insert();
        
        return [
            'name' => '',
            'description' => '',
            'value' => ''
        ];
    }
}
