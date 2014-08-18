<?php
/**
 * User: candidosouza
 * Date: 13/08/14
 * Time: 08:15
 * 04 - Projeto Persistência de dados | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: Fixture.php
 * Linguagem: php
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set('America/Sao_Paulo');
require_once './bootstrap.php';

use CandidoSouza\Classes\Databases\Connect;
use CandidoSouza\Classes\Databases\Crud;

$database = Connect::connection();
$crud = new Crud($database);

$cadastarDados = array();
$crud->create('clientes', 'jose','Souza', 'joses@email.com', 1270018080);


