<?php

namespace APIsSilex\Client\Controllers;

use APIsSilex\Client\Entity\Client;
use APIsSilex\Client\Mapper\ClientMapper;
use APIsSilex\Client\Service\ClientService;

class ClientControllerTest extends \PHPUnit_Framework_TestCase
{
    private $class;
    
    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'APIsSilex\Client\Controllers\ClientController'),
                "Class {$classe} not Foud!"
        );         
    }
    
    public function setUp() {
        $this->class = new ClientController();
    }
    
    public function tearDown()
    {
        unset($this->class);
    }

    public function testChecksIfTheClassTypeIsCorrect()
    {
        $this->assertInstanceOf(
                "APIsSilex\Client\Controllers\ClientController", $this->class
        );
    }
    
    /**
     * @depends testChecksIfTheClassTypeIsCorrect
     */
    public function testChecksIfTheInterfaceTypeIsCorrect()
    {
        $this->assertInstanceOf('APIsSilex\Client\Controllers\ClientCtlInterface', $this->class);
    }
    
    public function testChecksIfThereSMethods()
    {
        $app = new \Silex\Application();
        
        $this->class->connect($app);
        $this->assertTrue(method_exists($this->class, "connect"),"Method not Found");
        
        $this->class->getClient($app);
        $this->assertTrue(method_exists($this->class, "getClient"),"Method not Found");   
    }
    
    /**
     * @depends testChecksIfThereSMethods
     */
    public function testChecksMethods()
    {
        $data['name'] = null;
        $data['email'] = null;
        $data['cpfCnpj'] = null;

        $client = new Client();
        $clientMapper = new ClientMapper();
        $app = new \Silex\Application();

        $clintService = new ClientService($client, $clientMapper);
        $result = $clintService->insert($data);
        $this->assertEquals(1, $result);
    }
}
