<?php

namespace APIsSilex\ProductsApi\Interfaces;

interface ProductsServiceApiInterface
{
    public function fetchAll();

    public function findOneById($id);

    public function insert(array $data= array());

    public function updateApi(array $data = array());

    public function delete($data);
}
