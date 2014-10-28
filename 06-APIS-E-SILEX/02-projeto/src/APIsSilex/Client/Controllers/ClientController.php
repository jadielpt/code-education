<?php

namespace APIsSilex\Client\Controllers;

use ClientControllerInterface;
use APIsSilex\Client\Service\ClientService;
use Silex\Application;

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

    public function getClient(Application $app) 
    {
            $data['name'] = null;
            $data['email'] = null;
            $data['cpfCnpj'] = null;

            $clintService = new ClientService();
            $result = $clintService->insert($data);
            
            return $app->json($result);
    }

    public function getClientId(Application $app, $code) 
    {
            $data['name'] = null;
            $data['email'] = null;
            $data['cpfCnpj'] = null;
            
            $clintService = new ClientService();
            $result = $clintService->insert($data);
                    
            if(!isset($result[$code])){
                $app->abort(404, "Client {$code} not found.");
            }
            return $app->json($result[$code]);
    }

}
