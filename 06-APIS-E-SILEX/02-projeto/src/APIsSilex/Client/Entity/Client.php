<?php

namespace APIsSilex\Client\Entity;

use APIsSilex\Client\Entity\ClientInterface;

class Client implements ClientInterface
{
    private $name;
    private $email;
    private $cpfCnpj;
    
    function setName($name) {
        $this->name = $name;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCpfCnpj($cpfCnpj) {
        $this->cpfCnpj = $cpfCnpj;
    }
    
    function getName() {
        return $this->name;
    }

    function getEmail() {
        return $this->email;
    }

    function getCpfCnpj() {
        return $this->cpfCnpj;
    }
}
