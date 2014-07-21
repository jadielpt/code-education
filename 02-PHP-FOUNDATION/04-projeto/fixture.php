<?php
/*
* @author Candido Souza
* Projeto: Estudos Potal Code Education - Módulo 03 Php Foundation
* Arquivo: fixture.php
* Linguagem: php
* Data: 17/07/2014
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set('America/Sao_Paulo');
require_once './functions/functionsDb.php';

/*****************************
função criar banco de dados MySQL
*****************************/

/*
 * Função para criar um banco de dados no MySQL, que receberá todo o conteúdo do site.
 * Obs: Lembrando que o usuário é 'root' e o password é 'root'
 */
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
        conteudo_titulo VARCHAR( 250 ) NOT NULL,
        conteudo_principal VARCHAR( 250 ) NOT NULL,
        conteudo_content VARCHAR( 250 ) NOT NULL);";
        $pdo->exec($tabl);
        print("Criada a tabela {$table}<br>");
        
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $pdo;
}

criarDb();
$cadastarDados = array('home','Página Home', 'Todo conteúdo home', 'Descrição do conteúdo da página home');
cadastrarDb('pages',$cadastarDados);
$cadastarDados = array('empresa','Página Empresa', 'Todo conteúdo principal sobre nossa empresa', 'Descrição do conteúdo da página empresa');
cadastrarDb('pages',$cadastarDados);
$cadastarDados = array('produtos','Página Produtos', 'Todo conteúdo principal dos nossos produtos', 'Descrição do conteúdo da página produtos');
cadastrarDb('pages',$cadastarDados);
$cadastarDados = array('servicos','Página Serviços', 'Todo conteúdo principal dos nossos serviços', 'Descrição do conteúdo da página serviços');
cadastrarDb('pages',$cadastarDados);
$cadastarDados = array('404','Página 404', 'ERROR: IXIIIII, MARIA!', 'A pagina não exixte!');
cadastrarDb('pages',$cadastarDados);


function criarDbAdmin() {
    $dsn     = 'mysql:host=localhost';
    $user    = 'root';
    $pass    = 'root';
    $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
    $dbname  = 'curso_code_education';
    $table   = 'admin';

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
        $pdo->query("use $dbname");
        $tabl ="CREATE table $table(
        id INT( 10 ) AUTO_INCREMENT NOT NULL PRIMARY KEY,
        nome VARCHAR( 250 ) NOT NULL, 
        email VARCHAR( 250 ) NOT NULL,
        senha VARCHAR( 250 ) NOT NULL);";
        $pdo->exec($tabl);
        print("Criada a tabela {$table}<br>");
        
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $pdo;
}

criarDbAdmin();
$cadastarDados = array('Admin','admin@email.com', '123');
criarDbAdmin();
$cadastarDados = array('candido','candido@email.com', '123');
criarDbAdmin();
$cadastarDados = array('claudia','claudia@email.com', '123');

