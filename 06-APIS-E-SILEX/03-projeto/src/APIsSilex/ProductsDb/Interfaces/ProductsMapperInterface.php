<?php
namespace APIsSilex\ProductsDb\Interfaces;

use APIsSilex\ProductsDb\Interfaces\ProductsInterface;

interface ProductsMapperInterface 
{
    public function insert(ProductsInterface $products);
}
