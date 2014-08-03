<!--
/**
* Created by PhpStorm.
* User: candidosouza
* Date: 01/08/14
* Time: 16:12
* 02 - Projeto Tipos de Clientes | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
* @author Candido Souza
* Arquivo: visualizarCliente.php
* Linguagem: php
*/
-->
<h1>Dados do Cliente</h1>
<div class="jumbotron">
<?php
if(isset($_GET)) {
    $codigo = array_keys($_GET);
    
    foreach ($codigo as $key => $value) {
        $valor = $value-1;

        echo "<h4>Código: <strong>".$clientes[$valor]->getId()."</strong></h4>";
        echo "<h4>Nome: <strong>".$clientes[$valor]->getNome()."</strong></h4>";
        echo "<h4>Sobrenome: <strong>".$clientes[$valor]->getSobrenome()."</strong></h4>";
        echo "<h4>Cpf: <strong>".$clientes[$valor]->getCpf()."</strong></h4>";
        echo "<h4>E-mail: <strong>".$clientes[$valor]->getEmail()."</strong></h4>";
        echo "<h4>Telefone: <strong>".$clientes[$valor]->getTelefone()."</strong></h4>";
        echo "<h4>Rua: <strong>".$clientes[$valor]->getRua()."</strong></h4>";
        echo "<h4>Nº: <strong>".$clientes[$valor]->getNumero()."</strong></h4>";
        echo "<h4>Complemento: <strong>".$clientes[$valor]->getComplemento()."</strong></h4>";
        echo "<h4>Bairro: <strong>".$clientes[$valor]->getBairro()."</strong></h4>";
        echo "<h4>Cep: <strong>".$clientes[$valor]->getCep()."</strong></h4>";
        echo "<h4>Municipio: <strong>".$clientes[$valor]->getMunicipio()."</strong></h4>";
        echo "<h4>UF: <strong>".$clientes[$valor]->getUf()."</strong></h4>";
    }
}
?>
<a href="index.php"><button class="btn btn-info " >Voltar</button></a>
</div><!-- /jumbotron -->




