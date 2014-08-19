<?php
/**
 * @author Candido Souza
 * Projeto: Estudos Potal Code Education - Módulo 04 Php Foundation
 * Arquivo: index.php
 * Linguagem: php
 * Data: 29/07/2014
 */
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/pages/header.php';

$route = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$path = $route['path'];
$path = explode('/', $path);
$pagina = $path[1];
$permission = array('vizualizarCliente', 'index.php');

if(empty($pagina)){
    require_once __DIR__ . '/pages/listaClientes.php';
}elseif($pagina == 'visualizarCliente'){
    require_once __DIR__ . '/pages/visualizarCliente.php';
}elseif(isset($pagina ) && in_array($pagina,$permission)!= $permission){
    require_once __DIR__ . '/pages/404.php';
}else{
    require_once __DIR__ . '/pages/listaClientes.php';
}

require_once __DIR__ . '/pages/footer.php';
