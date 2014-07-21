<?php
/*****************************
funções PDO DB
*****************************/

// Função conectar DB
function conectarDb()
{
    $dsn    = 'mysql:host=localhost;dbname=curso_code_education';
    $user   = 'root';
    $pass   = 'root';
    $options= [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8' ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }

    return $pdo;
}

// Função cadastrar DB
function cadastrarDb($tabela, $dadosCadastrar)
{
    $pdo = conectarDb();
    $campos = count($dadosCadastrar);
    
    try {
        $cadastrar = $pdo->prepare("insert into {$tabela} (pages, conteudo_titulo, conteudo_principal,conteudo_content) values (?, ?, ?,?)");
        for ($i = 0; $i < $campos; $i ++):
            $cadastrar->bindValue($i+1, $dadosCadastrar[$i]);
        endfor;
        $cadastrar->execute();
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
}

// Função listar DB
function listarDb($tabela)
{
    $pdo = conectarDb();
    
    try {
        $listar = $pdo->prepare("select * from $tabela");
        $listar->execute();
        $dados = $listar->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $exc->getTraceAsString();
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $dados ;

}

// Função atualizar DB
function atualizarDb($tabela, $dadosAtualizar, $id)
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

// Função deletar DB
function deletarDb($tabela, $id)
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

// Função listar páginas DB
function listarPages($tabela, $pages)
{
    $pdo = conectarDb();
    
    try {
        $listarPeloId = $pdo->prepare("select * from {$tabela} where pages = :pages");
        $listarPeloId->bindValue(":pages", $pages);
        $listarPeloId->execute();
        $dados = $listarPeloId->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $exc->getTraceAsString();
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $dados ;
}