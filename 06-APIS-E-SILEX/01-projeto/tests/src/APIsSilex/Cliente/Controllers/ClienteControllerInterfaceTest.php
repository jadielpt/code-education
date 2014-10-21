<?php

namespace APIsSilex\Cliente\Controllers;

class ClienteControllerInterfaceTest extends \PHPUnit_Framework_TestCase
{
    public function testChecksWhetherTheInterface()
    {
        $this->assertTrue(interface_exists($interface = '\APIsSilex\Cliente\Controllers\ClienteControllerInterface'),
                "Interface not Foud: A Interface {$interface} não existe");        
    }
}
