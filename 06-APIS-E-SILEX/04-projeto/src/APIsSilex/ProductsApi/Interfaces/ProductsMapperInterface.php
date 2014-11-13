<?php
namespace APIsSilex\ProductsApi\Interfaces;

interface ProductsMapperInterface 
{
    public function fetchAll();

    public function findOneById($id);

    public function insert(ProductsInterface $products);

    public function update(ProductsInterface $products);

    public function delete(ProductsInterface $products);
}
