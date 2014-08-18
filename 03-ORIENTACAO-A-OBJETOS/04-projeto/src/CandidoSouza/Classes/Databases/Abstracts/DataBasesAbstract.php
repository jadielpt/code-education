<?php
/**
 * User: candidosouza
 * Date: 18/08/14
 * Time: 14:45
 * 04 - Projeto Persistência de dados | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: ClienteAbstract.php
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Databases\Abstracts;

use CandidoSouza\Classes\Databases\Connect;

class DataBasesAbstract extends Connect
{
    protected static $tabela;
    
    public function read()
    {
        $pdo = parent::getDb();
        try{
        $listar = $pdo->prepare("SELECT * FROM " . self::$tabela);
        $listar->execute();
        $dados = $listar->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "ERROR: Não foi possível listar dados do banco!";
            die("Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
        }
        return $dados;
    }
    
    protected function update();
    
    public function delete();
    
}
