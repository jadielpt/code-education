<?php

namespace APIsSilex\ProductsDB\Service;

use APIsSilex\ProductsDB\Interfaces\ProductsServiceInterface;
use APIsSilex\ProductsDB\Entity\Products;
use APIsSilex\ProductsDB\Mapper\ProductsMapper;


class ProductsService implements ProductsServiceInterface
{
    private $products;
    private $productsMapper;
    
    function __construct(Products $products, ProductsMapper $productsMapper) {
        $this->products = $products;
        $this->productsMapper = $productsMapper;
    }

    public function fetchAll(array $data)
    {
        $productsEntity = $this->products;
        $productsEntity->setName($data['name']);
        $productsEntity->setDescription($data['description']);
        $productsEntity->setValue($data['value']);

        $productsMapper = $this->productsMapper;
        $result = $productsMapper->fetchAll($productsEntity);

        return $result;
    }

    public function insert(array $data)
    {       
//        $productsEntity = $this->products;
//        $productsEntity->setName($data['name']);
//        $productsEntity->setDescription($data['description']);
//        $productsEntity->setValue($data['value']);
//
//        $productsMapper = $this->productsMapper;
//        $result = $productsMapper->fetchAll($productsEntity);
//
//        return $result;
    }

    public function update(array $data)
    {
        $productsEntity = $this->products;
        $productsEntity->setName($data['name']);
        $productsEntity->setDescription($data['description']);
        $productsEntity->setValue($data['value']);

        $productsMapper = $this->productsMapper;
        $result = $productsMapper->update($productsEntity);

        return $result;
    }
    
}
