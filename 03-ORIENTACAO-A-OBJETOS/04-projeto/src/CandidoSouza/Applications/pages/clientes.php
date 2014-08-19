<?php
/**
 * User: candidosouza
 * Date: 13/08/14
 * Time: 08:15
 * 04 - Projeto Persistência de dados | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: clientes.php
 * Linguagem: php
 */
use CandidoSouza\Classes\Databases\Connect;
use CandidoSouza\Classes\Databases\Crud;


$clientes = new Crud(Connect::getDb());
$dados =  $clientes->read();