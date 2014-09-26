<?php
/**
 * @author Candido Souza
 * Date: 22/09/14
 * 01 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */
namespace CandidoSouza\Classes\Forms\Utils;
use CandidoSouza\Classes\Forms\Utils\Element;

class ElementTest extends \PHPUnit_Framework_TestCase
{
    private $class;
    
    /*
     * Roda este método, antes de rodas os testes
     * Neste caso está instanciando a classe Element
     */
    public function setUp() {
        $this->class = new Element();;
    }
    
    /*
     * Roda este método, depois de rodas os testes
     * Neste caso não está fazendo nada
     */
    public function tearDown() {
        
    }
    
    /*
     * Roda esse método(está condição) uma vez, e se houver falhas, ele não roda nenhum dos demais testes.
     * Este condição verifica se a classe existe.
     */
    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'CandidoSouza\Classes\Forms\Utils\Element'),
                "Class not Foud: A Classe {$classe} não existe"
        );         
    }

    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf(
                "CandidoSouza\Classes\Forms\Utils\Element", $this->class
        );
    }
    
    /**
     * @depends testVerificaSeOTipoDaClasseEstaCorreto
     */
    public function testVerificaSeOTipoDaInterfaceEstaCorreta()
    {
        $this->assertInstanceOf(
                "CandidoSouza\Classes\Forms\Interfaces\ElementInterfaces", $this->class
        );

    }
    
    /**
     * @depends testVerificaSeOTipoDaClasseEstaCorreto
     */
    public function testVerificaSeOsMetodosExiste()
    {
        $this->class->open();
        $this->assertTrue(
                method_exists($this->class, "open"),
                "Method not Foud: O Method não existe"
        );
                
        $this->class->close();
        $this->assertTrue(
                method_exists($this->class, "open"),
                "Method not Foud: O Method não existe"
        );
                
        $this->class->render();
        $this->assertTrue(
                method_exists($this->class, "render"),
                "Method not Foud: O Method não existe"
        );
    }
    
    public function testVerificaSeAPropriedadeExiste()
    {
        $this->class->open();
        $property = "properties";
        $this->assertTrue(
                property_exists($this->class, $property),
                "Property not Foud: A propriedade {$property} não existe"
        );
    }
}
