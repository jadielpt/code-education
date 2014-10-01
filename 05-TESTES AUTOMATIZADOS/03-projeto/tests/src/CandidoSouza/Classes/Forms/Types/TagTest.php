<?php
/**
 * @author Candido Souza
 * Date: 01/10/14
 * 03 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Forms\Types;
use CandidoSouza\Classes\Forms\Types\Tag;

class TagTest extends \PHPUnit_Framework_TestCase
{
    private $class;
    private $tag;


    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'CandidoSouza\Classes\Forms\Types\Tag'),
                "Class not Foud: A Classe {$classe} não existe"
        );         
    }
    
    public function setUp() {
        $this->class = new Tag('nome');
    }
    
    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf(
                "CandidoSouza\Classes\Forms\Types\Tag", $this->class
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
        $this->class->setType('type');
        $this->assertTrue(
                method_exists($this->class, "setType"),
                "Method not Foud: O Method não existe"
        );
                
        $this->class->setValue('values');
        $this->assertTrue(
                method_exists($this->class, "setValue"),
                "Method not Foud: O Method não existe"
        );
                
        $this->class->setName('name');
        $this->assertTrue(
                method_exists($this->class, "setName"),
                "Method not Foud: O Method não existe"
        );
        
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
        $element = $this->getMockBuilder('CandidoSouza\Classes\Forms\Utils\Element')
                ->setMockClassName('Element')
                ->getMock();
        $this->class->createField($element);
        $property = "class";
        $this->assertTrue(
                property_exists($this->class, $property),
                "Property not Foud: A propriedade {$property} não existe"
        );
        $property = "type";
        $this->assertTrue(
                property_exists($this->class, $property),
                "Property not Foud: A propriedade {$property} não existe"
        );
        $property = "name";
        $this->assertTrue(
                property_exists($this->class, $property),
                "Property not Foud: A propriedade {$property} não existe"
        );
        $property = "value";
        $this->assertTrue(
                property_exists($this->class, $property),
                "Property not Foud: A propriedade {$property} não existe"
        );
                
        // tentar transformar em um array
    }
    
    
    
}
