<?php
/**
 * Description of Clientes
 *
 * @author candidosouza
 */

namespace src\app\classes;
/**
 * 
 */
class Clientes
{
    // Dados pessoais
    private $nome;
    private $sobrenome;
    private $cpf;
    private $email;
    private $telefone;
    // Dados de endereço
    private $rua;
    private $numero;
    private $complemento;
    private $bairro;
    private $cep;
    private $municipio;
    private $uf;
    
    function __construct($nome, $sobrenome, $cpf, $email, $telefone, $rua, $numero, $complemento, $bairro, $cep, $municipio, $uf)
    {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cep = $cep;
        $this->municipio = $municipio;
        $this->uf = $uf;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getRua() {
        return $this->rua;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getMunicipio() {
        return $this->municipio;
    }

    public function getUf() {
        return $this->uf;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setRua($rua) {
        $this->rua = $rua;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }
    
//    public function visualizarClientes()
//    {
//        return $dados = array(
//            $this->nome, 
//            $this->sobrenome,
//            $this->cpf,
//            $this->email,
//            $this->telefone,
//            $this->rua,
//            $this->numero,
//            $this->complemento,
//            $this->bairro,
//            $this->cep,
//            $this->municipio,
//            $this->uf
//            
//            );
//    }
//    
//    public function iteracaoObj()
//    {
//        foreach($this as $key => $value) {
//            print "$key => $value\n";
//        }
//    }
    
//    public function __destruct()
//    {
//        $this->nome; 
//        $this->sobrenome;
//        $this->cpf;
//        $this->email;
//        $this->telefone;
//        $this->rua;
//        $this->numero;
//        $this->complemento;
//        $this->bairro;
//        $this->cep;
//        $this->municipio;
//        $this->uf;
//    }
}
