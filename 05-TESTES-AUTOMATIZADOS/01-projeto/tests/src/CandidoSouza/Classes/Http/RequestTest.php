<?php
/**
 * @author Candido Souza
 * Date: 26/09/14
 * 01 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */ 

namespace CandidoSouza\Classes\Http;
use CandidoSouza\Classes\Http\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($classe = 'CandidoSouza\Classes\Http\Request'),
                "Class not Foud: A Classe {$classe} não existe"
        );         
    }
    
    public function setUp() {
        $this->class = new Request();
    }
    
    public function tearDown() {
        
    }
    
    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf(
                "CandidoSouza\Classes\Http\Request", $this->class
        );
    }
    
}
