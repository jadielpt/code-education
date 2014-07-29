<?php
/*
* @author Candido Souza
* Projeto: Estudos Potal Code Education - Módulo 04 Php Foundation
* Arquivo: Clientes.php
* Linguagem: php
* Data: 29/07/2014
 */

/*****************************
Classe Clientes
*****************************/
namespace src\app\classes;

class ClasseArray {

    public $nome;
    public $email;
    public $telefone;

    public function obterDados($nome, $email, $telefone) {
        $dados = array(
            'Nome: ' => $this->nome = $nome,
            'E-mail: ' => $this->email = $email,
            'Telefone ' => $this->telefone = $telefone,
        );
    }
    
    public function verDados()
    {
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }

}