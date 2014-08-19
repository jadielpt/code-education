<?php
/*****************************
função url
*****************************/
$pag_atual 	= (isset($_GET['url'])) ? $_GET['url'] : 'home';

	$permission	= array('home', 'empresa', 'produtos', 'servicos', 'contato', '404', 'dados');
	$paste		= "pages";
	if(substr_count($pag_atual, '/') > 0){
		$pag_atual = explode('/', $pag_atual);
		$page = (file_exists("{$paste}/".$pag_atual[0].'.php') && in_array($pag_atual[0], $permission)) ? $pag_atual[0] : '404';
	}else{
		$page = (file_exists("{$paste}/".$pag_atual.'.php') && in_array($pag_atual, $permission)) ? $pag_atual : '404';
	}

	require_once("{$paste}/{$pag_atual}.php");
?>