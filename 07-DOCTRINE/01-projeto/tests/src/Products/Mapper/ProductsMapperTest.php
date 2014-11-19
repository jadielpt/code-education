<?php

namespace Products\Mapper;


class ProductsMapperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ProductsMapper
     */
    private $class;

    public function assertPreConditions()
    {
        $this->assertTrue(
            class_exists($classe = 'Products\Mapper\ProductsMapper'),
            "Class {$classe} not Foud!"
        );
    }

    public function setUp() {

        $this->class = new ProductsMapper();
    }

    public function tearDown()
    {
        unset($this->class);
    }

    public function testChecksIfTheClassTypeIsCorrect()
    {
        $this->assertInstanceOf(
            'Products\Mapper\ProductsMapper', $this->class
        );
    }

    /**
     * @depends testChecksIfTheClassTypeIsCorrect
     */
    public function testChecksIfTheInterfaceTypeIsCorrect()
    {
        $this->assertInstanceOf(
            'Products\Interfaces\ProductsMapperInterface', $this->class
        );
    }
} 