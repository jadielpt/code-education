<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 29/07/14
 * Time: 20:59
 */

namespace src\app\classes\clientes;

use src\app\interfaces\ClientesInterface;

class ClientesPessoasJurudicas extends Clientes
{
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