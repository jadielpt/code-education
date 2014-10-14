<?php

/**
 * @author Candido Souza
 * Date: 14/10/14
 * 05 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Form\Util;

class ElementTest extends \PHPUnit_Framework_TestCase
{
    private $class;


    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'CandidoSouza\Classes\Form\Util\Element'),
                "Class not Found: A Classe {$classe} não existe"
        );         
    }
    
    public function setUp() {
        $this->class = new Element();
    }
    
    public function tearDown()
    {
        unset($this->class);
    }

    public function testChecksIfTheClassTypeIsCorrect()
    {
        $this->assertInstanceOf("CandidoSouza\Classes\Form\Util\Element", $this->class);
    }
    
    /**
     * @depends testChecksIfTheClassTypeIsCorrect
     */
    public function testChecksIfTheClassIsImplementingTheInterface()
    {
        $interface = $this->getMock('CandidoSouza\Classes\Form\Interfaces\ElementInterface');
        $this->assertTrue($interface instanceof \CandidoSouza\Classes\Form\Interfaces\ElementInterface);
    }
    
    /**
     * @depends testChecksIfTheClassIsImplementingTheInterface
     */
    public function testChecksIfTheInterfaceTypeIsCorrect()
    {
        $this->assertInstanceOf("CandidoSouza\Classes\Form\Interfaces\ElementInterface", $this->class);
    }
    
    public function testChecksIfThereSMethods()
    {
        $this->class->open();
        $this->assertTrue(method_exists($this->class, "open"),"Method not Found: O Method não existe");
                
        $this->class->close();
        $this->assertTrue(method_exists($this->class, "close"),"Method not Found: O Method não existe");
                
        $this->class->render();
        $this->assertTrue(method_exists($this->class, "render"),"Method not Found: O Method não existe");
    }
}
