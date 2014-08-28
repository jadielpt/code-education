<?php
/**
 *
 * User: candidosouza
 * Date: 26/08/14
 * 01 - Projeto Design Patterns | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: Field.php
 * Linguagem: php
 * fonte: Livro PHP Programando com Orientação a Objetos(Pablo Dall'Oglio, Capitulo 06 - pag: 377-457), com modificações para adequação ao projeto
 *
 */

namespace CandidoSouza\Classes\Forms;
use CandidoSouza\Classes\Forms\Element;


class Field
{
    protected $name;
    protected $placeholder;
    protected $tag;
    protected $class;

    function __construct(Element $elementos, $nome)
    {
        self::setNome($nome);
        $this->tag = $elementos;
        $this->tag->class = $nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->name = $nome;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->name;
    }

    /**
     * @param mixed $value
     */
    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;
    }

    /**
     * @return mixed
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }



    public function setProperty($nome, $value)
    {
        $this->tag->$nome = $value;
    }
} 