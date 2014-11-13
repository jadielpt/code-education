<?php
namespace APIsSilex\ProductsApi\Interfaces;

use APIsSilex\ProductsApi\Interfaces\ProductsInterface;

interface ProductsMapperInterface 
{
    public function fetchAll();

    public function findOneById($id);

    public function insert(ProductsInterface $products);

    public function update(ProductsInterface $products);

    public function delete(ProductsInterface $products);
}
