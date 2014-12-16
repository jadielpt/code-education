<?php

namespace Products\Products\Interfaces;


interface ProductsCategoryServiceInterface
{
    public function pagination($pageSize, $currentPage);

    public function fetchAll();

    public function findOneById($id);

    public function insert(array $data= array());

    public function insertApi(array $data= array());

    public function update(array $data = array(), $id);

    public function delete($id);

} 