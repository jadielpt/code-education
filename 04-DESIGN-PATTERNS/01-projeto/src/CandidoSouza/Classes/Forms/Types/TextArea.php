<?php
/**
 *
 * User: candidosouza
 * Date: 26/08/14
 * 01 - Projeto Design Patterns | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: TextArea.php
 * Linguagem: php
 * fonte: Livro PHP Programando com Orientação a Objetos(Pablo Dall'Oglio, Capitulo 06 - pag: 377-457), com modificações para adequação ao projeto
 *
 */

namespace CandidoSouza\Classes\Forms\Types;
use CandidoSouza\Classes\Forms\Element;
use CandidoSouza\Classes\Forms\Field;



class TextArea extends Field
{


    public function __construct(Element $elementos, $nome)
    {
        parent::setNome($nome);
        $this->tag = $elementos;
        $this->tag->add($nome);
    }

    public function render()
    {
        $this->tag->name = $this->name;
        $this->tag->placeholder = $this->placeholder;
        $this->tag->class = $this->class;
        $this->tag->render();
    }
}