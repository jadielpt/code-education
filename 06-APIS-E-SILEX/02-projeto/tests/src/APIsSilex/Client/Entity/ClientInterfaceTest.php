<?php

namespace APIsSilex\Client\Entity;

class ClientInterfaceTest extends \PHPUnit_Framework_TestCase
{
    public function testChecksWhetherTheInterface()
    {
        $this->assertTrue(interface_exists($interface = '\APIsSilex\Client\Entity\ClientInterface'),
                "Interface not Foud: A Interface {$interface} não existe");        
    }
}
