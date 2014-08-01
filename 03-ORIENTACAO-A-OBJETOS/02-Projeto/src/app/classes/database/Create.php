<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 01/08/14
 * Time: 16:12
 * Projeto: Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: Create.php
 * Linguagem: php
 */

namespace src\app\classes\database;


class Create
{
    public function cadastrarDb($tabela, $dadosCadastrar)
    {
        $pdo = new Connection();
        $campos = count($dadosCadastrar);

        try {
            $cadastrar = $pdo->prepare("insert into {$tabela} () values (?, ?, ?,?)");
            for ($i = 0; $i < $campos; $i ++):
                $cadastrar->bindValue($i+1, $dadosCadastrar[$i]);
            endfor;
            $cadastrar->execute();
        } catch (PDOException $e) {
            die("Error: Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
        }
    }
} 