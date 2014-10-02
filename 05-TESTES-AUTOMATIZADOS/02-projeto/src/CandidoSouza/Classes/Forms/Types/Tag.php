<?php
/**
 * @author Candido Souza
 * Date: 26/09/14
 * 02 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Forms\Types;
use CandidoSouza\Classes\Forms\Utils\Element;
use CandidoSouza\Classes\Forms\Interfaces\FormInterface;


class Tag implements FormInterface
{
    public $nome;
    public $name;
    public $type;
    public $valor;
    public $class;
    public $value;
            
    function __construct($nome)
    {
        $this->nome = $nome;
    }
    
    public function setType($type) 
    {
        $this->type = $type;
    }
    
    public function setValue($value)
    {
        $this->value = $value;
            
    }

    public function setName($name) 
    {
        $this->name = $name;
    }
    
    public function setClass($class) {
        $this->class = $class;
    }

    public function createField(Element $elementos)
    {
        $tag = $elementos;
        $tag->tag = $this->nome;
        $tag->class = $this->class;
        $tag->type = $this->type;
        $tag->name = $this->name;
        $tag->value = $this->value;
        $tag->render();
    }
    
    public function close(Element $elementos)
    {
        $tag = $elementos;
        $tag->tag = $this->nome;
        $tag->close();  
    }
} 