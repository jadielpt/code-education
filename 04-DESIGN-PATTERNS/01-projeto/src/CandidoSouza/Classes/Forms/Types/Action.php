<?php
/**
 *
 * User: candidosouza
 * Date: 27/08/14
 * 01 - Projeto Design Patterns | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: Action.php
 * Linguagem: php
 * fonte: Livro PHP Programando com Orientação a Objetos(Pablo Dall'Oglio, Capitulo 06 - pag: 377-457), com modificações para adequação ao projeto
 *
 */

namespace CandidoSouza\Classes\Forms\Types;


class Action
{
    private $action;
    private $param;

    public function __construct($action)
    {
        $this->action = $action;
    }

    public function setParameter($param, $value)
    {
        $this->param[$param] = $value;
    }

    public function serialize()
    {
        if (is_array($this->action)){
            $url['class'] = get_class($this->action[0]);
            $url['method'] = $this->action[1];
        }elseif (is_string($this->action)){
            $url['method'] = $this->action;
        }
        if ($this->param){
            $url = array_merge($url, $this->param);
        }
        return '?' . http_build_query($url);
    }
}