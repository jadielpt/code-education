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
                'name'        => $products->getName(),
                'description' => $products->getDescription(),
                'value'       => $products->getValue()
            ));
            $data->lastInsertId();
        } catch (PDOException $e) {
            echo "ERROR: Unable to list the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }
        return $data;
    }
}
