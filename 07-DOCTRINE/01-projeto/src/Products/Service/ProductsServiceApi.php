<?php

namespace Products\Service;

use Products\Interfaces\ProductsServiceApiInterface;
use Products\Entity\ProductsApi;
use Products\Mapper\ProductsMapperApi;


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

        return $this->productsMapper->update($this->products);
    }

    public function updateApi(array $data = array(), $id)
    {
        $this->products->setName($data['name'])
            ->setDescription($data['description'])
            ->setValue($data['value']);

        return $this->productsMapper->updateApi($this->products, $id);
    }

    public function delete($data)
    {
        $this->products->setId($data);
        return $this->productsMapper->delete($this->products);
    }
}
