<?php
namespace APIsSilex\ProductsDB\Interfaces;

use APIsSilex\ProductsDB\Interfaces\ProductsInterface;

interface ProductsMapperInterface 
{
    public function fetchAll(ProductsInterface $products);

    public function insert(ProductsInterface $products);

    public function update(ProductsInterface $products);

    public function delete(ProductsInterface $products);
}
