<?php

namespace APIsSilex\Client\Mapper;

use APIsSilex\Client\Entity\Client;

class ClientMapperTest extends \PHPUnit_Framework_TestCase
{
    private $class;
    
    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'APIsSilex\Client\Mapper\ClientMapper'),
                "Class {$classe} not Foud!"
        );         
    }
    
    public function setUp() 
    {
        $this->class = new ClientMapper();
    }
    
    public function tearDown()
    {
        unset($this->class);
    }

    public function testChecksIfTheClassTypeIsCorrect()
    {
        $this->assertInstanceOf(
                "APIsSilex\Client\Mapper\ClientMapper", $this->class
        );
    }
    
    /**
     * @depends testChecksIfTheClassTypeIsCorrect
     */
    public function testChecksIfTheInterfaceTypeIsCorrect()
    {
        $this->assertInstanceOf('APIsSilex\Client\Mapper\ClientMapperInterface', $this->class);
    }
    
    public function testChecksIfThereSMethods()
    {
        $client = new Client();
        
        $this->class->insert($client);
        $this->assertTrue(method_exists($this->class, "insert"),"Method not Found");
    }
    
    /**
     * @depends testChecksIfThereSMethods
     */
    public function testChecksMethods()
    {
        $data = [
            'name' => 'teste',
            'email' => 'teste@email.com',
            'cpfCnpj' => 77777777777
            ];
        
        $client = new Client();
        $this->assertTrue($this->class->insert($client), $data);
    }
}
