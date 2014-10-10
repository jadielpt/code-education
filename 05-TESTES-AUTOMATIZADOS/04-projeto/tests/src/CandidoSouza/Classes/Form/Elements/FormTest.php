<?php

/**
 * @author Candido Souza
 * Date: 08/10/14
 * 04 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Form\Elements;

class FormTest extends \PHPUnit_Framework_TestCase
{
    private $class;

    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'CandidoSouza\Classes\Form\Elements\Form'),
                "Class not Found: A Classe {$classe} não existe"
        );         
    }
    
    public function setUp() {
        $this->class = new Form('form');
    }
    
    public function tearDown()
    {
        $this->class = null;
    }

    public function testChecksIfTheClassTypeIsCorrect()
    {
        $this->assertInstanceOf("CandidoSouza\Classes\Form\Elements\Form", $this->class);
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
    
    public function testChecksIfTheReturnIsTheExpected()
    {
        $this->assertArrayHasKey('tag', ['tag' => 'form']);
        $this->assertArrayHasKey('tag', ['tag' => [
                                            'name' => 'form_contato',
                                            'class' => 'form-horizontal',
                                            'action' => 'dados.php',
                                            'method' => 'post'
                                        ]
                                    ]
                                );
    }
    
    public function testOMetodoClose()
    {
        $this->assertObjectHasAttribute('nome', $this->class);
        
        $element = new \CandidoSouza\Classes\Form\Util\Element();
        $elementMock = $this->getMockBuilder('CandidoSouza\Classes\Form\Util\Element')
                ->setMockClassName('Element')
                ->getMock();
        
        $tag = $this->class->close($element);
        
        $this->assertTrue(is_null($this->class->close($elementMock)));
        
        $this->assertNull($tag);
        $this->assertNotSame($tag, '</form>');
        $this->assertStringStartsWith('</', '</form>');
        $this->assertStringEndsWith('>', '</form>'); 
    }
}
