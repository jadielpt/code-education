<?php

/**
 * @author Candido Souza
 * Date: 14/10/14
 * 05 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Form\Elements;
use CandidoSouza\Classes\Form\Util\Element;

class TagTest extends \PHPUnit_Framework_TestCase
{
    private $class;
    private $properties = [];
    
    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'CandidoSouza\Classes\Form\Elements\Tag'),
                "Class not Found: A Classe {$classe} não existe"
        );         
    }
    
    public function setUp() {
        $properties = [
            'class' => 'teste'
        ];
        $this->class = new Tag($properties, 'teste');
    }
    
    public function tearDown()
    {
        unset($this->class);
    }
    
    public function testIfThereChecksInterface()
    {
        $this->assertTrue(
                interface_exists($interface = 'CandidoSouza\Classes\Form\Interfaces\TagInterface'),
                "Class not Found: A Interface {$interface} não existe"
        ); 
    }

    public function testChecksIfTheClassTypeIsCorrect()
    {
        $this->assertInstanceOf("CandidoSouza\Classes\Form\Elements\Tag", $this->class);
    }
    
    /**
     * @depends testChecksIfTheClassTypeIsCorrect
     */
    public function testChecksIfTheClassIsImplementingTheInterface()
    {
        $interface = $this->getMock('CandidoSouza\Classes\Form\Interfaces\TagInterface');
        $this->assertTrue($interface instanceof \CandidoSouza\Classes\Form\Interfaces\TagInterface);
    }
    
    /**
     * @depends testChecksIfTheClassIsImplementingTheInterface
     */
    public function testChecksIfTheInterfaceTypeIsCorrect()
    {
        $this->assertInstanceOf("CandidoSouza\Classes\Form\Interfaces\TagInterface", $this->class);
    }
    
    /**
     * @depends testChecksIfTheInterfaceTypeIsCorrect
     */
    public function testChecksIfThereSMethods()
    {
        $this->class->setParam('teste');
        $this->assertTrue(method_exists($this->class, "setParam"),"Method not Found: O Method não existe");
        
        $this->class->getParam();
        $this->assertTrue(method_exists($this->class, "getParam"),"Method not Found: O Method não existe");
            
        $element = new Element();
        
        $this->class->createField($element);
        $this->assertTrue(method_exists($this->class, "createField"),"Method not Found: O Method não existe");
                
        $this->class->close($element);
        $this->assertTrue(method_exists($this->class, "close"),"Method not Found: O Method não existe");
    }
    
    /**
     * @depends testChecksIfThereSMethods
     */
    public function testChecksIfThereProperties()
    {
        
        $this->class->setParam('teste');
        $property = 'param';
        $this->assertTrue(property_exists($this->class, $property), "Property not Foud: A propriedade {$property} não existe");
        
        $this->class->getParam();
        $property = 'param';
        $this->assertTrue(property_exists($this->class, $property), "Property not Foud: A propriedade {$property} não existe");
        
        $element = new Element();
        $this->class->createField($element);
        $property = 'properties';
        $this->assertTrue(
                property_exists($this->class, $property),
                "Property not Foud: A propriedade {$property} não existe"
        );
        
    }
    
    public function testGettersAndSettersChecks()
    {
        $this->class->setParam('teste');
        $this->assertEquals('teste', $this->class->getParam('teste'));
    }
    
    public function testCheckMethodCreatefield()
    {
        $form = [
            'class' => 'form-horizontal', 
            'name' => 'form-contato',
            'action' => 'dados.php',
            'method' => 'post'
        ];
        $element = new Element();
        $teste = new Tag($form, 'form');
        $teste->createField($element);

        $this->assertEquals(null, $teste->createField($element));
    }
    
    public function testCheckMethodClose()
    {
        $form = [
            'class' => 'form-horizontal', 
            'name' => 'form-contato',
            'action' => 'dados.php',
            'method' => 'post'
        ];
        $element = new Element();
        $teste = new Tag($form, 'form');
        $teste->close($element);

        $this->assertEquals(null, $teste->close($element));
    }
}
