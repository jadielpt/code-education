<?php
/**
 * @author Candido Souza
 * Date: 01/10/14
 * 03 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Validation;
use CandidoSouza\Classes\Http\Request;


class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    private $class;

    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'CandidoSouza\Classes\Validation\Validator'),
                "Class not Foud: A Classe {$classe} não existe"
        );         
    }
    
    public function setUp() {
        $request = new Request;
        $this->class = new Validator($request);
    }
    
    public function tearDown() {
        
    }

    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf(
                "CandidoSouza\Classes\Validation\Validator", $this->class
        );
    }
    
}
