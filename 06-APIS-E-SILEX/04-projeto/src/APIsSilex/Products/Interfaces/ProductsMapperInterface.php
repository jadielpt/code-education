<?php
namespace APIsSilex\Products\Interfaces;

use APIsSilex\Products\Interfaces\ProductsInterface;

interface ProductsMapperInterface 
{
    public function insert(ProductsInterface $products);
}
