<?php

namespace Products\Products\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Products\Products\Interfaces\ProductsApiInterface;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Products\Products\Entity\ProductsRepository")
 * @ORM\Table(name="products")
 */
class ProductsApi implements ProductsApiInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    public  $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    public $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    public $description;

    /**
     * @ORM\Column(type="string", length=10)
     */
    public $value;

    /**
     *  @ORM\ManyToOne(targetEntity="Products\Products\Entity\ProductsCategory")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    public $category;

    /**
     * @ORM\ManyToMany(targetEntity="Products\Products\Entity\Tag")
     * @ORM\JoinTable(name="products_tags",
     *      joinColumns={@ORM\JoinColumn(name="products_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     *      )
     */
    public $tags;

    function __construct()
    {
        $this->tags = new ArrayCollection();
    }


    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function getValue() {
        return $this->value;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setName($name) {
        $this->name = $name;
        return $this;
    }

    function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    function setValue($value) {
        $this->value = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function addTag($tags)
    {
        $this->tags->add($tags);
    }


}