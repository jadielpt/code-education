<?php
/**
 *
 * User: candidosouza
 * Date: 26/08/14
 * 01 - Projeto Design Patterns | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: Form.php
 * Linguagem: php
 * fonte: Livro PHP Programando com Orientação a Objetos(Pablo Dall'Oglio, Capitulo 06 - pag: 377-457), com modificações para adequação ao projeto
 *
 */

namespace CandidoSouza\Classes\Forms;
use CandidoSouza\Classes\Forms\Element;


class Form
{
    private   $nome;

    function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function render(Element $elementos)
    {
        $tag = $elementos;
        $tag->class = "form-horizontal";
        $tag->name = $this->nome;
        $tag->action = "";//dados.php";
        $tag->method = 'post';
        $tag->render();
    }
} 