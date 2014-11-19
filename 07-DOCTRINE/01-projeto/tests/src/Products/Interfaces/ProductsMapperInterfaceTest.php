<?php

namespace Products\Interfaces;


class ProductsMapperInterfaceTest extends \PHPUnit_Framework_TestCase
{
    public function testChecksWhetherTheInterface()
    {
        $this->assertTrue(interface_exists($interface = 'Products\Interfaces\ProductsMapperInterface'),
            "Interface not Foud: A Interface {$interface} não existe");
    }
} 