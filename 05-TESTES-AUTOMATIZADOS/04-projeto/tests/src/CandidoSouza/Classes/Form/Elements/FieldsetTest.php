<?php

/**
 * @author Candido Souza
 * Date: 10/10/14
 * 04 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Form\Elements;

class FieldsetTest extends \PHPUnit_Framework_TestCase 
{
    private $class;

    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'CandidoSouza\Classes\Form\Elements\Fieldset'),
                "Class not Found: A Classe {$classe} não existe"
        );         
    }
    
    public function setUp() {
        $this->class = new Fieldset('fieldset');
    }
    
    public function tearDown()
    {
        $this->class = null;
    }

    public function testChecksIfTheClassTypeIsCorrect()
    {
        $this->assertInstanceOf("CandidoSouza\Classes\Form\Elements\Fieldset", $this->class);
    }
    
    /**
     * @depends testChecksIfTheClassTypeIsCorrect
     */
    public function testChecksIfTheClassIsImplementingTheInterface()
    {
        $interface = $this->getMock('CandidoSouza\Classes\Form\Interfaces\FormInterface');
        $this->assertTrue($interface instanceof \CandidoSouza\Classes\Form\Interfaces\FormInterface);
    }
    
    /**
     * @depends testChecksIfTheClassIsImplementingTheInterface
     */
    public function testChecksIfTheInterfaceTypeIsCorrect()
    {
        $this->assertInstanceOf("CandidoSouza\Classes\Form\Interfaces\FormInterface", $this->class);
    }
    
    public function testChecksIfThereSMethods()
    {
        $element = $this->getMockBuilder('CandidoSouza\Classes\Form\Util\Element')
                ->setMockClassName('Element')
                ->getMock();
        
        $this->class->createField($element);
        $this->assertTrue(method_exists($this->class, "createField"),"Method not Found: O Method não existe");
        
        $this->class->close($element);
        $this->assertTrue(method_exists($this->class, "close"),"Method not Found: O Method não existe");
    }
    
    public function testChecksIfTheReturnIsTheExpectedMethodcreateField()
    {
        $this->assertArrayHasKey('tag', ['tag' => 'fieldset']);
        $this->assertArrayHasKey('tag', ['tag' => ['name' => 'Formulário de Contato',]]);
    }
    
    public function testTheMethodClose()
    {
        $this->assertObjectHasAttribute('nome', $this->class);
        
        $element = new \CandidoSouza\Classes\Form\Util\Element();
        $elementMock = $this->getMockBuilder('CandidoSouza\Classes\Form\Util\Element')
                ->setMockClassName('Element')
                ->getMock();
        
        $tag = $this->class->close($element);
        
        $this->assertTrue(is_null($this->class->close($elementMock)));
        
        $this->assertNull($tag);
        $this->assertNotSame($tag, '</fieldset>');
        $this->assertStringStartsWith('</', '</fieldset>');
        $this->assertStringEndsWith('>', '</fieldset>'); 
    }
}
