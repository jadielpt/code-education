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
use CandidoSouza\Classes\Databases\Connect;
use CandidoSouza\Classes\Databases\Abstracts\DataBasesAbstract;
/**
 * Class Crud
 * Classe responsável por fazer o CRUD com PDO ao banco de dados
 * @package src\app\classes\databases
 * @var PDO
 */
class Crud extends DataBasesAbstract
{
//    private $database;
//    
//    function __construct(\PDO $database) {
//        $this->database = $database;
//    }
//
//    
    public function create($nome, $email, $cpf, $tipo)
    {
        $pdo = parent::getDb();
        
        try {
            $cadastrar = $pdo->prepare("INSERT INTO clientes (nome, email, cpf, tipo) VALUES (?, ?, ?, ?)");
            $cadastrar->bindValue(1, $nome);
            $cadastrar->bindValue(2, $email);
            $cadastrar->bindValue(3, $cpf);
            $cadastrar->bindValue(4, $tipo);
            $cadastrar->execute();
        } catch (PDOException $e) {
            echo "ERROR: Não foi possível cadastrar dados no banco!";
            die("Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
        }
    }
    
    public function read() 
    {
        parent::$tabela = "clientes";
        return parent::listar();
    }
    
    public function update()
    {
        
    }
    
    public function delete()
    {
        
    }
}

