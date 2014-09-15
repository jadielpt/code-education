<?php
/**
 * @author Candido Souza
 * Date: 04/09/14
 * 03 - Projeto | Módulo 04 - Design Patterns | Estudos Potal Code Education
 * Linguagem: php
 */

require_once  __DIR__ . '/bootstrap.php';
require_once  __DIR__ . '/../src/CandidoSouza/Applications/Pages/header.php';
require_once  __DIR__ . '/../src/CandidoSouza/Applications/Pages/home.php';


//use CandidoSouza\Classes\Registry\Registry;
//
//$pdo = new \PDO("sqlite:db");
//Registry::set('pdo', $pdo);
//
//$teste = Registry::get('pdo');
//var_dump($teste);
//exit;


//$select = new \PDO("sqlite:select.db");
////$select->query("create table opcoes(nome varchar(10))");
//$select->query("insert into opcoes(nome) values(\"frios\")");
//
////$categoria = $select->query("select * from opcoes")->fetchALL();
////foreach($categoria as $key => $value) {
////    var_dump ($value);
////}



require_once  __DIR__ . '/../src/CandidoSouza/Applications/Pages/footer.php';