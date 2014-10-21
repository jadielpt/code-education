<?php

namespace APIsSilex\Cliente\Controllers;

interface ClienteControllerInterface 
{
    public function connect();
    
    public function getAll();
    
    public function getCliente();
}
