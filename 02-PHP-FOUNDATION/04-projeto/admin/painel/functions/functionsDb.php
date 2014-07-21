<?php
/*****************************
funções PDO DB
*****************************/
require_once '../../functions/functionsDb.php';


// Função listar DB
function listar($tabela)
{
    $pdo = conectarDb();
    
    try {
        $listar = $pdo->prepare("select * from $tabela");
        $listar->execute();
        $dados = $listar->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $dados ;

}

// Função deletar DB
function deletar($tabela, $id)
{
    $pdo = conectarDb();
    
    try {
        $deletar = $pdo->prepare("delete from {$tabela} where id = :id");
        $deletar->bindValue(":id", $id);
        $deletar->execute();
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
}










// Função listar pelo id DB
function listarId($tabela, $id)
{
    $pdo = conectarDb();
    
    try {
        $listarPeloId = $pdo->prepare("select * from {$tabela} where id = :id");
        $listarPeloId->bindValue(":id", $id);
        $listarPeloId->execute();
        $dados = $listarPeloId->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $exc->getTraceAsString();
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $dados ;
}

// Função cadastrar DB
function cadastrar($tabela, $dadosCadastrar)
{
    $pdo = conectarDb();
    $campos = count($dadosCadastrar);
    
    try {
        $cadastrar = $pdo->prepare("insert into {$tabela} (nome, email, senha) values (?, ?, ?)");
        for ($i = 0; $i < $campos; $i ++):
            $cadastrar->bindValue($i+1, $dadosCadastrar[$i]);
        endfor;
        $cadastrar->execute();
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
}











// Função atualizar DB
function atualizar($tabela, $dadosAtualizar, $id)
{
    $pdo = conectarDb();
    
    try {
        $atualizar = $pdo->prepare("update {$tabela} set conteudo = ? where id = ?");
        $atualizar->bindValue(1, $dadosAtualizar['conteudo']);
        $atualizar->bindValue(2, $id);
        $atualizar->execute();
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
}



// Função listar páginas DB
//function listarPages($tabela, $pages)
//{
//    $pdo = conectarDb();
//    
//    try {
//        $listarPeloId = $pdo->prepare("select * from {$tabela} where pages = :pages");
//        $listarPeloId->bindValue(":pages", $pages);
//        $listarPeloId->execute();
//        $dados = $listarPeloId->fetch(PDO::FETCH_ASSOC);
//    } catch (PDOException $e) {
//        echo $exc->getTraceAsString();
//        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
//    }
//    return $dados ;
//}