<?php

namespace Products\Mapper;

use Products\Interfaces\ProductsMapperApiInterface;
use Products\Interfaces\ProductsApiInterface;
use Products\Registry\Registry;
use Products\Database\Connect;

use Doctrine\ORM\Query\ResultSetMapping;
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
            Registry::set('connections', Connect::getDb());
            $conn = Registry::get('connections');
            $list = $conn->prepare("SELECT * FROM  products");
            $list->execute();
            $data = $list->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "ERROR: Unable to list the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }

        return $data;
    }
    
    public function findOneById($id)
    {
        try {
            $conn = Connect::getDb();
            $product = $conn->prepare("SELECT * FROM products WHERE id = :id");
            $product->bindValue("id", $id);
            $product->execute();
            $result = $product->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "ERROR: Unable to perform query!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }
        
        return $result;
    }

    public function insert(ProductsApiInterface $products)
    {
        try{
            Registry::set('connections', Connect::getDb());
            $conn = Registry::get('connections');
            $list = $conn->prepare("INSERT INTO products (name, description , value) VALUES (:name, :description , :value)");
            $data = $list->execute(array(
                ':name'        => $products->getName(),
                ':description' => $products->getDescription(),
                ':value'       => $products->getValue()
            ));
        } catch (PDOException $e) {
            echo "ERROR: Unable to list the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }

        return $data;
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
