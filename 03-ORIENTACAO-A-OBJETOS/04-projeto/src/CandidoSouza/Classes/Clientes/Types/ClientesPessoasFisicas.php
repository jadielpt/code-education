<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 01/08/14
 * Time: 17:51
 * 02 - Projeto Tipos de Clientes | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: ClientesPessoasFisicas.php
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Clientes\Types;


/**
 * Class ClientesPessoasFisicas
 * @package CandidoSouza\Clientes\Types;
 */
class ClientesPessoasFisicas extends Clientes
{
    protected $celular;

    /**
     * @param mixed $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }
} 