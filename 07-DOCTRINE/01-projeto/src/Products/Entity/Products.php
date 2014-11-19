<?php

namespace Products\Entity;

use Products\Interfaces\ProductsInterface;

class Products implements ProductsInterface
{
    private $id;
    private $code; // codigo
    private $name; // name
    private $description; //descrição
    private $unitValue; //valor unitário
    private $totalValue; // valor total
    private $unit; //unidade pc, litros, kilos, ...
    private $QuantityStock; // quantidade em estoque

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
        if (!is_numeric($this->code) && !is_int($this->code)) {
            throw new \InvalidArgumentException('ERROR: The code must be numeric and Integer, ERRO: O Código deve ser numérico e Inteiro');
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        if (!is_string($this->name)) {
            throw new \InvalidArgumentException('ERROR: Please enter a valid name, ERRO: Digite um nome válido');
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        if (!is_string($this->description)) {
            throw new \InvalidArgumentException('ERROR: Please enter a valid description, ERRO: Digite uma Descrição válida');
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUnitValue()
    {
        return $this->unitValue;
    }

    /**
     * @param mixed $unitValue
     */
    public function setUnitValue($unitValue)
    {
        $this->unitValue = $unitValue;
        if (!is_numeric($this->unitValue)) {
            throw new \InvalidArgumentException('ERROR: Enter a valid value, ERRO: Digite um valor válido');
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalValue()
    {
        return $this->totalValue;
    }

    /**
     * @param mixed $totalValue
     */
    public function setTotalValue($totalValue)
    {
        $this->totalValue = $totalValue;
        if (!is_numeric($this->totalValue)) {
            throw new \InvalidArgumentException('ERROR: Enter a valid value, ERRO: Digite um valor válido');
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param mixed $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
        if (!is_string($this->unit)) {
            throw new \InvalidArgumentException('ERROR: Enter a valid unit, ERRO: Digite uma unidade válida');
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantityStock()
    {
        return $this->QuantityStock;
    }

    /**
     * @param mixed $QuantityStock
     */
    public function setQuantityStock($QuantityStock)
    {
        $this->QuantityStock = $QuantityStock;
        if (!is_numeric($this->QuantityStock)) {
            throw new \InvalidArgumentException('ERROR: Please enter a valid quantity, ERRO: Digite uma quantidade válida');
        }
        return $this;
    }
} 