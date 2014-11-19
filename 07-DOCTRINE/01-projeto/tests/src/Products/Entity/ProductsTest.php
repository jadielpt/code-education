<?php

namespace Products\Entity;

class ProductsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Products
     */
    private $class;

    public function assertPreConditions()
    {
        $this->assertTrue(
            class_exists($classe = 'Products\Entity\Products'),
            "Class {$classe} not Foud!"
        );
    }

    public function setUp() {

        $this->class = new Products();
    }

    public function tearDown()
    {
        unset($this->class);
    }

    public function testChecksIfTheClassTypeIsCorrect()
    {
        $this->assertInstanceOf(
            'Products\Entity\Products', $this->class
        );
    }

    /**
     * @depends testChecksIfTheClassTypeIsCorrect
     */
    public function testChecksIfTheInterfaceTypeIsCorrect()
    {
        $this->assertInstanceOf(
            'Products\Interfaces\ProductsInterface', $this->class
        );
    }

    public function testChecksIfThereSMethods()
    {
        $this->class->getId();
        $this->assertTrue(method_exists($this->class, "getId"),"Method not Found");

        $this->class->setCode(7);
        $this->assertTrue(method_exists($this->class, "setCode"),"Method not Found");

        $this->class->getCode();
        $this->assertTrue(method_exists($this->class, "getCode"),"Method not Found");

        $this->class->setName('name');
        $this->assertTrue(method_exists($this->class, "setName"),"Method not Found");

        $this->class->getName();
        $this->assertTrue(method_exists($this->class, "getName"),"Method not Found");

        $this->class->setDescription('description');
        $this->assertTrue(method_exists($this->class, "setDescription"),"Method not Found");

        $this->class->getDescription();
        $this->assertTrue(method_exists($this->class, "getDescription"),"Method not Found");

        $this->class->setUnitValue(1.90);
        $this->assertTrue(method_exists($this->class, "setUnitValue"),"Method not Found");

        $this->class->getUnitValue();
        $this->assertTrue(method_exists($this->class, "getUnitValue"),"Method not Found");

        $this->class->setTotalValue(1,90);
        $this->assertTrue(method_exists($this->class, "setTotalValue"),"Method not Found");

        $this->class->getTotalValue();
        $this->assertTrue(method_exists($this->class, "getTotalValue"),"Method not Found");

        $this->class->setUnit('kilo');
        $this->assertTrue(method_exists($this->class, "setUnit"),"Method not Found");

        $this->class->getUnit();
        $this->assertTrue(method_exists($this->class, "getUnit"),"Method not Found");

        $this->class->setQuantityStock(1);
        $this->assertTrue(method_exists($this->class, "setQuantityStock"),"Method not Found");

        $this->class->getQuantityStock();
        $this->assertTrue(method_exists($this->class, "getQuantityStock"),"Method not Found");
    }

    /**
     * @depends testChecksIfThereSMethods
     */
    public function testCheckGetSet()
    {
        $this->class->setCode(1);
        $this->assertEquals(1, $this->class->getCode());

        $this->class->setName('tests');
        $this->assertEquals('tests', $this->class->getName());

        $this->class->setDescription('description');
        $this->assertEquals('description', $this->class->getDescription());

        $this->class->setUnitValue(10);
        $this->assertEquals(10, $this->class->getUnitValue());

        $this->class->setTotalValue(190);
        $this->assertEquals(190, $this->class->getTotalValue());

        $this->class->setUnit('pc');
        $this->assertEquals('pc', $this->class->getUnit());

        $this->class->setQuantityStock(1);
        $this->assertEquals(1, $this->class->getQuantityStock());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerifyingTheEntryOfTheCode()
    {
        $this->class->setCode('number');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerifyingTheEntryOfTheName()
    {
        $this->class->setName(1);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerifyingTheEntryOfTheDescription()
    {
        $this->class->setDescription(1.000,70);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerifyingTheEntryOfTheUnitValue()
    {
        $this->class->setUnitValue('teste');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerifyingTheEntryOfTheTotalValue()
    {
        $this->class->setTotalValue('teste');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerifyingTheEntryOfTheUnit()
    {
        $this->class->setUnit(777);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerifyingTheEntryOfTheQuantityStock()
    {
        $this->class->setQuantityStock("test");
    }
} 