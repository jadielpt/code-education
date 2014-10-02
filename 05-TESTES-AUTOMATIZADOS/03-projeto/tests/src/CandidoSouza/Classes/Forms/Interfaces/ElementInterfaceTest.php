<?php
/**
 * @author Candido Souza
 * Date: 01/10/14
 * 03 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Interfaces;

class ElementInterfaceTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeAInterfaceExiste()
    {
        $this->assertTrue(
                interface_exists($interface = 'CandidoSouza\Classes\Forms\Interfaces\ElementInterfaces'),
                "Class not Foud: A Classe {$interface} não existe"
        );         
    }
}
