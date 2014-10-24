<?php

namespace APIsSilex\Client\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

class ClientController implements ClientControllerInterface
{
    private $client;
    
    public function connect(Application $app) 
    {
        $client = $app['controllers_factory'];
        
        $client->get('/', function() use ($app){
            return self::getClient($app);
        });

        $client->get('/{client}', function($client) use ($app){
            return self::getClientId($app, $client);
        });
  
        return $client;
    }
    
    public function setClient(array $client) {
        $this->client = $client;
    }

    public function getClient(Application $app) 
    {
        return $app->json($this->client);
    }

    public function getClientId(Application $app, $client) 
    {
        if(!isset($this->client[$client])){
            $app->abort(404, "Client {$client} not found.");
        }
        return $app->json($this->client[$client]);
    }

}
