<?php

namespace APIsSilex\Client\Entity;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    private $class;
    
    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'APIsSilex\Client\Entity\Client'),
                "Class {$classe} not Foud!"
        );         
    }
    
    public function setUp() {
        $this->class = new Client();
    }
    
    public function tearDown()
    {
        unset($this->class);
    }

    public function testChecksIfTheClassTypeIsCorrect()
    {
        $this->assertInstanceOf(
                "APIsSilex\Client\Entity\Client", $this->class
        );
    }
    
    /**
     * @depends testChecksIfTheClassTypeIsCorrect
     */
    public function testChecksIfTheInterfaceTypeIsCorrect()
    {
        $this->assertInstanceOf('APIsSilex\Client\Entity\ClientInterface', $this->class);
    }
    
    public function testChecksIfThereSMethods()
    {
        $this->class->setName('name');
        $this->assertTrue(method_exists($this->class, "setName"),"Method not Found");
        
        $this->class->setEmail('email@email.com');
        $this->assertTrue(method_exists($this->class, "setEmail"),"Method not Found");
        
        $this->class->setCpfCnpj(77777777777);
        $this->assertTrue(method_exists($this->class, "setCpfCnpj"),"Method not Found");
        
        $this->class->getName();
        $this->assertTrue(method_exists($this->class, "getName"),"Method not Found");
        
        $this->class->getEmail();
        $this->assertTrue(method_exists($this->class, "getEmail"),"Method not Found");
        
        $this->class->getCpfCnpj();
        $this->assertTrue(method_exists($this->class, "getCpfCnpj"),"Method not Found");
    }
    
    /**
     * @depends testChecksIfThereSMethods
     */
    public function testCheckGetSet()
    {
        $this->class->setName('teste');
        $this->assertEquals('teste', $this->class->getName('teste'));
        
        $this->class->setEmail('teste@test.com');
        $this->assertEquals('teste@test.com', $this->class->getEmail('teste@test.com'));
        
        $this->class->setCpfCnpj(77777777777);
        $this->assertEquals(77777777777, $this->class->getCpfCnpj(77777777777));
    }
}
