<?php

namespace Products\Products\Service;

use Products\Products\Entity\ProductsCategory;
use Products\Products\Interfaces\ProductsCategoryServiceInterface;
use Doctrine\ORM\EntityManager;

class ProductsCategoryService implements ProductsCategoryServiceInterface
{
    private $em;

    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function pagination($pageSize, $currentPage)
    {
        return $this->em->getRepository('Products\Products\Entity\ProductsCategory')->pagination($pageSize, $currentPage);
    }

    public function fetchAll()
    {
        return $this->em->getRepository('Products\Products\Entity\ProductsCategory')->findAll();
    }

    public function findOneById($id)
    {
        return $this->em->find('Products\Products\Entity\ProductsCategory', $id);
    }

    public function insert(array $data= array())
    {
        $productsCategory = new ProductsCategory();
        $productsCategory->setCategoryName($data['form']['name']);

        $this->em->persist($productsCategory);
        $this->em->flush();

        return $productsCategory;
    }

    public function insertApi(array $data= array())
    {
        $productsCategory = new ProductsCategory();
        $productsCategory->setCategoryName($data['name']);

        $this->em->persist($productsCategory);
        $this->em->flush();

        return $productsCategory;
    }

    public function update(array $data = array(), $id)
    {
        $productsCategory = $this->em->getReference('Products\Products\Entity\ProductsCategory', $id);
        $productsCategory->setCategoryName($data['name']);

        $this->em->persist($productsCategory);
        $this->em->flush();

        return $productsCategory;
    }

    public function delete($id)
    {
        $productsCategory = $this->em->getReference('Products\Products\Entity\ProductsCategory', $id);

        $this->em->remove($productsCategory);
        $this->em->flush();

        return $productsCategory;
    }

} 