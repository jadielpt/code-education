<?php
namespace APIsSilex\ProductsApi\Interfaces;

interface ProductsMapperApiInterface
{
    public function fetchAll();

    public function findOneById($id);

    public function insert(ProductsApiInterface $products);

    public function updateApi(ProductsApiInterface $products);

    public function delete(ProductsApiInterface $products);
}
