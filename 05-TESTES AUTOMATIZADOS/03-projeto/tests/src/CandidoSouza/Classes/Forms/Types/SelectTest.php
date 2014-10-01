<?php
/**
 * @author Candido Souza
 * Date: 01/10/14
 * 03 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Forms\Types;
use CandidoSouza\Classes\Forms\Types\Select;

class SelectTest extends \PHPUnit_Framework_TestCase
{
    private $class;
    
    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'CandidoSouza\Classes\Forms\Types\Select'),
                "Class not Foud: A Classe {$classe} não existe"
        );         
    }
    
    public function setUp() {
        $this->class = new Select('nome');
    }
    
    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf(
                "CandidoSouza\Classes\Forms\Types\Select", $this->class
        );
    }
    
    /**
     * @depends testVerificaSeOTipoDaClasseEstaCorreto
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
    public function testVerificaSeestaImplementandoAInterface()
    {
        $interface = $this->getMock('CandidoSouza\Classes\Forms\Interfaces\FormInterface');
        $this->assertTrue($interface instanceof \CandidoSouza\Classes\Forms\Interfaces\FormInterface);
    }
    
    /**
     * @depends testVerificaSeestaImplementandoAInterface
     */
    public function testVerificaSeOsMetodosExiste()
    {
        $this->class->setClass('class');
        $this->assertTrue(
                method_exists($this->class, "setClass"),
                "Method not Foud: O Method não existe"
        );
        
        $element = $this->getMockBuilder('CandidoSouza\Classes\Forms\Utils\Element')
                ->setMockClassName('Element')
                ->getMock();
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
    public function testVerificaSeAsPropriedadesExiste()
    {
        $this->class->setClass('class');
        $property = "class";
        $this->assertTrue(
                property_exists($this->class, $property),
                "Property not Foud: A propriedade {$property} não existe"
        );
        
        $element = $this->getMockBuilder('CandidoSouza\Classes\Forms\Utils\Element')
                ->setMockClassName('Element')
                ->getMock();
        $this->class->createField($element);
        $property = "class";
        $this->assertTrue(
                property_exists($this->class, $property),
                "Property not Foud: A propriedade {$property} não existe"
        );
                
    }
    
}
