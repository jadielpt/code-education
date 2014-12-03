<?php

namespace Products\Service;

use Products\Entity\ProductsApi;
use Products\Interfaces\ProductsServiceApiInterface;
use Doctrine\ORM\EntityManager;



class ProductsServiceApi implements ProductsServiceApiInterface
{
    private $em;
    
    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function fetchAll()
    {
        return $this->em->getRepository('Products\Entity\ProductsApi')->findAll();
    }
    
    public function findOneById($id)
    {
        return $this->em->find('Products\Entity\ProductsApi', $id);
    }

    public function insert(array $data= array())
    {
        $productsEntity = new ProductsApi();
        $productsEntity
            ->setName($data['name'])
            ->setDescription($data['description'])
            ->setValue($data['value']);

        $this->em->persist($productsEntity);
        $this->em->flush();

        return $productsEntity;
    }

    public function update(array $data = array(), $id)
    {
        $products = $this->em->getReference('Products\Entity\ProductsApi', $id);
        $products
            ->setName($data['name'])
            ->setDescription($data['description'])
            ->setValue($value);

        return $this->productsMapper->update($this->products, $id);
    }

    public function delete($data)
    {
        $this->products->setId($data);
        return $this->productsMapper->delete($this->products);
    }
}
