<?php

namespace Products\Products\Interfaces;


interface ProductsCategoryRepositoryInterface
{
    function pagination($pageSize, $currentPage);

} 