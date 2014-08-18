<?php

/**
 * User: candidosouza
 * Date: 13/08/14
 * Time: 14:15
 * 04 - Projeto Persistência de dados | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: Connect.php
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Databases;

/**
 * Class Connection
 * Classe responsável por conectar ao banco de dados
 * @package src\app\classes\databases
 */
class Connect 
{
    private static $dsn = 'mysql:host=localhost;daname=curso_code_education';
    private static $user = 'root';
    private static $password = 'root';

    public static function connection() 
    {
        try {
            $pdo = new \PDO(self::$dsn, self::$user, self::$password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            echo 'Conectado';
            return $pdo;
            echo '<pre>';
            print_r($pdo);
            echo '</pre>';
        } catch (PDOException $e) {
            echo "ERROR: Não foi possível conectar ao banco de dados ";
            die("Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
        }
    }
}
