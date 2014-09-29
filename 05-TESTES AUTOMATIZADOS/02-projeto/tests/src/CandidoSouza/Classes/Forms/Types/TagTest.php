<?php
/**
 * @author Candido Souza
 * Date: 26/09/14
 * 02 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Forms\Types;
use CandidoSouza\Classes\Forms\Types\Tag;

class TagTest extends \PHPUnit_Framework_TestCase
{
    private $class;
 
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
    }
    
}
