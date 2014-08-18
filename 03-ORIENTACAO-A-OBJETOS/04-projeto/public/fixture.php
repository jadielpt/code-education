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

use CandidoSouza\Classes\Databases\Crud;
use CandidoSouza\Classes\Clientes\Types\ClientesPessoasFisicas;
use CandidoSouza\Classes\Clientes\Types\ClientesPessoasJuridicas;


$clientes = new ClientesPessoasFisicas(Crud::create("Claudia Bertolin Souza", "claudia@email.com.br", "Pessoa Física", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 5, "Votuporanga", "SP"));

$clientes = new ClientesPessoasJuridicas(Crud::create("Candido Souza", "candido@email.com.br", "Pessoa Juridica", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 5, "Votuporanga", "SP"));