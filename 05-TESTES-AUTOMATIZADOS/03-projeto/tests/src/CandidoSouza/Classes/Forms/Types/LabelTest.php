<?php
/**
 * @author Candido Souza
 * Date: 01/10/14
 * 03 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Forms\Types;
use CandidoSouza\Classes\Forms\Utils\Element;

class LabelTest extends \PHPUnit_Framework_TestCase
{
    private $class;
    
    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'CandidoSouza\Classes\Forms\Types\Label'),
                "Class not Foud: A Classe {$classe} não existe"
        );         
    }
    
    public function setUp() {
        $this->class = new Label('nome');
    }
    
    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf(
                "CandidoSouza\Classes\Forms\Types\Label", $this->class
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
        
        $this->class->setClass('class');
        $this->assertTrue(
                method_exists($this->class, "setClass"),
                "Method not Foud: O Method não existe"
        );
        
        $element = new Element();
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
}
