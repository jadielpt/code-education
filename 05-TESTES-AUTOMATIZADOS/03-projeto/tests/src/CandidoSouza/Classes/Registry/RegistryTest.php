<?php
/**
 * @author Candido Souza
 * Date: 01/10/14
 * 03 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Registry;
use CandidoSouza\Classes\Registry\Registry;

class RegistryTest extends \PHPUnit_Framework_TestCase
{
    private $class;

    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'CandidoSouza\Classes\Registry\Registry'),
                "Class not Foud: A Classe {$classe} não existe"
        );         
    }

    public function setUp() {
        $this->class = new Registry();
    }

    public function tearDown() {
        
    }

    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf(
                "CandidoSouza\Classes\Registry\Registry", $this->class
        );
    }
    
    /**
     * @depends testVerificaSeOTipoDaClasseEstaCorreto
     */
    public function testVerificaSeOsMetodosExiste()
    {
        $this->class->set("Olá", "teste");
        $this->assertTrue(
                method_exists($this->class, "set"),
                "Method not Foud: O Method não existe"
        );
        
        $this->class->get("Olá");
        $this->assertTrue(
                method_exists($this->class, "get"),
                "Method not Foud: O Method não existe"
        );
    }

    /**
     * @depends testVerificaSeOsMetodosExiste
     */
    public function testVerificaSeAPropriedadeExiste()
    {
        $this->class->set("Ola", "teste");
        $property = "values";
        $this->assertTrue(
                property_exists($this->class, $property),
                "Property not Foud: A propriedade {$property} não existe"
        );
                
        $this->class->get("Ola");
        $property = "values";
        $this->assertTrue(
                property_exists($this->class, $property),
                "Property not Foud: A propriedade {$property} não existe"
        );
    }
    
    /**
     * @depends testVerificaSeAPropriedadeExiste
     * 
     */
    public function testVerificaOSetEGetFunciona()
    {
        $this->class->set("Ola", "teste");
        $this->assertEquals('teste', $this->class->get('Ola'));
    }
    
}
