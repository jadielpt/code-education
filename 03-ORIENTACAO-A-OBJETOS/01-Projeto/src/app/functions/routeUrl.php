<?php
/**
 * @author Candido Souza
 * Projeto: Estudos Potal Code Education - Módulo 04 Php Foundation
 * Arquivo: Route.php
 * Linguagem: php
 * Data: 17/07/2014
 */

/*****************************
Function rota do site
*****************************/
    function routeUrl()
    {
        $route = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        $path = $route['path'];
        $path = explode('/', $path);
        $pagina = $path[1];
        $permission = array('vizualizarCliente');

        if(empty($pagina)){
            require_once (__DIR__ . '/pages/listaClientes.php');
        }elseif($pagina == 'visualizarCliente'){
            return (__DIR__ . '/pages/visualizarCliente.php');
        }elseif(isset($pagina ) && in_array($pagina,$permission)!= $permission){
            return (__DIR__ . '/pages/404.php');
        }else{
            return (__DIR__ . '/pages/listaClientes.php');
        }
    }

