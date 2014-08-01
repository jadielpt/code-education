<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 31/07/14
 * Time: 21:33
 * Projeto: Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: Connection.php
 * Linguagem: php
 */

namespace src\app\classes\database;

/**
 * Class Connection
 * Classe responsável por conectar ao banco de dados
 * @package src\app\classes\database
 */
class Connection
{
    /**
     * @var string
     */
    private $dsn      = 'mysql:host=localhost;daname=curso_code_education';
    /**
     * @var string
     */
    private $user     = 'root';
    /**
     * @var string
     */
    private $passWord = 'root';

    /**
     * método para conexão
     */
    public function connect()
    {
        try{
            $connect = new \PDO($this->dsn, $this->user, $this->passWord);
            $connect->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e) {
            echo "ERROR: Não foi possível conectar ao banco de dados ";
            die("Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
        }
    }
}






























