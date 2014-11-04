<?php
namespace APIsSilex\Products\Interfaces;

use APIsSilex\Products\Entity\Products;

interface ProductsMapperInterface 
{
    public function insert(Products $products);
}
