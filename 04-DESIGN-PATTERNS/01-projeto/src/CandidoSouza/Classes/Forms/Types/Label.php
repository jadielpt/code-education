<?php
/**
 *
 * User: candidosouza
 * Date: 26/08/14
 * 01 - Projeto Design Patterns | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: Label.php
 * Linguagem: php
 * fonte: Livro PHP Programando com Orientação a Objetos(Pablo Dall'Oglio, Capitulo 06 - pag: 377-457), com modificações para adequação ao projeto
 *
 */

namespace CandidoSouza\Classes\Forms\Types;
use CandidoSouza\Classes\Forms\Field;
use CandidoSouza\Classes\Forms\Element;

class Label extends Field
{
    public $class;

    public function __construct(Element $elementos ,$placeholder)
    {
        $this->setPlaceholder($placeholder);
        $this->tag = $elementos;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    public function render()
    {
        $this->tag->class = $this->class;
        $this->tag->add($this->placeholder);
        $this->tag->render();
    }



}