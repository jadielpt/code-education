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
//    private $pdo;
//
//    function __construct(Connect $connect) {
//        $this->pdo = $connect::getDb();
//    }

    private $connect;

//    public function __construct($connect) {
//        $this->connect = $connect;
//    }

    public static function create($nome, $email, $tipo, $cpf, $telefone, $rua, $numero, $bairro, $cep, $complemento, $estrela, $cidade, $uf)
    {
        try {
            $pdo = Connect::getDb();
            $cadastrar = $pdo->prepare("INSERT INTO clientes (nome, email, tipo, cpf, telefone, rua, numero, bairro, cep, complemento, estrela, cidade, uf)"
                                     . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $cadastrar->bindValue(1, $nome);
            $cadastrar->bindValue(2, $email);
            $cadastrar->bindValue(3, $tipo);
            $cadastrar->bindValue(4, $cpf);
            $cadastrar->bindValue(5, $telefone);
            $cadastrar->bindValue(6, $rua);
            $cadastrar->bindValue(7, $numero);
            $cadastrar->bindValue(8, $bairro);
            $cadastrar->bindValue(9, $cep);
            $cadastrar->bindValue(10, $complemento);
            $cadastrar->bindValue(11, $estrela);
            $cadastrar->bindValue(12, $cidade);
            $cadastrar->bindValue(13, $uf);
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

