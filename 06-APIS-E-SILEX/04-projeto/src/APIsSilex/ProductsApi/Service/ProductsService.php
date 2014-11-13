<?php

namespace APIsSilex\ProductsApi\Service;

use APIsSilex\ProductsApi\Interfaces\ProductsServiceInterface;
use APIsSilex\ProductsApi\Entity\Products;
use APIsSilex\ProductsApi\Mapper\ProductsMapper;


class ProductsService implements ProductsServiceInterface
{
    private $products;
    private $productsMapper;
    
    function __construct(Products $products, ProductsMapper $productsMapper) {
        $this->products = $products;
        $this->productsMapper = $productsMapper;
    }

    public function fetchAll()
    {
        $productsMapper = $this->productsMapper;
        $result = $productsMapper->fetchAll();

        return $result;

    }
    
    public function findOneById($id)
    {
        return $this->productsMapper->findOneById($id);
    }

    public function insert(array $data= array())
    {       
        $this->products->setName($data['name'])
            ->setDescription($data['description'])
            ->setValue($data['value']);

        return $this->productsMapper->insert($this->products);
    }

    public function update(array $data = array())
    {
        $name = $data['name'];
        $description = $data['description'];
        $value = $data['value'];

        $this->products->setName($name)
            ->setDescription($description)
            ->setValue($value);
        //var_dump($this->productsMapper->update($this->products));die;

        return $this->productsMapper->update($this->products);
    }

    public function delete($data)
    {
        $this->products->setId($data);
        return $this->productsMapper->delete($this->products);
    }
}
