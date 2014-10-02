<?php
/**
 * @author Candido Souza
 * Date: 01/10/14
 * 03 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Forms\Types;
use CandidoSouza\Classes\Forms\Utils\Element;

class OptionsTest extends \PHPUnit_Framework_TestCase
{
    private $class;
    
    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'CandidoSouza\Classes\Forms\Types\Options'),
                "Class not Foud: A Classe {$classe} não existe"
        );         
    }
    
    public function setUp() {
        $this->class = new Options('nome');
   
        $this->conn = new \PDO("sqlite::memory:");
        $query = "create table selects(nome VARCHAR(255));";
        $this->conn->exec($query);
        
    }
        
    public function tearDown() {
        $query = "drop table selects";
        $this->conn->exec($query);
    }
    
    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf(
                "CandidoSouza\Classes\Forms\Types\Options", $this->class
        );
    }
    
    /**
     * @depends testVerificaSeOTipoDaClasseEstaCorreto
     */
    public function testVerificaSeestaImplementandoAInterface()
    {
        $interface = $this->getMock('CandidoSouza\Classes\Forms\Interfaces\FormInterface');
        $this->assertTrue($interface instanceof \CandidoSouza\Classes\Forms\Interfaces\FormInterface);
    }
    
    /**
     * @depends testVerificaSeestaImplementandoAInterface
     */
    public function testVerificaSeOTipoDaInterfaceEstaCorreta()
    {
        $this->assertInstanceOf(
                "CandidoSouza\Classes\Forms\Interfaces\FormInterface", $this->class
        );
    }
    
    /**
     * @depends testVerificaSeOTipoDaClasseEstaCorreto
     */
    public function testVerificaSeOsMetodosExiste()
    {
        $this->class->getParam();
        $this->assertTrue(
                method_exists($this->class, "getParam"),
                "Method not Foud: O Method não existe"
        );
        
        $this->class->setParam('param');
        $this->assertTrue(
                method_exists($this->class, "setParam"),
                "Method not Foud: O Method não existe"
        );
        
        $element = new Element;
        $this->class->createField($element);
        $this->assertTrue(
                method_exists($this->class, "createField"),
                "Method not Foud: O Method não existe"
        );
        
        $this->class->close($element);
        $this->assertTrue(
                method_exists($this->class, "close"),
                "Method not Foud: O Method não existe"
        );
    }
    
    /**
     * @depends testVerificaSeOsMetodosExiste
     */
    public function testVerificaOSetEGetFunciona()
    {
        $this->class->setParam("Ola");
        $this->assertEquals('Ola', $this->class->getParam('Ola'));
    }
    
    public function testVerificaOSetEGetInsertDeDadosPeloDB()
    {
        $insert = "insert into selects (nome) values ('teste')";
        $this->conn->exec($insert);
        
        $categoria = $this->conn->query("select * from selects")->fetchALL();
        
        
//        var_dump($categoria);
        
        
        $this->class->setParam($categoria[0]['nome']);
        $this->assertEquals(
                $categoria[0]['nome'], $this->class->getParam('teste')
        );
        
        $insert = "insert into selects (nome) values ('teste2')";
        $this->conn->exec($insert);
        $categoria = $this->conn->query("select * from selects")->fetchALL();
        $this->class->setParam($categoria[1]['nome']);
        $this->assertEquals(
                $categoria[1]['nome'], $this->class->getParam('teste2')
        );
        
        $insert = "insert into selects (nome) values ('teste3')";
        $this->conn->exec($insert);
        $categoria = $this->conn->query("select * from selects")->fetchALL();
        $this->class->setParam($categoria[2]['nome']);
        $this->assertEquals(
                $categoria[2]['nome'], $this->class->getParam('teste2')
        );
        
    }
}
