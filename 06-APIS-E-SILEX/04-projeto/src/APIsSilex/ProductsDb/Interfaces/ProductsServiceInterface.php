<?php

namespace APIsSilex\ProductsDb\Interfaces;

interface ProductsServiceInterface 
{
    public function fetchAll();

    public function findOneById($id);

    public function insert(array $data= array());

    public function update(array $data = array());

    public function delete($data);
}
