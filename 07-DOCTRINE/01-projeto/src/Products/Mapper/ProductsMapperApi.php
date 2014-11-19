<?php

namespace Products\Mapper;

use Products\Interfaces\ProductsMapperApiInterface;
use Products\Interfaces\ProductsApiInterface;
use Products\Registry\Registry;
use Products\Database\Connect;

use Doctrine\ORM\EntityManager;


class ProductsMapperApi implements ProductsMapperApiInterface
{
    private $em;

    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function fetchAll()
    {
        try{
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
        try{
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
        try{
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

    public function update(ProductsApiInterface $products)
    {
        try{
            Registry::set('connections', Connect::getDb());
            $conn = Registry::get('connections');
            $list = $conn->prepare("UPDATE products SET name = :name, description = :description, value = :value WHERE id = :id");
            $list->bindValue("id", $products->getId());
            $list->bindValue("name", $products->getName(), \PDO::PARAM_STR);
            $list->bindValue("description", $products->getDescription(), \PDO::PARAM_STR);
            $list->bindValue("value", $products->getValue(), \PDO::PARAM_STR);

            $data = $list->execute();

        } catch (PDOException $e) {
            echo "ERROR: Unable to list the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }

        return $data;
    }

    public function updateApi(ProductsApiInterface $products, $id)
    {
        try{
            Registry::set('connections', Connect::getDb());
            $conn = Registry::get('connections');
            $list = $conn->prepare("UPDATE products SET name = :name, description = :description, value = :value WHERE id = :id");
            $list->bindValue("id", $id, \PDO::PARAM_INT);
            $list->bindValue("name", $products->getName(), \PDO::PARAM_STR);
            $list->bindValue("description", $products->getDescription(), \PDO::PARAM_STR);
            $list->bindValue("value", $products->getValue(), \PDO::PARAM_STR);

            $data = $list->execute();

        } catch (PDOException $e) {
            echo "ERROR: Unable to list the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }

        return $data;
    }

    public function delete(ProductsApiInterface $products)
    {
        try{
            Registry::set('connections', Connect::getDb());
            $conn = Registry::get('connections');
            $delete = $conn->prepare("DELETE FROM products WHERE id = :id");
            $delete->bindValue(':id', $products->getId());
            $data = $delete->execute();
        } catch (PDOException $e) {
            echo "ERROR: Unable to list the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }
        return $data;
    }
}
