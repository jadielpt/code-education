<?php

namespace APIsSilex\Cliente\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

class ClienteController implements ClienteControllerInterface
{
    private $cliente;
    
    public function connect(Application $app) 
    {
        $cliente = $app['controllers_factory'];
        
        $cliente->get('/', function() use ($app){
            return self::getCliente($app);
        });

        $cliente->get('/{cliente}', function($cliente) use ($app){
            return self::getClienteId($app, $cliente);
        });
  
        return $cliente;
    }
    
    public function setCliente(array $cliente) {
        $this->cliente = $cliente;
    }

    public function getCliente(Application $app) 
    {
        return json_encode($this->cliente, JSON_PRETTY_PRINT);
    }

    public function getClienteId(Application $app, $cliente) 
    {
        if(!isset($this->cliente[$cliente])){
            $app->abort(404, "Cliente {$cliente} Não existe.");
        }
        return json_encode($this->cliente[$cliente]);
    }

}
