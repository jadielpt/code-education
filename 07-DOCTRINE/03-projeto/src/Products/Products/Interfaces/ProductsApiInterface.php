<?php

namespace Products\Products\Interfaces;

interface ProductsApiInterface
{
    function getId();

    function getName();

    function getDescription();

    function getValue();

    function setId($id);

    function setName($name);

    function setDescription($description);

    function setValue($value);
}
