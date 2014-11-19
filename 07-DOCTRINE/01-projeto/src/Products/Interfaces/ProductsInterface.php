<?php

namespace Products\Interfaces;

interface ProductsInterface
{
    public function getId();

    public function getCode();

    public function setCode($code);

    public function getName();

    public function setName($name);

    public function getDescription();

    public function setDescription($description);

    public function getUnitValue();

    public function setUnitValue($unitValue);

    public function getTotalValue();

    public function setTotalValue($totalValue);

    public function getUnit();

    public function setUnit($unit);

    public function getQuantityStock();

    public function setQuantityStock($QuantityStock);
}