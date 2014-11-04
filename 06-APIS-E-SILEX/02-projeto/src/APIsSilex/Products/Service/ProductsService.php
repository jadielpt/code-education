<?php

namespace APIsSilex\Products\Service;

use APIsSilex\Products\Interfaces\ProductsServiceInterface;
use APIsSilex\Products\Entity\Products;
use APIsSilex\Products\Mapper\ProductsMapper;


class ProductsService implements ProductsServiceInterface
{
    private $products;
    private $productsMapper;
    
    function __construct(Products $products, ProductsMapper $productsMapper) {
        $this->products = $products;
        $this->productsMapper = $productsMapper;
    }

    public function insert(array $data)
    {       
        $productsEntity = $this->products;
        $productsEntity->setName($data['name']);
        $productsEntity->setDescription($data['description']);
        $productsEntity->setValue($data['value']);

        $productsMapper = $this->productsMapper;
        $result = $productsMapper->insert($productsEntity);
        
        return $result;
    }
    
}
