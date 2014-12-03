<?php

namespace Products\Mapper;

use Products\Interfaces\ProductsMapperApiInterface;
use Products\Interfaces\ProductsApiInterface;
use Doctrine\ORM\EntityManager;

class ProductsMapperApi implements ProductsMapperApiInterface
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function fetchAll()
    {
        try {
            $result = $this->em->getRepository('Products\Entity\ProductsApi')->findAll();
        } catch (PDOException $e) {
            echo "ERROR: Unable to list the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }

        return $result;
        // Documentação = http://doctrine-orm.readthedocs.org/en/latest/reference/working-with-objects.html 8.8. Querying
    }

    public function findOneById($id)
    {
        try {
            $result =  $this->em->find('Products\Entity\ProductsApi', $id);
        } catch (PDOException $e) {
            echo "ERROR: Unable to list the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }

        return $result;
        // Documentação = http://doctrine-orm.readthedocs.org/en/latest/reference/working-with-objects.html 8.8. Querying
    }

    public function insert(ProductsApiInterface $products)
    {
        try {
            $this->em->persist($products);
            $this->em->flush();
        } catch (PDOException $e) {
            echo "ERROR: Unable to list the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }

        $this->em->clear();

        return true;
        // documentação = http://doctrine-orm.readthedocs.org/en/latest/tutorials/getting-started.html
        // documentação = http://doctrine-orm.readthedocs.org/en/latest/reference/batch-processing.html
    }

    public function update(ProductsApiInterface $products, $id)
    {
        $products = $this->em->getReference('Products\Entity\ProductsApi', $id);

        try {
            $this->em->persist($products);
            $this->em->flush();
        } catch (PDOException $e) {
            echo "ERROR: Unable to list the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }

        return $products;
    }

    public function delete(ProductsApiInterface $products)
    {
        $products = $this->em->find('Products\Entity\ProductsApi', $products->getId());
        try {
            $this->em->remove($products);
            $this->em->flush();
        } catch (PDOException $e) {
            echo "ERROR: Unable to list the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }

        return true;
    }
}
