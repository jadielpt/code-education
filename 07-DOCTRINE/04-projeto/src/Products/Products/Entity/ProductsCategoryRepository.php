<?php

namespace Products\Products\Entity;


use Products\Products\Interfaces\ProductsCategoryRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ProductsCategoryRepository extends EntityRepository implements ProductsCategoryRepositoryInterface
{

    function pagination($pageSize, $currentPage)
    {
        $dql = "SELECT c FROM Products\Products\Entity\ProductsCategory c";
        $query = $this->getEntityManager()
            ->createQuery($dql)
            ->setFirstResult($pageSize * ($currentPage-1))
            ->setMaxResults($pageSize);

        $paginator = new Paginator($query, $fetchJoinCollection = true);
        $paginator->count();

        return $paginator;
    }
} 