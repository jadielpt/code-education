<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set('America/Sao_Paulo');
require_once './functions/functionsDb.php';

// função listar DB
function criarDb() {
    $dsn     = 'mysql:host=localhost';
    $user    = 'root';
    $pass    = 'root';
    $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
    $dbname  = 'curso_code_education';
    $table   = 'pages';

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
        $pdo->query("use $dbname");
        print("Criado o banco de dados {$dbname}<br>");
        $tabl ="CREATE table $table(
        id INT( 10 ) AUTO_INCREMENT NOT NULL PRIMARY KEY,
        pages VARCHAR( 250 ) NOT NULL, 
        conteudo VARCHAR( 250 ) NOT NULL);";
        $pdo->exec($tabl);
        print("Criada a tabela {$table}<br>");
        
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $pdo;
}

criarDb();
$cadastarDados = array('home','<div class="jumbotron"><h1>3º Projeto - PHP FOUNDATION</h1><div class="page-header"><h2>Página Home <small>Todo conteúdo principal</small></h2></div></div>');
cadastrarDb('pages',$cadastarDados);
$cadastarDados = array('empresa','<div class="jumbotron"><h1>Nome da Empresa</h1><div class="page-header"><h2>Página Sobre a Empresa <small>Todo conteúdo</small></h2></div></div>');
cadastrarDb('pages',$cadastarDados);
$cadastarDados = array('produtos','<div class="jumbotron"><h1>Página Sobre Produtos</h1><div class="page-header"><h2>Página Sobre Produtos <small>Todo conteúdo</small></h2></div></div>');
cadastrarDb('pages',$cadastarDados);
$cadastarDados = array('servicos','<div class="jumbotron"><h1>Página Sobre Serviços</h1><div class="page-header"><h2>Página Sobre Serviços <small>Todo conteúdo</small></h2></div></div>');
cadastrarDb('pages',$cadastarDados);
$cadastarDados = array('404','<div class="jumbotron"><h1>Ixi, Maria! ERROR: 404</h1><h2>ERRO: A página não existe</h2><h2>Volte para a <a href="home">Home</a></h2></div>');
cadastrarDb('pages',$cadastarDados);


