<?php

namespace Products\Products\Interfaces;

interface ProductsApiInterface
{
    public function getId();

    public function getName();

    public function getDescription();

    public function getValue();

    public function getCategory();

    public function getTags();

    public function setId($id);

    public function setName($name);

    public function setDescription($description);

    public function setValue($value);

    public function setCategory($category);

    public function addTag($tags);
}
