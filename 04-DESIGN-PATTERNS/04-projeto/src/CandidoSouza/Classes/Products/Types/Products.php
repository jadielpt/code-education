<?php
/**
 * @author Candido Souza
 * Date: 10/09/14
 * 04 - Projeto | Módulo 04 - Design Patterns | Estudos Potal Code Education
 * Linguagem: php
 */
namespace CandidoSouza\Classes\Products\Types;

class Products 
{
    private $id;
    private $nome;
    private $valor;
    private $descricao;
    
    public function setId($id) 
    {
        $this->id = $id;
        return $this;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }
    
    public function __clone()
    {
        $this->id = rand(2, 10);
    }
}
