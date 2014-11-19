<?php

namespace Products\Entity;

use Products\Interfaces\ProductsApiInterface;

class ProductsApi implements ProductsApiInterface
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
}