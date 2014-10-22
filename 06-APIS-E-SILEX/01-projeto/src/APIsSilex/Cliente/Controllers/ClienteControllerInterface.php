<?php

namespace APIsSilex\Cliente\Controllers;

use Silex\Application;

interface ClienteControllerInterface 
{
    public function connect(Application $app);
    
    public function setCliente(array $cliente);

    public function getCliente(Application $app);
    
    public function getClienteId(Application $app, $code);
}
