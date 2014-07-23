<?php
/*
 * @author Candido Souza
 * Projeto: Estudos Potal Code Education - Módulo 04 Php Foundation
 * Arquivo: functionDb.php
 * Linguagem: php
 * Data: 23/07/2014
 */

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
        die("Error: Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br> Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
    }

    return $pdo;
}
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

function atualizar()
{
    if(isset($_POST['alterar'])){
        $id = addslashes(trim($_POST['id']));
        $pagina = addslashes(trim($_POST['pages']));
        $titulo = addslashes(trim($_POST['titulo']));
        $contPrinc = addslashes(trim($_POST['principal']));
        $conteudo = addslashes(trim( $_POST['editor1']));
        
        try {
            $pdo = conectarDb();

            $atualizar = $pdo->prepare("UPDATE pages SET pages = :pages, conteudo_titulo = :conteudo_titulo, "
                . "conteudo_principal = :conteudo_principal, conteudo_content = :conteudo_content where id = :id");
            $atualizar->bindValue(":pages", $pagina);
            $atualizar->bindValue(":conteudo_titulo", $titulo);
            $atualizar->bindValue(":conteudo_principal", $contPrinc);
            $atualizar->bindValue(":conteudo_content", $conteudo);
            $atualizar->bindValue(":id", $id);
            $atualizar->execute();
        } catch (PDOException $e) {
            die("Error: Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
        }

    }else{
        echo "ERROR: Erro ao alterar!";
    }
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

// função para cryptografia de senha
function passCrypt($senha)
{
    $senhaCrypt = password_hash($senha, PASSWORD_DEFAULT);
    return $senhaCrypt;
}

// função para pegar senha
function password()
{
    $dados = listar('admin');
    foreach ($dados as $key => $value) {
        return $value['senha'];
    }
}

// Função logar no painel administrativo
function logarsistema($user)
{
    $pdo = conectarDb();


    try {
        $login = $pdo->prepare("select * from admin where login = :login");
        $login->bindValue(":login", $user);
        $login->execute();

            return ($login->rowCount() == 1) ? true : false;
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
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