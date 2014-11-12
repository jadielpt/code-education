<?php

namespace APIsSilex\ProductsDb\Service;

use APIsSilex\ProductsDb\Interfaces\ProductsServiceInterface;
use APIsSilex\ProductsDb\Entity\Products;
use APIsSilex\ProductsDb\Mapper\ProductsMapper;


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
        $this->products->setId($data['id'])
            ->setName($data['name'])
            ->setDescription($data['description'])
            ->setValue($data['value']);

        return $this->productsMapper->insert($this->products);
    }

    public function update(array $data)
    {
        $this->products->setId($data['id'])
            ->setName($data['name'])
            ->setDescription($data['description'])
            ->setValue($data['value']);

        //var_dump($this->productsMapper->update($this->products, $data['id'])); die;

        return $this->productsMapper->update($this->products);
    }
}
