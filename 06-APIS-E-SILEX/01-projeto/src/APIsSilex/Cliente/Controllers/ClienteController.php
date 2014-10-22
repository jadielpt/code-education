<?php

namespace APIsSilex\Cliente\Controllers;

use Silex\Application;

class ClienteController implements ClienteControllerInterface
{
    public $cliente;
    
    public function connect(Application $app) 
    {//Application $app) {
//        $factory = $app['controllers_factory'];
//        
//        $factory->get('/', 'APIsSilex\Cliente\Controllers\ClienteController::getAll');
        
    }
    
    function setCliente(array $cliente) {
        $this->cliente = $cliente;
    }

    public function getCliente(Application $app) 
    {
        return json_encode($this->cliente);
    }

    public function getClienteId(Application $app, $code) 
    {
        if(!isset($this->cliente[$code])){
            $app->abort(404, "Cliente {$code} Não existe.");
            throw new \InvalidArgumentException("Cliente {$code} Não existe.");
        }
        return json_encode($this->cliente[$code]);
    }

}
