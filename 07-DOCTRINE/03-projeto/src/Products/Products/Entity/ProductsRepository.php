<?php

namespace Products\Products\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Products\Products\Interfaces\ProductsRepositoryInterface;

class ProductsRepository extends EntityRepository implements ProductsRepositoryInterface
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
        $dql = "SELECT p FROM Products\Products\Entity\ProductsApi p ORDER BY p.value ASC";
        return $this->getEntityManager()
            ->createQuery($dql)
            ->getResult();
    }

    public function search($name)
    {
        $dql = "SELECT p FROM Products\Products\Entity\ProductsApi p WHERE p.name LIKE :search";
        return $this->getEntityManager()
            ->createQuery($dql)
            ->setParameter('search', "%{$name}%")
            ->getResult();
    }

    function pagination($pageSize, $currentPage)
    {
        $dql = "SELECT p FROM Products\Products\Entity\ProductsApi p";
        $query = $this->getEntityManager()
            ->createQuery($dql)
            ->setFirstResult($pageSize * ($currentPage-1))
            ->setMaxResults($pageSize);

        $paginator = new Paginator($query, $fetchJoinCollection = true);
        $paginator->count();

        return $paginator;
    }
} 