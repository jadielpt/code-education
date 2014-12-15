<?php

namespace Products\Products\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products_category")
 */
class ProductsCategory
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    public $CategoryNome;

    /**
     * @return mixed
     */
    public function getCategoryNome()
    {
        return $this->CategoryNome;
    }

    /**
     * @param mixed $CategoryNome
     */
    public function setCategoryNome($CategoryNome)
    {
        $this->CategoryNome = $CategoryNome;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
} 