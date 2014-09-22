<?php
/**
 * @author Candido Souza
 * Date: 22/09/14
 * 01 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */
namespace CandidoSouza\Classes\Forms\Utils;
use CandidoSouza\Classes\Forms\Utils\Element;

class ElementTest extends \PHPUnit_Framework_TestCase
{
    /*
     * Para cada teste, roda esse método(está condição) uma vez, e se houver falhas, ele não roda nenhum dos demais testes.
     * Este condição verifica se a classe existe.
     */
    public function assetPreConditions()
    {
        $this->assertTrue(
                class_exists($class = "CandidoSouza\Classes\Forms\Utils\Element"),
                "Class not Foud: A Classe . {$class} . não existe"
        );
                
    }

    
    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $instance = new Element();
        $this->assertInstanceOf(
                "CandidoSouza\Classes\Forms\Utils\Element", $instance
        );
    }
    
    /**
     * depends testVerificaSeOTipoDaClasseEstaCorreto
     */
}
