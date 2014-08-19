<?php
/**
 * User: candidosouza
 * Date: 13/08/14
 * Time: 08:15
 * 04 - Projeto Persistência de dados | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: Route.php
 * Linguagem: php
 */


// Desativado

//$route = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//$path = $route['path'];
//$path = explode('/', $path);
//$pagina = $path[1];
//$permission = array('vizualizarCliente', 'index.php');
//
//if(empty($pagina)){
//    require_once __DIR__ . '/../pages/listaClientes.php';
//}elseif($pagina == 'visualizarCliente'){
//    require_once __DIR__ . '/../pages/visualizarCliente.php';
//}elseif(isset($pagina ) && in_array($pagina,$permission)!= $permission){
//    require_once __DIR__ . '/../pages/404.php';
//}else{
//    require_once __DIR__ . '/../pages/listaClientes.php';
//}