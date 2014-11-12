<?php

namespace APIsSilex\ProductsDb\Mapper;

use APIsSilex\ProductsDb\Interfaces\ProductsMapperInterface;
use APIsSilex\ProductsDb\Interfaces\ProductsInterface;
use APIsSilex\Registry\Registry;
use APIsSilex\Database\Connect;


class ProductsMapper implements ProductsMapperInterface
{
    public function fetchAll(ProductsInterface $products)
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

    public function insert(ProductsInterface $products)
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

    public function update(ProductsInterface $products)
    {
        try{
            Registry::set('connections', Connect::getDb());
            $conn = Registry::get('connections');
            $list = $conn->prepare("UPDATE products SET name = :name, description = :description, value = :value WHERE id = :id");
            $data = $list->execute(array(
                ':id'          => $products->getId(),
                ':name'        => $products->getName(),
                ':description' => $products->getDescription(),
                ':value'       => $products->getValue()
            ));
        } catch (PDOException $e) {
            echo "ERROR: Unable to list the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }
        //var_dump($data); die;
        return $data;
    }
}
