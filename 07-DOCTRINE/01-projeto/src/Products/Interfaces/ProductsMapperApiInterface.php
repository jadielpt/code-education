<?php
namespace Products\Interfaces;

use Products\Interfaces\ProductsApiInterface;

interface ProductsMapperApiInterface
{
    public function fetchAll();

    public function findOneById($id);

    public function insert(ProductsApiInterface $products);

    public function update(ProductsApiInterface $products);

    public function updateApi(ProductsApiInterface $products, $id);

    public function delete(ProductsApiInterface $products);
}
