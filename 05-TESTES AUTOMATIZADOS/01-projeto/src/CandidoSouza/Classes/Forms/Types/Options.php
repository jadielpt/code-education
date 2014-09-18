<?php
/**
 * @author Candido Souza
 * Date: 10/09/14
 * 03 - Projeto | Módulo 04 - Design Patterns | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Forms\Types;
use CandidoSouza\Classes\Forms\Utils\Element;
use CandidoSouza\Classes\Forms\Interfaces\FormInterface;

class Options implements FormInterface
{
    public $nome;
    public $param;
            
    function __construct($nome)
    {
        $this->nome = $nome;
    }
    
    public function getParam() {
        return $this->param;
    }

    public function setParam($param) {
        $this->param = $param;
    }

    public function createField(Element $elementos)
    {
        $tag = $elementos;
        $tag->tag = $this->nome;
        $tag->render();
    }
    
    public function close(Element $elementos)
    {
        $tag = $elementos;
        $tag->tag = $this->nome;
        $tag->close();  
    }
}
