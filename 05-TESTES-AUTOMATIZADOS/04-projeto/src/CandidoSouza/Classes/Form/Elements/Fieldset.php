<?php

/**
 * @author Candido Souza
 * Date: 10/10/14
 * 04 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Form\Elements;

use CandidoSouza\Classes\Form\Interfaces\FormInterface;
use CandidoSouza\Classes\Form\Util\Element;

class Fieldset implements FormInterface
{
    public $nome;
    
    public function createField(Element $element) 
    {
        $tag = $element;
        $tag->tag = $this->nome;
        $tag->name = "Formulário de Contato";
        $tag->render();
    }
    
    public function close(Element $element) 
    {
        $tag = $element;
        $tag->tag = $this->nome;
        $tag->close();
    }
}
