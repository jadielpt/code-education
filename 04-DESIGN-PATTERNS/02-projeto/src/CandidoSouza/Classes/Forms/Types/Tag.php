<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 29/08/14
 * Time: 12:54
 */

namespace CandidoSouza\Classes\Forms\Types;
use CandidoSouza\Classes\Forms\Utils\Element;


class Tag
{
    public $nome;
    public $name;
    public $type;
    public $placeholder;
    public $class;
            
    function __construct($nome)
    {
        $this->nome = $nome;
    }
    
    public function setType($type) 
    {
        $this->type = $type;
    }

    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;
    }

    public function setName($name) 
    {
        $this->name = $name;
    }
    
    public function setClass($class) {
        $this->class = $class;
    }

    public function render(Element $elementos)
    {
        $tag = $elementos;
        $tag->tag = $this->nome;
        $tag->class = $this->class;
        $tag->type = $this->type;
        $tag->name = $this->name;
        $tag->placeholder = $this->placeholder;
        $tag->render();
    }
    
    public function close(Element $elementos)
    {
        $tag = $elementos;
        $tag->tag = $this->nome;
        $tag->close();  
    }

} 