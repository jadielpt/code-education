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

/**
 * Class ClientesPessoasFisicas
 * @package andidoSouza\Classes\Clientes\Types;
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