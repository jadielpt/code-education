<?php

namespace APIsSilex\Cliente\Controllers;

class ClienteControllerTest extends \PHPUnit_Framework_TestCase
{
    private $class;
    
    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'APIsSilex\Cliente\Controllers\ClienteController'),
                "Class not Foud: A Classe {$classe} não existe"
        );         
    }
    
    public function setUp() {
        $this->class = new ClienteController();
    }
    
    public function tearDown()
    {
        unset($this->class);
    }

    public function testChecksIfTheClassTypeIsCorrect()
    {
        $this->assertInstanceOf(
                "APIsSilex\Cliente\Controllers\ClienteController", $this->class
        );
    }
    
    /**
     * @depends testChecksIfTheClassTypeIsCorrect
     */
    public function testChecksIfTheInterfaceTypeIsCorrect()
    {
        $this->assertInstanceOf('APIsSilex\Cliente\Controllers\ClienteControllerInterface', $this->class);
    }
}
