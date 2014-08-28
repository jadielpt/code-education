<?php
/**
 *
 * User: candidosouza
 * Date: 27/08/14
 * 01 - Projeto Design Patterns | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: Button.php
 * Linguagem: php
 * fonte: Livro PHP Programando com Orientação a Objetos(Pablo Dall'Oglio, Capitulo 06 - pag: 377-457), com modificações para adequação ao projeto
 *
 */

namespace CandidoSouza\Classes\Forms\Types;
use CandidoSouza\Classes\Forms\Field;


class Button extends Field
{
    private $action;
    private $label;
    private $formName;

    /**
     * @param mixed $action
     */
    public function setAction($action, $label)
    {
        $this->action = $action;
        $this->label = $label;
    }

    /**
     * @param mixed $formName
     */
    public function setFormName($name)
    {
        $this->formName = $name;
    }

    public function render()
    {
        $url = $this->action->serialize();
        $this->tag->type = 'submit';
        $this->tag->value = $this->label;
        $this->tag->name = 'enviar';
        $this->tag->onclick = "document.{$this->formName}action'{$url}'; document{$this->formName}.submit()";
        $this->tag->render();
    }
} 