<?php

namespace APIsSilex\Client\Service;

use APIsSilex\Client\Service\ClientServiceInterface;

use APIsSilex\Client\Entity\Client;
use APIsSilex\Client\Mapper\ClientMapper;

class ClientService implements ClientServiceInterface
{
    private $client;
    private $clientMapper;
            
    function __construct(Client $client, ClientMapper $clientMapper) 
    {
        $this->client = $client;
        $this->clientMapper = $clientMapper;
    }

    
    public function insert(array $data)
    {       
        $clientEntity = $this->client;
        $clientEntity->setName($data['name']);
        $clientEntity->setEmail($data['email']);
        $clientEntity->setCpfCnpj($data['cpfCnpj']);

        $clientMapper = $this->clientMapper;
        $result = $clientMapper->insert($clientEntity);
        
        return $result;
    }
}
