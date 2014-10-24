<?php

namespace APIsSilex\Client\Controllers;

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
        $this->assertInstanceOf('APIsSilex\Client\Controllers\ClientControllerInterface', $this->class);
    }
    
    public function testChecksIfThereSMethods()
    {
        $app = new \Silex\Application();
        
        $clientList = [ 
            '00001' => [
                ['nome' => 'Maria Jose', 'email' => 'maria@email.com']
            ]];
        
        $this->class->connect($app);
        $this->assertTrue(method_exists($this->class, "connect"),"Method not Found");
        
        $this->class->setClient($clientList);
        $this->assertTrue(method_exists($this->class, "setClient"),"Method not Found");
        
        $this->class->getClient($app);
        $this->assertTrue(method_exists($this->class, "getClient"),"Method not Found");
        
        $this->class->getClientId($app, '00001');
        $this->assertTrue(method_exists($this->class, "getClientId"),"Method not Found");    
    }
    
    public function testGettersAndSettersChecks()
    {
        $app = new \Silex\Application();
        $clientList = [ 
            'cliente' => [
                ['nome' => 'Maria Jose', 'email' => 'maria@email.com']
            ]];
        
        $result = $app->json($clientList);
        
        $this->class->setClient($clientList);
        $this->assertEquals($result, $this->class->getClient($app));
    }
    
    public function testCheckReturnGetCliente()
    {
        $app = new \Silex\Application();
        $list = [];
        $result = $app->json($list);
        $this->class->setClient($list);
        $getClient = $this->class->getClient($app);

        $this->assertEquals($result, $getClient,"No returns an string");
        
    }
    
    public function testCheckReturnGetClienteId()
    {
        $app = new \Silex\Application();
        $list = ['00001' => []];
        $this->class->setClient($list);
        $getClient = $this->class->getClient($app);
        
        $this->class->getClientId($app, '00001');
    }
}
