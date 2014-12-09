<?php

namespace Products\Service;

use Products\Entity\ProductsApi;
use Products\Interfaces\ProductsServiceApiInterface;
use Doctrine\ORM\EntityManager;
use SebastianBergmann\Exporter\Exception;


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
            ->setValue($data['value']);

        $this->em->persist($products);
        $this->em->flush();

        return $products;
    }

    public function delete($id)
    {
        $products = $this->em->getReference('Products\Entity\ProductsApi', $id);

        $this->em->remove($products);
        $this->em->flush();

        return $products;
    }

    public function OrderByName()
    {
        return $this->em->getRepository('Products\Entity\ProductsApi')->findAllOrderByName();
    }

    public function OrderByValue()
    {
        return $this->em->getRepository('Products\Entity\ProductsApi')->findAllOrderByValue();
    }

    public function search($name)
    {
        $query = $this->em->createQuery("SELECT p FROM Products\Entity\ProductsApi p WHERE p.name LIKE :search");
        $query->setParameter('search', "%{$name}%");

        $result = $query->getResult();

        return $result;
    }

    function pagination()
    {
        return $this->em->getRepository('Products\Entity\ProductsApi')->pagination();
    }

}
