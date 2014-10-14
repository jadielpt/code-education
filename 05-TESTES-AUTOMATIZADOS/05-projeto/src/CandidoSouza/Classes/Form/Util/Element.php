<?php

/**
 * @author Candido Souza
 * Date: 14/10/14
 * 05 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Form\Util;

use CandidoSouza\Classes\Form\Interfaces\ElementInterface;

class Element implements ElementInterface
{
    public $tag;
    private $properties;
    private $class;


    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }
    
    public function open()
    {
        print "\n<{$this->tag}";
        if ($this->properties) {
            foreach ($this->properties as $name => $value) {
                print " {$name}=\"{$value}\"";
            }
        }
        print ">\n";
        
    }
    
    public function close() 
    {
        print "</{$this->tag}>\n";
    }

    public function render()
    {
        $this->open();
    }
}
