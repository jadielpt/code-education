<?php
/*
 * @author Candido Souza
 * Projeto: Estudos Potal Code Education - Módulo 04 Php Foundation
 * Arquivo: route.php
 * Linguagem: php
 * Data: 23/07/2014
 */

/*****************************
função routeUrl()
*****************************/
function route()
{
    $route = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $path = $route['path'];
    $path = explode('/', $path);
    $pagina = $path[3];
    $permission	= array('alterarPages', 'listarPages');

    if(empty($pagina)){
        return("pages/listarPages.php");
    }elseif($pagina == 'alterarPages'){
        return("pages/alterarPages.php");
    }elseif($pagina == 'gravar'){
        return("pages/gravar.php");
    }else{
        return("pages/listarPages.php");
    }
}