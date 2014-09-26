<?php
/**
 * @author Candido Souza
 * Date: 26/09/14
 * 01 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Validation;
use CandidoSouza\Classes\Validation\Validator;

class ValidatorTest
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
        $this->class = new Validator();
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
