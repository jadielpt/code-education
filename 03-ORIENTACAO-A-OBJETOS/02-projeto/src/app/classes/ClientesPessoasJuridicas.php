<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 01/08/14
 * Time: 17:51
 * 02 - Projeto Tipos de Clientes | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: ClientesPessoasJuridicas.php
 * Linguagem: php
 */

namespace src\app\classes;


/**
 * Class ClientesPessoasJuridicas
 * @package src\app\classes
 */
class ClientesPessoasJuridicas extends Clientes
{
    protected  $fax;

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