<?php
/*****************************
função routeUrl()
*****************************/
function routeUrl()
{
    $route = parse_url("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    $path = $route['path'];
    $path = explode('/', $path);
    $pagina = $path[1];
    $permission	= array('home', 'empresa', 'produtos', 'servicos', 'contato', '404', 'busca');

    if(empty($pagina)){
       $pages = listarPages('pages','home');
    }elseif(isset($pagina)&& $pagina == 'busca'){
        require_once 'pages/busca.php';
    }elseif(isset($pagina) && in_array ($pagina,$permission)!= $permission){
        $pages = listarPages('pages','404');
    }else{
        $pages = listarPages('pages',$pagina);
    }
    return $pages['conteudo'];
}

/*****************************
função routeUrl() usada no 02 projeto
*****************************/
//function routeUrl()
//{
//	$route = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//	$permission	= ['home', 'empresa', 'produtos', 'servicos', 'contato', '404', 'dados'];
//	$paste		= "pages";
//	$path = $route['path'];
//	$path = explode('/', $path);
//
//	if(empty($path[1])){
//		return("{$paste}/home.php");
//	}elseif(isset($path[1]) && in_array($path[1], $permission)){
//		return("{$paste}/{$path[1]}.php");
//	}elseif(isset($path[1]) && $path[1] != $permission){
//		return("{$paste}/404.php");
//	}else{
//		return("{$paste}/home.php");
//	}
//}
