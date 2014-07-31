<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 29/07/14
 * Time: 20:59
 */

namespace src\app\classes\clientes;


use src\app\interfaces\ClientesInterface;

class ClientesPessoasFisicas extends Clientes
{
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