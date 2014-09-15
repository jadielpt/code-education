<?php
/**
 * @author Candido Souza
 * Date: 10/09/14
 * 04 - Projeto | Módulo 04 - Design Patterns | Estudos Potal Code Education
 * Linguagem: php
 */
namespace CandidoSouza\Classes\Products\Utils;
use CandidoSouza\Classes\Products\Types\Products;
use CandidoSouza\Classes\Registry\Registry;

class ProductsDAO
{
    public function getConn()
    {
        return new \PDO("sqlite:db");
    }
    
    public function salva(Products $products)
    {
        $sql = "insert into produto (nome, valor, descrcao, categoria)"
                . "values({$products->nome},{$products->valor},{$products->descricao},{$products->categoria})";
                
        Registry::get(pdo)->exec($sql);
    }
}
