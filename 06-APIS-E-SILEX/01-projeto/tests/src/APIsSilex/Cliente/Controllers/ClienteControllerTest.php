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
    
    public function testChecksIfThereSMethods()
    {
        $app = new \Silex\Application();
        
        $lista = [ 
            '00001' => [
                ['nome' => 'Maria Jose', 'email' => 'maria@email.com']
            ]];
        
        $this->class->connect($app);
        $this->assertTrue(method_exists($this->class, "connect"),"Method not Found: O Method não existe");
        
        $this->class->setCliente($lista);
        $this->assertTrue(method_exists($this->class, "setCliente"),"Method not Found: O Method não existe");
        
        $this->class->getCliente($app);
        $this->assertTrue(method_exists($this->class, "getCliente"),"Method not Found: O Method não existe");
        
        $this->class->getClienteId($app, '00001');
        $this->assertTrue(method_exists($this->class, "getClienteId"),"Method not Found: O Method não existe");    
    }
    
    public function testGettersAndSettersChecks()
    {
        $app = new \Silex\Application();
        $lista = [ 
            'cliente' => [
                ['nome' => 'Maria Jose', 'email' => 'maria@email.com']
            ]];
        
        $result = $app->json($lista);
        
        $this->class->setCliente($lista);
        $this->assertEquals($result, $this->class->getCliente($app));
    }
    
    public function testCheckReturnGetCliente()
    {
        $app = new \Silex\Application();
        $lista = [];
        $result = $app->json($lista);
        $this->class->setCliente($lista);
        $getCliente = $this->class->getCliente($app);

        $this->assertEquals($result, $getCliente,"No returns an string");
        
    }
    
    public function testCheckReturnGetClienteId()
    {
        $app = new \Silex\Application();
        $lista = ['00001' => []];
        $this->class->setCliente($lista);
        $getCliente = $this->class->getCliente($app);
        
        $this->class->getClienteId($app, '00001');
    }
}
