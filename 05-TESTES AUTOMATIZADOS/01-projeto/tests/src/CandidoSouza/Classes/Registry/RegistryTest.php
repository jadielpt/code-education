<?php
/**
 * @author Candido Souza
 * Date: 26/09/14
 * 01 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */
namespace CandidoSouza\Classes\Registry;
use CandidoSouza\Classes\Registry\Registry;

class RegistryTest 
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
    
}
