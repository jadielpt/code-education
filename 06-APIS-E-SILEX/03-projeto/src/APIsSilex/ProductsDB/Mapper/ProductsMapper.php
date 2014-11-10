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
//        try{
//            Registry::set('connections', Connect::getDb());
//            $conn = Registry::get('connections');
            //var_dump($conn); die;






//            $insert = $conn->prepare("INSERT INTO products (name, description, value) VALUES (:name, :description, :value)");
//
//            var_dump($conn); die;

//            $insert->execute(array(
//                ":name"          => $products->getName(),
//                ":description"   => $products->getDescription(),
//                ":value"         => $products->getValue()
//            ));
//            var_dump($insert);die;

//        } catch (PDOException $e) {
//            echo "ERROR: Unable to list the data in the database!";
//            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
//        }
        //return $data;
    }

    public function update(ProductsInterface $products)
    {
//        try {
//            Registry::set('connections', Connect::getDb());
//            $conn = Registry::get('connections');
//            $update = $conn->prepare("UPDATE products SET name = :name, description = :description, value = :value  WHERE id = :id");
//            $update->execute(array(
//                ':id' => $products->getId(),
//                ':name' => $products->getName(),
//                ':description' => $products->getDescription(),
//                ':value' => $products->getValue(),
//            ));
//        } catch (PDOException $e) {
//            die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
//        }
//
//        return $update;

    }

    public function delete(ProductsInterface $products)
    {
//        try {
//            Registry::set('connections', Connect::getDb());
//            $conn = Registry::get('connections');
//            $delete = $conn->prepare("delete from products where id = :id");
//            $delete->bindParam(":id", $products->getId());
//            $delete->execute();
//        } catch (PDOException $e) {
//            die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
//        }
    }
}
