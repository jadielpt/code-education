<?php

namespace APIsSilex\Products\Mapper;

use APIsSilex\Products\Interfaces\ProductsMapperInterface;
use APIsSilex\Products\Interfaces\ProductsInterface;
use APIsSilex\Registry\Registry;
use APIsSilex\Database\Connect;


class ProductsMapper implements ProductsMapperInterface
{
    public function insert(ProductsInterface $products)
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
}
