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
        $this->products->setId($data['id'])
            ->setName($data['name'])
            ->setDescription($data['description'])
            ->setValue($data['value']);

        return $this->productsMapper->insert($this->products);
    }

    public function update(array $data = array())
    {
        $id = $data['id'];
        $name = $data['name'];
        $description = $data['description'];
        $value = $data['value'];

        $this->products->setId($id)
            ->setName($name)
            ->setDescription($description)
            ->setValue($value);

//        var_dump($this->products);die;

        return $this->productsMapper->update($this->products);
    }

    public function delete($data)
    {
        $this->products->setId($data);
        return $this->productsMapper->delete($this->products);
    }
}
