<?php
/**
 * @author Candido Souza
 * Date: 04/09/14
 * 01 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */
namespace CandidoSouza\Classes\Forms\Types;
use CandidoSouza\Classes\Forms\Utils\Element;
use CandidoSouza\Classes\Forms\Interfaces\FormInterface;
use CandidoSouza\Classes\Validation\Validator;

class Form implements FormInterface
{
    public $nome;

    function __construct(Validator $validados, $nome)
    {
        $this->nome = $nome;
    }

    public function createField(Element $elementos)
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