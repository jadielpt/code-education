<?php

namespace APIsSilex\ProductsDB\Entity;

use APIsSilex\ProductsDB\Interfaces\ProductsInterface;

class Products implements ProductsInterface
{

    private $id;
    private $name;
    private $description;
    private $value;
    
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
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setValue($value) {
        $this->value = $value;
    }
}
