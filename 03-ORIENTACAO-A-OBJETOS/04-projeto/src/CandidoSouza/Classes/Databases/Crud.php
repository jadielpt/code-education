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
use CandidoSouza\Classes\Databases\Abstracts\DataBasesAbstract;
use CandidoSouza\Classes\Clientes\Types\Clientes;
use CandidoSouza\Classes\Clientes\Types\ClientesPessoasFisicas;
use CandidoSouza\Classes\Clientes\Types\ClientesPessoasJuridicas;


/**
 * Class Crud
 * Classe responsável por fazer o CRUD com PDO ao banco de dados
 * @package src\app\classes\databases
 * @var PDO
 */
class Crud //extends DataBasesAbstract
{
    private $connect;

    public function __construct(\PDO $connect) {
        $connect instanceof \PDO;
        $this->connect = $connect;
    }

    public function persist(Clientes $clientes)
    {
        try{
            $this->connect->beginTransaction();
            $cadastrar = "INSERT INTO clientes (nome, email, tipo, cpf, telefone, rua, numero, bairro, cep, complemento, estrela, cidade, uf, celular, telcontato,  cobrrua, cobrnumero, cobrcomplemento, cobrbairro, cobrcep, cobrmunicipio, cobruf) VALUES (:nome, :email, :tipo, :cpf, :telefone, :rua, :numero, :bairro, :cep, :complemento, :estrela, :cidade, :uf, :celular, :telcontato, :fax, :cobrrua, :cobrnumero, :cobrcomplemento, :cobrbairro, :cobrcep, :cobrmunicipio, :cobruf)";
            $dados = $this->connect->prepare($cadastrar);
            $dados->execute(array(
                "nome"          => $clientes->getNomeRS(),
                "email"         => $clientes->getEmail(),
                "tipo"          => $clientes->getTipo(),
                "cpf"           => $clientes->getCnpjCpf(),
                "telefone"      => $clientes->getTelefone(),
                "rua"           => $clientes->getRua(),
                "numero"        => $clientes->getNumero(),
                "bairro"        => $clientes->getBairro(),
                "cep"           => $clientes->getCep(),
                "complemento"   => $clientes->getComplemento(),
                "estrela"       => $clientes->getGrauImportance(),
                "cidade"        => $clientes->getMunicipio(),
                "uf"            => $clientes->getUf(),
                "celular"       => $clientes->getTelContato(),
                "telcontato"    => $clientes->getTelContato(),
                "fax"           => $clientes->getTelContato(),
                "cobrrua"       => $clientes->getCobrRua(),
                "cobrnumero"    => $clientes->getCobrNumero(),
                "cobrcomplemento" => $clientes->getCobrComplemento(),
                "cobrbairro"    => $clientes->getCobrBairro(),
                "cobrcep"       => $clientes->getCobrCep(),
                "cobrmunicipio" => $clientes->getCobrMunicipio(),
                "cobruf"        => $clientes->getCobrUf()
            ));
            $this->connect->lastInsertId();
        } catch (PDOException $e) {
            echo "ERROR: Não foi possível cadastrar dados no banco!";
            die("Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
        }
    }

    public function flush()
    {
        try{
            $this->connect->commit();
        } catch (PDOException $e) {
            echo "ERROR: Não foi possível cadastrar dados no banco!";
            die("Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
        }
        return true;
    }
    
    public function read()
    {

        try{
            $listar = $this->connect->prepare("SELECT * FROM  clientes");
            $listar->execute();
            $dados = $listar->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "ERROR: Não foi possível listar dados do banco!";
            die("Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
        }
        return $dados;
    }

//    public function readId($id)
//    {
//
//        try{
//            $listarPeloId = $this->connect->prepare("select * from clientes where id = :id");
//            $listarPeloId->bindValue(":id", $id);
//            $listarPeloId->execute();
//            $dados = $listarPeloId->fetchAll(\PDO::FETCH_ASSOC);
//        } catch (PDOException $e) {
//            echo "ERROR: Não foi possível listar dados do banco!";
//            die("Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
//        }
//        return $dados;
//    }

    public function update()
    {
        
    }
    
    public function delete()
    {
        
    }
}

