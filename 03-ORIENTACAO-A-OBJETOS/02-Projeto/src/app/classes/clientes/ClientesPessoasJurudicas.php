<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 29/07/14
 * Time: 20:59
 * Projeto: Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: ClientesPessoasJuridicas.php
 * Linguagem: php
 */

namespace src\app\classes\clientes;

class ClientesPessoasJurudicas extends Clientes
{
    /**
     * @var
     */
    private $fax;

    /**
     * @param mixed $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }


} 