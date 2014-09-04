<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 29/08/14
 * Time: 12:54
 */

namespace CandidoSouza\Classes\Forms\Types;
use CandidoSouza\Classes\Forms\Utils\Element;


class Input
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
        $tag->class = "form-control";
        $tag->type = "text";
        $tag->name = "nome";
        $tag->placeholder = "Nome";
        $tag->render();
    }

} 