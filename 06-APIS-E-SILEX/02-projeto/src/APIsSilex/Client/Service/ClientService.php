<?php

namespace APIsSilex\Client\Service;

use APIsSilex\Client\Entity\Client;
use APIsSilex\Client\Mapper\ClientMapper;

class ClientService 
{
    public function insert(array $data)
    {       
        $clientEntity = new Client();
        $clientEntity->setName($data['name']);
        $clientEntity->setEmail($data['email']);
        $clientEntity->setCpfCnpj($data['cpfCnpj']);

        $clientMapper = new ClientMapper();
        $result = $clientMapper->insert($clientEntity);
        
        return $result;
    }
}
