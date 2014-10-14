<?php

/**
 * @author Candido Souza
 * Date: 14/10/14
 * 05 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\WebTest;

class GraphicalInterfaceTest extends \PHPUnit_Extensions_Selenium2TestCase
{
    public function setUp() {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://127.0.0.1:8080/');
    }
    
    public function testVerificaTitle()
    {
        $this->url('http://127.0.0.1:8080/');
        $this->assertEquals('05 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education', $this->title());
    }
}
