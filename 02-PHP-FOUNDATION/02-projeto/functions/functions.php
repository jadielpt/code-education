<?php
/*****************************
função routeUrl()
*****************************/
function routeUrl()
{
	$route = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	$permission	= ['home', 'empresa', 'produtos', 'servicos', 'contato', '404', 'dados'];
	$paste		= "pages";
	$path = $route['path'];
	$path = explode('/', $path);

	if(empty($path[1])){
		return("{$paste}/home.php");
	}elseif(isset($path[1]) && in_array($path[1], $permission)){
		return("{$paste}/{$path[1]}.php");
	}elseif(isset($path[1]) && $path[1] != $permission){
		return("{$paste}/404.php");
	}else{
		return("{$paste}/home.php");
	}
}