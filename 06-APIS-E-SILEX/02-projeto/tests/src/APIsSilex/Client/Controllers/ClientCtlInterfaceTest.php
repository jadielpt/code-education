<?php

namespace APIsSilex\Client\Controllers;

class ClientControllerInterfaceTest extends \PHPUnit_Framework_TestCase
{
    public function testChecksWhetherTheInterface()
    {
        $this->assertTrue(interface_exists($interface = '\APIsSilex\Client\Controllers\ClientCtlInterface'),
                "Interface not Foud: A Interface {$interface} não existe");        
    }
}
