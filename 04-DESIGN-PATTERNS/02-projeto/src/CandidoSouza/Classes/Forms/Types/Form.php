<?php
/**
 * @author Candido Souza
 * Date: 26/08/14
 * 02 - Projeto | Módulo 04 - Design Patterns | Estudos Potal Code Education
 * Linguagem: php
 */
namespace CandidoSouza\Classes\Forms\Types;
use CandidoSouza\Classes\Forms\Utils\Element;


class Form
{
    public $nome;

    function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function render(Element $elementos)
    {
        $tag = $elementos;
        $tag->tag = $this->nome;
        $tag->name = "form_contato";
        $tag->class = "form-horizontal";
        $tag->action = "dados.php";
        $tag->method = 'post';
        $tag->render();
    }
    
    public function close(Element $elementos)
    {
        $tag = $elementos;
        $tag->tag = $this->nome;
        $tag->close();  
    }

} 