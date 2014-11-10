<?php

namespace APIsSilex\Database;

use APIsSilex\Products\Entity\Products;

class Crud
{
    private $connect;

    public function __construct(\PDO $connect) {
        $connect instanceof \PDO;
        $this->connect = $connect;
    }

    public function persist(Products $products)
    {
        try{
            $this->connect->beginTransaction();
            $register = "INSERT INTO products (name, description, value) VALUES (:name, :description, :value)";
            $data = $this->connect->prepare($register);
            $data->execute(array(
                "name"          => $products->getName(),
                "description"   => $products->getDescription(),
                "value"         => $products->getValue()
            ));
            $this->connect->lastInsertId();
        } catch (PDOException $e) {
            echo "ERROR: Não foi possível cadastrar dados no banco!";
            die("Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
        }
    }

    public function flush()
    {
        try{
            $this->connect->commit();
        } catch (PDOException $e) {
            echo "ERROR: Não foi possível cadastrar dados no banco!";
            die("Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
        }
        return true;
    }
    
    public function read()
    {
        try{
            $listing = $this->connect->prepare("SELECT * FROM  products");
            $listing->execute();
            $data = $listing->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "ERROR: Não foi possível listar dados do banco!";
            die("Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
        }
        return $data;
    }


    public function update(Products $products)
    {
        try {
            $update = $this->connect->prepare("update products set name = :name, description = :description, value = :value where id = :id");
            $update->bindValue(":name", $products->getName());
            $update->bindValue(":description", $products->getDescription());
            $update->bindValue(":value", $products->getValue());
            $update->execute();
        } catch (PDOException $e) {
            die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
        }
    }
    
    public function delete(Products $products)
    {
        try {
            $deletar = $this->connect->prepare("delete from products where id = :id");
            $deletar->bindValue(":id", $products->getId());
            $deletar->execute();
        } catch (PDOException $e) {
            die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
        }
    }
}

