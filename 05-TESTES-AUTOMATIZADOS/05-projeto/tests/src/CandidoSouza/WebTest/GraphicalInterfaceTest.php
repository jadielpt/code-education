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
        $this->setBrowserUrl('http://127.0.0.1:8080/'); // Obs: O teste passa! Mas depende do host e porta
    }
    
    public function testTitle()
    {
        $this->url('/');
        $title = '05 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education';
        $this->assertEquals($title, $this->title());
        
        $hum = $this->byCssSelector('h1')->text();
        $this->assertEquals('Formúlario', $hum);
    }
    
    public function testValueOfInputs()
    {
        $this->url('/');
        
        $form = $this->byName('form-contato');
        $produto = $this->byName('nome');
        $valor = $this->byName('valor');
        $descricao = $this->byName('descricao');
        $categoria = $this->byTag('select');
        $button = $this->byName('enviar');
        
        $this->assertEquals('Laranja', $produto->value());
        $this->assertEquals(3.5, $valor->value());
        $this->assertEquals('Laranja Iowa', $descricao->value());
        $this->assertEquals('Frutas', $categoria->value());
        $this->assertEquals('Enviar', $button->value());
        
    }
    
    public function testSubmitForm()
    {
        $this->url('/');
        $form = $this->byCssSelector('form');
        $action = $form->attribute('action');
        $this->assertContains('dados.php', $action);
        $this->assertEquals('http://127.0.0.1:8080/dados.php', $action); // Obs: O teste passa! Mas depende do host e porta
        $this->assertTrue($this->byName('enviar')->enabled());
    }
    
    public function testSubmitToSelf()
    {
        $this->url( '/' );

        $form = $this->byName('form-contato');

        $action = $form->attribute('action');
        
        $this->assertContains('dados.php', $action);
        
        $this->byName('nome')->value('Limão');
        $this->byName('valor')->value(3.45);
        $this->byName('descricao')->value('Limão Azedo');
        $this->byTag('select')->value('Frutas');

        $form->submit();
    }
}
