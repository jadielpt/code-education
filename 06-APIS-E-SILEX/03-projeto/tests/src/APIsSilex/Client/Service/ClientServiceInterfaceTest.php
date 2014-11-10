<?php

namespace APIsSilex\Client\Service;

class ClientServiceInterfaceTest extends \PHPUnit_Framework_TestCase
{
    public function testChecksWhetherTheInterface()
    {
        $this->assertTrue(interface_exists($interface = '\APIsSilex\Client\Service\ClientServiceInterface'),
                "Interface not Foud: A Interface {$interface} não existe");        
    }
}
