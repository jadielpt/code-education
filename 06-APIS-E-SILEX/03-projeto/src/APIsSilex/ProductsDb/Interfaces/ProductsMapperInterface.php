<?php
namespace APIsSilex\ProductsDb\Interfaces;

use APIsSilex\ProductsDb\Interfaces\ProductsInterface;

interface ProductsMapperInterface 
{
    public function fetchAll();

    public function findOneById($id);

    public function insert(ProductsInterface $products);

    public function update(ProductsInterface $products);

    public function delete(ProductsInterface $products);
}
