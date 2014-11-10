<?php

namespace APIsSilex\ProductsDB\Mapper;

use APIsSilex\ProductsDB\Interfaces\ProductsMapperInterface;
use APIsSilex\ProductsDB\Interfaces\ProductsInterface;
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
            $register = "INSERT INTO products (name, description, value) VALUES (:name, :description, :value)";
            $data = $this->connect->prepare($register);
            $data->execute(array(
                "name"          => $products->getName(),
                "description"   => $products->getDescription(),
                "value"         => $products->getValue()
            ));
            $this->connect->lastInsertId();
            $data->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "ERROR: Unable to list the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }
        return $data;
    }

    public function update(ProductsInterface $products)
    {
        try {
            Registry::set('connections', Connect::getDb());
            $conn = Registry::get('connections');
            $update = $conn->prepare("update products set name = :name, description = :description, value = :value  where id = :id");
            $update->bindValue(':id', $products->getId());
            $update->bindValue(':name', $products->getName());
            $update->bindValue(':description', $products->getDescription());
            $update->bindValue(':value', $products->getValue());
            $update->execute();

        } catch (PDOException $e) {
            die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
        }

    }
}
