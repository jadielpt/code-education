<?php

namespace APIsSilex\ProductsApi\Service;

use APIsSilex\ProductsApi\Interfaces\ProductsServiceApiInterface;
use APIsSilex\ProductsApi\Entity\ProductsApi;
use APIsSilex\ProductsApi\Mapper\ProductsMapperApi;


class ProductsServiceApi implements ProductsServiceApiInterface
{
    private $products;
    private $productsMapper;
    
    function __construct(ProductsApi $products, ProductsMapperApi $productsMapper) {
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

    public function updateApi(array $data = array())
    {
        $this->products->setId($data["id"])
                ->setName($data['name'])
                ->setDescription($data['description'])
                ->setValue($data['value']);

        return $this->productsMapper->updateApi($this->products);
    }

    public function delete($data)
    {
        $this->products->setId($data);
        return $this->productsMapper->delete($this->products);
    }
}
