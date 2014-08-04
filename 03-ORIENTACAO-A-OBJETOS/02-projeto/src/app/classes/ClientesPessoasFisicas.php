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

namespace src\app\classes;
use src\app\interfaces\EndCobrancaInterface;


/**
 * Class ClientesPessoasFisicas
 * @package src\app\classes
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
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }
} 