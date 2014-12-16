<?php

namespace Products\Products\Service;

use Products\Products\Entity\ProductsCategory;
use Products\Products\Entity\Tag;
use Products\Products\Interfaces\ProductsTagsServiceInterface;
use Doctrine\ORM\EntityManager;

class ProductsTagsService implements ProductsTagsServiceInterface
{
    private $em;

    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    function pagination($pageSize, $currentPage)
    {
        return $this->em->getRepository('Products\Products\Entity\Tag')->pagination($pageSize, $currentPage);
    }

    public function fetchAll()
    {
        return $this->em->getRepository('Products\Products\Entity\Tag')->findAll();
    }

    public function findOneById($id)
    {
        return $this->em->find('Products\Products\Entity\Tag', $id);
    }

    public function insert(array $data= array())
    {
        $tags = new Tag();
        $tags->setName($data['form']['name']);

        $this->em->persist($tags);
        $this->em->flush();

        return $tags;
    }

    public function insertApi(array $data= array())
    {
        $tags = new Tag();
        $tags->setName($data['name']);

        $this->em->persist($tags);
        $this->em->flush();

        return $tags;
    }

    public function update(array $data = array(), $id)
    {
        $tag = $this->em->getReference('Products\Products\Entity\Tag', $id);
        $tag->setName($data['name']);

        $this->em->persist($tag);
        $this->em->flush();

        return $tag;
    }

    public function delete($id)
    {
        $tag = $this->em->getReference('Products\Products\Entity\Tag', $id);

        $this->em->remove($tag);
        $this->em->flush();

        return $tag;
    }

} 