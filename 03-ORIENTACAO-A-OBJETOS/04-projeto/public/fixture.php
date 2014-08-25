<?php
/**
 * User: candidosouza
 * Date: 13/08/14
 * Time: 08:15
 * 04 - Projeto Persistência de dados | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: Fixture.php
 * Linguagem: php
 */
require_once './bootstrap.php';

use CandidoSouza\Classes\Databases\Crud;
use CandidoSouza\Classes\Databases\Connect;
use CandidoSouza\Classes\Clientes\Types\ClientesPessoasFisicas;
use CandidoSouza\Classes\Clientes\Types\ClientesPessoasJuridicas;
/*
 * Função para criar um banco de dados no MySQL, que receberá todo o conteúdo do site.
 * Obs: Lembrando que o usuário é 'root' e o password é 'root'
 */
function criarDb() {
    $dsn     = 'mysql:host=localhost';
    $user    = 'root';
    $pass    = 'root';
    //$options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
    $dbname  = 'curso_code_education';
    $table   = 'clientes';

    try {
        $pdo = new PDO($dsn, $user, $pass); //$options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
        $pdo->query("use $dbname");
        print("O banco de dados {$dbname} foi criado com sucesso!<br>");
        $tabl ="CREATE table $table(
        id INT( 10 ) AUTO_INCREMENT NOT NULL PRIMARY KEY,
        nome VARCHAR( 250 ) NOT NULL,
        email VARCHAR( 250 ) NOT NULL,
        tipo VARCHAR( 250 ) NOT NULL,
        cpf VARCHAR( 250 ) NOT NULL,
        telefone INT( 10 ) NOT NULL,
        rua VARCHAR( 250 ) NOT NULL,
        numero INT( 10 ) NOT NULL,
        bairro VARCHAR( 250 ) NOT NULL,
        cep INT( 10 ) NOT NULL,
        complemento VARCHAR( 250 ) NOT NULL,
        estrela INT( 1 ) NOT NULL,
        cidade VARCHAR( 250 ) NOT NULL,
        uf VARCHAR( 2 ) NOT NULL,
        celular INT( 10 ) NOT NULL,
        fax INT( 10 ) NOT NULL,
        telcontato Int( 10 ) NOT NULL,
        cobrrua VARCHAR( 250 ) NOT NULL,
        cobrnumero INT( 10 ) NOT NULL,
        cobrcomplemento VARCHAR( 250 ) NOT NULL,
        cobrbairro VARCHAR( 250 ) NOT NULL,
        cobrcep VARCHAR( 250 ) NOT NULL,
        cobrmunicipio VARCHAR( 250 ) NOT NULL,
        cobruf VARCHAR( 250 ) NOT NULL);";
        $pdo->exec($tabl);
        print("A tabela {$table} foi criada com sucesso!<br>");

    } catch (PDOException $e) {
        echo "ERROR: Não foi possível cadastrar dados no banco!";
        die("Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
    }
    return $pdo;
}
criarDb();

$clientes = new ClientesPessoasFisicas("Candido Souza", "candido@email.com.br", "Pessoa Física", '77777777777', 32435549, "Piauí", 777, "Centro", 15500000, "casa", 5, "Votuporanga", "SP");
$clientes->setCelular(1795757557)
    ->setTelContato(null)
    ->setCobrRua(null)
    ->setCobrNumero(null)
    ->setCobrComplemento(null)
    ->setCobrBairro(null)
    ->setCobrCep(null)
    ->setCobrMunicipio(null)
    ->setCobrUf(null)
;
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasJuridicas("Estofados ME", "estofados@email.com.br", "Pessoa Júridica", '77777777777', 32435549, "Piauí", 777, "Centro", 15500000, "casa", "Normal", "Votuporanga", "SP");
$clientes->setFax(17939393939)
    ->setTelContato(1798765432)
    ->setCobrRua('Amazonas')
    ->setCobrNumero('77')
    ->setCobrComplemento('Ap.4 - Sala 02')
    ->setCobrBairro('Jd.São Paulo')
    ->setCobrCep(15500000)
    ->setCobrMunicipio('Votuporanga')
    ->setCobrUf('SP')
;
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasFisicas("Claudia Bertolin", "claudia@email.com.br", "Pessoa Física", '77777777777', 32435549, "Piauí", 777, "Centro", 15500000, "casa", 3, "Votuporanga", "SP");
$clientes->setCelular(17977777777);
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasJuridicas("Livros SA", "livros@email.com.br", "Pessoa Júridica", '77777777777', 32435549, "Piauí", 777, "Centro", 15500000, "casa", 4, "Votuporanga", "SP");
$clientes->setFax(179999999)
    ->setTelContato(179999999)
    ->setCobrRua('Rua Dos Lirios')
    ->setCobrNumero('7777')
    ->setCobrComplemento('Bloco 01 - Sala 02')
    ->setCobrBairro('Jd.Paulistano')
    ->setCobrCep(15502210)
    ->setCobrMunicipio('Votuporanga')
    ->setCobrUf('SP')
;
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasFisicas("Felipe Bertolin de Souza", "felipe@email.com.br", "Pessoa Física", '77777777777', 32435549, "Piauí", 777, "Centro", 15500000, "casa", "Normal", "Votuporanga", "SP");
$clientes->setCelular(17977777777)
    ->setTelContato(null)
    ->setCobrRua(null)
    ->setCobrNumero(null)
    ->setCobrComplemento(null)
    ->setCobrBairro(null)
    ->setCobrCep(null)
    ->setCobrMunicipio(null)
    ->setCobrUf(null)
;
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasJuridicas("Petrobras do Brasil SA", "petrobras@email.com.br", "Pessoa Júridica", '77777777777', 32435549, "Piauí", 777, "Centro", 15500000, "casa", 5, "Votuporanga", "SP");
$clientes->setFax(1717171717);
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasFisicas("Maria Helena", "maria@email.com.br", "Pessoa Física", '77777777777', 32435549, "Piauí", 777, "Centro", 15500000, "casa", "Normal", "Votuporanga", "SP");
$clientes->setCelular(17951515151)
    ->setTelContato(1777777777)
    ->setCobrRua('Santos Dumont')
    ->setCobrNumero(7)
    ->setCobrComplemento('Loja')
    ->setCobrBairro('Vera Cruz')
    ->setCobrCep(15555000)
    ->setCobrMunicipio('Bauru')
    ->setCobrUf('SP')
;
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasJuridicas("Coca Cola SA", "cocacola@email.com.br", "Pessoa Júridica", '77777777777', 32435549, "Piauí", 777, "Centro", 15500000, "casa", 2, "Votuporanga", "SP");
$clientes->setFax(1737773737);
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasFisicas("Vitor Souza", "vitor@email.com.br", "Pessoa Física", '77777777777', 32435549, "Piauí", 777, "Centro", 15500000, "casa", 4, "Votuporanga", "SP");
$clientes->setCelular(1799999777);
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasJuridicas("Microsoft do Brasil SA", "micro@email.com.br", "Pessoa Júridica", '77777777777', 32435549, "Piauí", 777, "Centro", 15500000, "casa", 5, "Votuporanga", "SP");
$clientes->setFax(179999999)
    ->setTelContato(173997777)
    ->setCobrRua('Microsoft do Brasil')
    ->setCobrNumero('1')
    ->setCobrComplemento('Bloco 01 - Sala 02')
    ->setCobrBairro('Jd.Microsoft do Brasil')
    ->setCobrCep(15502210)
    ->setCobrMunicipio('Votuporanga')
    ->setCobrUf('SP')
;
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();