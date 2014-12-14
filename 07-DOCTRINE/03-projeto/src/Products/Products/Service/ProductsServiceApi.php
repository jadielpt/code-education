<?php

namespace Products\Products\Service;

use Products\Products\Entity\ProductsApi;
use Products\Products\Interfaces\ProductsServiceApiInterface;
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
        return $this->em->getRepository('Products\Products\Entity\ProductsApi')->findAll();
    }
    
    public function findOneById($id)
    {
        return $this->em->find('Products\Products\Entity\ProductsApi', $id);
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
        $products = $this->em->getReference('Products\Products\Entity\ProductsApi', $id);
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
        $products = $this->em->getReference('Products\Products\Entity\ProductsApi', $id);

        $this->em->remove($products);
        $this->em->flush();

        return $products;
    }

    public function OrderByName()
    {
        return $this->em->getRepository('Products\Products\Entity\ProductsApi')->findAllOrderByName();
    }

    public function OrderByValue()
    {
        return $this->em->getRepository('Products\Entity\ProductsApi')->findAllOrderByValue();
    }

    public function search($name)
    {
        return $this->em->getRepository('Products\Products\Entity\ProductsApi')->search($name);
    }

    function pagination($pageSize, $currentPage)
    {
        return $this->em->getRepository('Products\Products\Entity\ProductsApi')->pagination($pageSize, $currentPage);
    }

}
