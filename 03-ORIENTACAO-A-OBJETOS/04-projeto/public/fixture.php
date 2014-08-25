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
        telefone VARCHAR( 250 ) NOT NULL,
        rua VARCHAR( 250 ) NOT NULL,
        numero VARCHAR( 250 ) NOT NULL,
        bairro VARCHAR( 250 ) NOT NULL,
        cep VARCHAR( 250 ) NOT NULL,
        complemento VARCHAR( 250 ) NOT NULL,
        estrela VARCHAR( 250 ) NOT NULL,
        cidade VARCHAR( 250 ) NOT NULL,
        uf VARCHAR( 250 ) NOT NULL,
        celular VARCHAR( 250 ) NOT NULL,
        fax VARCHAR( 250 ) NOT NULL,
        telcontato VARCHAR( 250 ) NOT NULL,
        cobrrua VARCHAR( 250 ) NOT NULL,
        cobrnumero VARCHAR( 250 ) NOT NULL,
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

$clientes = new ClientesPessoasFisicas("Candido Souza", "candido@email.com.br", "Pessoa Física", '77777777777', '32435549', "Piauí", '777', "Centro", '15500000', "casa", '5', "Votuporanga", "SP");
$clientes->setCelular('1795757557')
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

$clientes = new ClientesPessoasJuridicas("Estofados ME", "estofados@email.com.br", "Pessoa Júridica", '11111111111', '34239999', "Amazona", '111', "Vila Marim", '15500000', "Apt 01", '1', "Votuporanga", "SP");
$clientes->setFax('17939393939')
    ->setTelContato('1798765432')
    ->setCobrRua('Amazonas')
    ->setCobrNumero('77')
    ->setCobrComplemento('Ap.4 - Sala 02')
    ->setCobrBairro('Jd.São Paulo')
    ->setCobrCep('15500000')
    ->setCobrMunicipio('Votuporanga')
    ->setCobrUf('SP')
;
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasFisicas("Claudia Bertolin", "claudia@email.com.br", "Pessoa Física", '22222222222', '32435555', "Bahia", '666', "Centro", '15500000', "bloc07", '3', "Votuporanga", "SP");
$clientes->setCelular('1797777777')
    ->setTelContato('1733334434')
    ->setCobrRua('Dos lirios')
    ->setCobrNumero('9')
    ->setCobrComplemento('casa')
    ->setCobrBairro('centro')
    ->setCobrCep('15500000')
    ->setCobrMunicipio('Votuporanga')
    ->setCobrUf('SP')
;
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();


////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasJuridicas("Livros SA", "livros@email.com.br", "Pessoa Júridica", '33333333333', '32431111', "Jair Pedro", '7', "Mastrocola", '15500000', "casa", '4', "Votuporanga", "SP");
$clientes->setFax('1799999999')
    ->setTelContato('173232000')
    ->setCobrRua('Curitiba')
    ->setCobrNumero('77')
    ->setCobrComplemento('Ap.10 - Sala 01')
    ->setCobrBairro('Jd.Paulistao')
    ->setCobrCep('15500000')
    ->setCobrMunicipio('Votuporanga')
    ->setCobrUf('SP')
;
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasFisicas("Felipe Bertolin de Souza", "felipe@email.com.br", "Pessoa Física", '44444444444', '32979797', "Amazona", '123', "Centro", '15500000', "casa", '1', "Votuporanga", "SP");
$clientes->setCelular('1797777777')
    ->setTelContato('1791778960')
    ->setCobrRua('Bahia')
    ->setCobrNumero('867')
    ->setCobrComplemento('Bloco1')
    ->setCobrBairro('Jd. América')
    ->setCobrCep('15500000')
    ->setCobrMunicipio('São Paulo')
    ->setCobrUf('SP')
;
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasJuridicas("Petrobras do Brasil SA", "petrobras@email.com.br", "Pessoa Júridica", '5555555555', '3248989', "Basil", '777', "Bairro", '15500000', "Ala01 Bloco02", '5', "Votuporanga", "SP");
$clientes->setFax('1799999999')
    ->setTelContato('1798765432')
    ->setCobrRua('Dos Amigos')
    ->setCobrNumero('77')
    ->setCobrComplemento('loja 01')
    ->setCobrBairro('Jd.Pedro')
    ->setCobrCep('15500000')
    ->setCobrMunicipio('Votuporanga')
    ->setCobrUf('SP')
;
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasFisicas("Maria Helena", "maria@email.com.br", "Pessoa Física", '77777777777', '12345678911', "Piauí", '8', "Centro", '15500000', "Bairro dos Cativeiros", '1', "Votuporanga", "SP");
$clientes->setCelular('1797777777')
    ->setTelContato('9988776655')
    ->setCobrRua('Olanda')
    ->setCobrNumero('987')
    ->setCobrComplemento('02 andar')
    ->setCobrBairro('São João')
    ->setCobrCep('15200000')
    ->setCobrMunicipio('São Paulo')
    ->setCobrUf('SP')
;
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasJuridicas("Coca Cola SA", "cocacola@email.com.br", "Pessoa Júridica", '98765432199', '32435549', "Nova Amburgo", '789', "Novo", '15500000', "Apt01 sala01", '2', "Votuporanga", "SP");
$clientes->setFax('1737773737')
    ->setTelContato('1798765432')
    ->setCobrRua('Dos Faveiros')
    ->setCobrNumero('77')
    ->setCobrComplemento('casa')
    ->setCobrBairro('Jd.São Paulo')
    ->setCobrCep('15500000')
    ->setCobrMunicipio('Votuporanga')
    ->setCobrUf('SP')
;
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasFisicas("Vitor Souza", "vitor@email.com.br", "Pessoa Física", '88888888888', '32435549', "Paraná", '456', "Vale Alto", '15500000', "casa", '4', "Votuporanga", "SP");
$clientes->setCelular('1791778585')
    ->setTelContato('1234567891')
    ->setCobrRua('dos Meninos')
    ->setCobrNumero('946')
    ->setCobrComplemento('casa')
    ->setCobrBairro('dos meninos')
    ->setCobrCep('15647000')
    ->setCobrMunicipio('Rio Claro')
    ->setCobrUf('SP')
;
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();

////////////////////////////////////////////////////////////////////////////

$clientes = new ClientesPessoasJuridicas("Microsoft do Brasil SA", "micro@email.com.br", "Pessoa Júridica", '99999999999', '32435549', "Piauí", '777', "Centro", '15500000', "Bloco 07", '5', "Votuporanga", "SP");
$clientes->setFax('1799999999')
    ->setTelContato('1798765432')
    ->setCobrRua('Amazonas')
    ->setCobrNumero('77')
    ->setCobrComplemento('Ap.4 - Sala 02')
    ->setCobrBairro('Jd.São Paulo')
    ->setCobrCep('15500000')
    ->setCobrMunicipio('Votuporanga')
    ->setCobrUf('SP')
;
$insert = new Crud(Connect::getDb());
$insert->persist($clientes);
$insert->flush();