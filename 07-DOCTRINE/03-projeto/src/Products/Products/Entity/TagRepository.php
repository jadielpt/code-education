<?php

namespace Products\Products\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Products\Products\Interfaces\TagRepositoryInterface;

class TagRepository extends EntityRepository implements TagRepositoryInterface
{
    function pagination($pageSize, $currentPage)
    {
        $dql = "SELECT t FROM Products\Products\Entity\Tag t";
        $query = $this->getEntityManager()
            ->createQuery($dql)
            ->setFirstResult($pageSize * ($currentPage-1))
            ->setMaxResults($pageSize);

        $paginator = new Paginator($query, $fetchJoinCollection = true);
        $paginator->count();

        return $paginator;
    }
} 