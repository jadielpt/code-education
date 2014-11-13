<?php

namespace APIsSilex\Client\Mapper;

use APIsSilex\Client\Entity\Client;

interface ClientMapperInterface 
{
    public function insert(Client $client);
}
