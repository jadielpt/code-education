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

use CandidoSouza\Classes\Databases\Connect;

namespace CandidoSouza\Classes\Databases;

/**
 * Class Crud
 * Classe responsável por fazer o CRUD com PDO ao banco de dados
 * @package src\app\classes\databases
 * @var PDO
 */
class Crud 
{
    private $database;
    
    function __construct(\PDO $database) {
        $this->database = $database;
    }

    
    public function create($tabela, $dadosCadastrar)
    {
        //Connect::connection();
        $campos = count($dadosCadastrar);

        try {
            $cadastrar = $this->database->prepare("insert into {$tabela} (nome, sobrenome, email, cpf) values (?, ?, ?, ?)");
            for ($i = 0; $i < $campos; $i ++):
                $cadastrar->bindValue($i+1, $dadosCadastrar[$i]);
            endfor;
            $cadastrar->execute();
            return "cadastrado com sucesso!";
        } catch (PDOException $e) {
            die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
        }
        
    }
    
    public function read()
    {
        
    }
    
    public function update()
    {
        
    }
    
    public function delete()
    {
        
    }
}

