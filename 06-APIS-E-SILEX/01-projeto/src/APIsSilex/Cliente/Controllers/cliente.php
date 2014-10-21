<?php
use Symfony\Component\HttpFoundation\Response;
/*
 * Controller cliente
 */
$cliente = $app['controllers_factory'];

$cliente->get('/', function(){
    return new Response("Acesso aos Clientes!");
});

$cliente->get('/cliente', function (){
    return new Response("Exibição dos dados do cliente");
});

return $cliente;