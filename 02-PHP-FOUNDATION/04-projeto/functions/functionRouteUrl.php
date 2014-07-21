<?php
/*****************************
função routeUrl()
*****************************/

// Função que pega a url(rota) de acordo com o link no menu, e busca o conteúdo
// das páginas e imprime, caso seja digitado uma url diferente imprime a página
// 404 de erro
function routeUrl()
{
    $route = parse_url("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    $path = $route['path'];
    $path = explode('/', $path);
    $pagina = $path[1];
    $permission	= array('home', 'empresa', 'produtos', 'servicos', 'contato', '404', 'busca');
    
    
        if(empty($pagina)){
           return $dados = listarPages('pages', 'home' );
        }elseif(isset($pagina) && in_array ($pagina,$permission)!= $permission){
           return $dados = listarPages('pages','404');
        }elseif($pagina == 'busca'){
            include 'pages/busca.php';
        }elseif($pagina == 'contato'){
            include 'pages/contato.php';
        }else{
           return $dados = listarPages('pages',$pagina);
        }
}
