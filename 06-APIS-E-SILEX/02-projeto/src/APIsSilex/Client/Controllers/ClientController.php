<?php

namespace APIsSilex\Client\Controllers;

use APIsSilex\Client\Controllers\ClientInterface;
use APIsSilex\Client\Service\ClientService;
use Silex\Application;
use APIsSilex\Client\Entity\Client;
use APIsSilex\Client\Mapper\ClientMapper;

class ClientController implements ClientInterface
{
    
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

    public function getClient(Application $app) 
    {
            $data['name'] = null;
            $data['email'] = null;
            $data['cpfCnpj'] = null;
            
            $client = new Client();
            $clientMapper = new ClientMapper();

            $clintService = new ClientService($client, $clientMapper);
            $result = $clintService->insert($data);
            
            return $app->json($result);
    }

    public function getClientId(Application $app, $code) 
    {
            $data['name'] = null;
            $data['email'] = null;
            $data['cpfCnpj'] = null;
            
            $client = new Client();
            $clientMapper = new ClientMapper();

            $clintService = new ClientService($client, $clientMapper);
            $result = $clintService->insert($data);
                    
            if(!isset($result[$code])){
                $app->abort(404, "Client {$code} not found.");
            }
            return $app->json($result[$code]);
    }

}
