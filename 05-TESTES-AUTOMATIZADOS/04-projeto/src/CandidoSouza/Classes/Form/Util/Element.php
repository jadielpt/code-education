<?php

/**
 * @author Candido Souza
 * Date: 08/10/14
 * 04 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Form\Util;

use CandidoSouza\Classes\Form\Interfaces\ElementInterface;

class Element implements ElementInterface
{
    public $tag;
    private $properties;
    
    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }
    
    public function open()
    {
        print "<{$this->tag}";
        if ($this->properties) {
            foreach ($this->properties as $name => $value) {
                print " {$name}=\"{$value}\"";
            }
        }
        print ">";
    }
    
    public function close() 
    {
        print "</{$this->tag}>";
    }

    public function render()
    {
        $this->open();
    }
}
