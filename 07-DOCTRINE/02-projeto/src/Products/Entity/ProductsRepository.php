<?php

namespace Products\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ProductsRepository extends EntityRepository
{
    // usando QueryBuilder
    public function findAllOrderByName()
    {
        return $this
            ->createQueryBuilder('p')
            ->orderBy('p.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // usando DQL
    public function findAllOrderByValue()
    {
        $dql = "SELECT p FROM Products\Entity\ProductsApi p ORDER BY p.value ASC";
        return $this->getEntityManager()
            ->createQuery($dql)
            ->getResult();
    }


    function pagination($pageSize, $currentPage)
    {


        $dql = "SELECT p FROM Products\Entity\ProductsApi p";
        $query = $this->getEntityManager()
            ->createQuery($dql)
            ->setFirstResult($pageSize * ($currentPage-1))
            ->setMaxResults($pageSize);

        $paginator = new Paginator($query, $fetchJoinCollection = true);
        $paginator->count();



        return $paginator;
    }
} 