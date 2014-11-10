<?php
namespace APIsSilex\ProductsDB\Interfaces;

use APIsSilex\ProductsDB\Interfaces\ProductsInterface;

interface ProductsMapperInterface 
{
    public function insert(ProductsInterface $products);
}
