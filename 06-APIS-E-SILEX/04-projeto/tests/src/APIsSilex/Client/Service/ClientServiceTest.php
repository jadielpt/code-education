<?php

namespace APIsSilex\Client\Service;

use APIsSilex\Client\Entity\Client;
use APIsSilex\Client\Mapper\ClientMapper;

class ClientServiceTest extends \PHPUnit_Framework_TestCase
{
    private $class;
    
    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'APIsSilex\Client\Service\ClientService'),
                "Class {$classe} not Foud!"
        );         
    }
    
    public function setUp() 
    {
        $client = new Client();
        $clientMapper = new ClientMapper();
        
        $this->class = new ClientService($client, $clientMapper);
    }
    
    public function tearDown()
    {
        unset($this->class);
    }

    public function testChecksIfTheClassTypeIsCorrect()
    {
        $this->assertInstanceOf(
                "APIsSilex\Client\Service\ClientService", $this->class
        );
    }
    
    /**
     * @depends testChecksIfTheClassTypeIsCorrect
     */
    public function testChecksIfTheInterfaceTypeIsCorrect()
    {
        $this->assertInstanceOf('APIsSilex\Client\Service\ClientServiceInterface', $this->class);
    }
    
    public function testChecksIfThereSMethods()
    {
        $data = [
            'name' => 'teste',
            'email' => 'teste@email.com',
            'cpfCnpj' => 77777777777
            ];
        $this->class->insert($data);
        $this->assertTrue(method_exists($this->class, "insert"),"Method not Found");
    }
    
    public function testChecksMethods()
    {
        $data = [
            'name' => 'teste',
            'email' => 'teste@email.com',
            'cpfCnpj' => 77777777777
            ];
        $this->class->insert($data);
        
        $client = new Client();
        $this->assertTrue($this->class->insert($data), $client->setName($data['name']));
        $this->assertTrue($this->class->insert($data), $client->setName($data['email']));
        $this->assertTrue($this->class->insert($data), $client->setName($data['cpfCnpj']));
        
        $clientMapper = new ClientMapper();
        $this->assertTrue($this->class->insert($data), $clientMapper->insert($client));
        
    }
}
