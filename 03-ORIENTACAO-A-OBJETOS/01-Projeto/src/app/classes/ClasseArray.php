<?php
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