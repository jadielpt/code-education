<?php

/**
 * @author Candido Souza
 * Date: 08/10/14
 * 04 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Form\Elements;

use CandidoSouza\Classes\Form\Interfaces\FormInterface;
use CandidoSouza\Classes\Form\Util\Element;


class Form implements FormInterface
{
    public $nome;
    
    public function __construct($nome) {
        $this->nome = $nome;
    }
    
    public function createField(Element $element) 
    {
        $tag = $element;
        $tag->tag = $this->nome;
        $tag->name = "form_contato";
        $tag->class = "form-horizontal";
        $tag->action = "dados.php";
        $tag->method = 'post';
        $tag->render();
    }

    public function close(Element $element) 
    {
    }
}
