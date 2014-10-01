<?php
/**
 * @author Candido Souza
 * Date: 01/10/14
 * 03 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Forms\Types;
use CandidoSouza\Classes\Forms\Types\Form;

class FormTest extends \PHPUnit_Framework_TestCase
{
    private $class;
    
    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'CandidoSouza\Classes\Forms\Types\Form'),
                "Class not Foud: A Classe {$classe} não existe"
        );
    }
    
    public function setUp() {
//        $request = $this->getMockBuilder('CandidoSouza\Classes\Http\Request')
//                ->setMockClassName('Request')
//                ->getMock();
        $validator = $this->getMockBuilder('CandidoSouza\Classes\Validation\Validator')
                ->setMockClassName('Validator')
                ->disableOriginalConstructor()
                ->getMock();
//        $validator = new \CandidoSouza\Classes\Validation\Validator($request);
        $this->class = new Form($validator, 'forulario');
    }
    
    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf(
                "CandidoSouza\Classes\Forms\Types\Form", $this->class
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
     * @depends testVerificaSeOTipoDaInterfaceEstaCorreta
     */
    public function testVerificaSeestaImplementandoAInterface()
    {
        $interface = $this->getMock('CandidoSouza\Classes\Forms\Interfaces\FormInterface');
        $this->assertTrue($interface instanceof \CandidoSouza\Classes\Forms\Interfaces\FormInterface);
    }

}
