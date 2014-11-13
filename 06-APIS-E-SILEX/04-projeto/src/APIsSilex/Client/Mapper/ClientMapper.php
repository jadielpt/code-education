<?php

namespace APIsSilex\Client\Mapper;

use APIsSilex\Client\Mapper\ClientMapperInterface;
use APIsSilex\Client\Entity\Client;

class ClientMapper implements ClientMapperInterface
{
    public $client;
    
    public function insert(Client $client)
    {
        $data = require_once __DIR__ . '/../Views/CientJsonView.php';
        return $data;
    }
}
