<?php

namespace APIsSilex\Client\Mapper;

class ClientMapperInterfaceTest extends \PHPUnit_Framework_TestCase
{
    public function testChecksWhetherTheInterface()
    {
        $this->assertTrue(interface_exists($interface = '\APIsSilex\Client\Mapper\ClientMapperInterface'),
                "Interface not Foud: A Interface {$interface} não existe");        
    }
}
