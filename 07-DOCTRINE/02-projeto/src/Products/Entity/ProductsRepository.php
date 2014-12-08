<?php

namespace Products\Entity;

use Doctrine\ORM\EntityRepository;

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
} 