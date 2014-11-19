<?php

namespace Products\Interfaces;

class ProductsInterfaceTest extends \PHPUnit_Framework_TestCase
{
    public function testChecksWhetherTheInterface()
    {
        $this->assertTrue(interface_exists($interface = 'Products\Interfaces\ProductsInterface'),
            "Interface not Foud: A Interface {$interface} não existe");
    }
} 