<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 29/07/14
 * Time: 20:59
 * Projeto: Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: ClientesPessoasFisicas.php
 * Linguagem: php
 */

namespace src\app\classes\clientes;

class ClientesPessoasFisicas extends Clientes
{
    /**
     * @var
     */
    private $celular;

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