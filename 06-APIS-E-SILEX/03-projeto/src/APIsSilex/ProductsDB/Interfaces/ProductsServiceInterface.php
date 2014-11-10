<?php

namespace APIsSilex\ProductsDB\Interfaces;

interface ProductsServiceInterface 
{
    public function fetchAll(array $data);

    public function insert(array $data);

    public function update(array $data);

    public function delete(array $data);
}
