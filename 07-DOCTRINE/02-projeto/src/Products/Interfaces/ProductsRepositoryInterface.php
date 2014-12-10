<?php

namespace Products\Interfaces;


interface ProductsRepositoryInterface
{
    public function findAllOrderByName();

    public function findAllOrderByValue();

    public function search($name);

    function pagination($pageSize, $currentPage);

} 