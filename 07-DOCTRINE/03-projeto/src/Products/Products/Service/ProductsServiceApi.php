<?php

namespace Products\Products\Service;

use Products\Products\Entity\ProductsApi;
use Products\Products\Entity\Tag;
use Products\Products\Interfaces\ProductsServiceApiInterface;
use Products\Products\Entity\ProductsCategory;
use Doctrine\ORM\EntityManager;
use SebastianBergmann\Exporter\Exception;


class ProductsServiceApi implements ProductsServiceApiInterface
{
    private $em;
    
    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function fetchAll()
    {
        return $this->em->getRepository('Products\Products\Entity\ProductsApi')->findAll();
    }
    
    public function findOneById($id)
    {
        return $this->em->find('Products\Products\Entity\ProductsApi', $id);
    }

    public function insert(array $data= array())
    {
        $productsEntity = new ProductsApi();
        $productsEntity
            ->setName($data['form']['name'])
            ->setDescription($data['form']['description'])
            ->setValue($data['form']['value']);

        if(isset($data['form']['category'])){
            $productsCategory = new ProductsCategory();
            $productsCategory->setCategoryName($data['form']['category']);

            $this->em->persist($productsCategory);

            $productsEntity->setCategory($productsCategory);
        }

        if(count($data['form']['tags'])){
            $tags = explode(",", $data['form']['tags']);

            foreach($tags as $tag){
                $tagEntity = $this->em->getReference('Products\Products\Entity\Tag', $tag);

                $productsEntity->addTag($tagEntity);
            }
        }

        $this->em->persist($productsEntity);
        $this->em->flush();

        return $productsEntity;
    }

    public function update(array $data = array(), $id)
    {
        $products = $this->em->getReference('Products\Products\Entity\ProductsApi', $id);
        $products
            ->setName($data['name'])
            ->setDescription($data['description'])
            ->setValue($data['value']);
        if(isset($data['category'])){
            $productsCategory = new ProductsCategory();
            $productsCategory->setCategoryName($data['category']);

            $this->em->persist($productsCategory);

            $products->setCategory($productsCategory);
        }

        if(count($data['tags'])){
            $tags = explode(",", $data['tags']);

            foreach($tags as $tag){
                $tagEntity = $this->em->getReference('Products\Products\Entity\Tag', $tag);

                $products->addTag($tagEntity);
            }
        }

        $this->em->persist($products);
        $this->em->flush();

        return $products;
    }

    public function delete($id)
    {
        $products = $this->em->getReference('Products\Products\Entity\ProductsApi', $id);

        $this->em->remove($products);
        $this->em->flush();

        return $products;
    }

    public function OrderByName()
    {
        return $this->em->getRepository('Products\Products\Entity\ProductsApi')->findAllOrderByName();
    }

    public function OrderByValue()
    {
        return $this->em->getRepository('Products\Products\Entity\ProductsApi')->findAllOrderByValue();
    }

    public function search($name)
    {
        return $this->em->getRepository('Products\Products\Entity\ProductsApi')->search($name);
    }

    function pagination($pageSize, $currentPage)
    {
        return $this->em->getRepository('Products\Products\Entity\ProductsApi')->pagination($pageSize, $currentPage);
    }

    public function findAllCategory()
    {
        return $this->em->getRepository('Products\Products\Entity\ProductsCategory')->findAll();
    }

}
