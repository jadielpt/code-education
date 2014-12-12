<?php

namespace Products\Interfaces;

interface ProductsServiceApiInterface
{
    public function fetchAll();

    public function findOneById($id);

    public function insert(array $data= array());

    public function update(array $data = array(), $id);

    public function delete($data);

    public function OrderByName();

    public function OrderByValue();

    public function search($name);

    function pagination($pageSize, $currentPage);
}
