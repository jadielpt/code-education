<?php

/**
 * @author Candido Souza
 * Date: 13/10/14
 * 04 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Form\Elements;

use CandidoSouza\Classes\Form\Interfaces\TagInterface;
use CandidoSouza\Classes\Form\Util\Element;

class Tag implements TagInterface
{
    public $properties = [];
    public $paran;
    public $nome;
    
    function __construct($properties, $nome)
    {
        $this->properties = $properties;
        $this->nome = $nome;
    }
    
    function getParam() {
        return $this->param;
    }

    function setParam($param) {
        $this->param = $param;
        Return $this;
    }
    
    public function createField(Element $element)
    {
        $tag = $element;
        $tag->tag = $this->nome;

        if(isset($this->properties['class'])){
        	$tag->class = $this->properties['class'];
        }
        if(isset($this->properties['type'])){
        	$tag->type = $this->properties['type'];
        }
        if(isset($this->properties['name'])){
        	$tag->name = $this->properties['name'];
        }
        if(isset($this->properties['value'])){
        	$tag->value = $this->properties['value'];
        }
        if(isset($this->properties['action'])){
        	$tag->action = $this->properties['action'];
        }
        if(isset($this->properties['method'])){
        	$tag->method = $this->properties['method'];
        }
        $tag->render();
    }
    
    public function close(Element $element)
    {
        $tag = $element;
        $tag->tag = $this->nome;
        $tag->close();  
    }
}
