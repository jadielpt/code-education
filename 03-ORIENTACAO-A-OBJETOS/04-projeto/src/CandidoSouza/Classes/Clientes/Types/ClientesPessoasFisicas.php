<?php
/**
 * User: candidosouza
 * Date: 13/08/14
 * Time: 08:15
 * 04 - Projeto Persistência de dados | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: ClientesPessoasFisicas.php
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Clientes\Types;

use CandidoSouza\Classes\Databases\Crud;
/**
 * Class ClientesPessoasFisicas
 * @package CandidoSouza\Clientes\Types;
 */
class ClientesPessoasFisicas extends Clientes
{
    protected $celular;
    private $connect;

    public function __construct($connect) {
        $this->connect = $connect;
    }

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