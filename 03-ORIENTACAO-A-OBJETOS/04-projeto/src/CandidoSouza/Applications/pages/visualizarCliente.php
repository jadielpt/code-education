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
<div class="jumbotron">
    <div class="col-md-12">
        <?php
        if(isset($_GET)) {
        $codigo = array_keys($_GET);

            foreach ($codigo as $key => $value) {
                $valor = $value-1;

                echo "<div class=\"col-md-6\"><h2>Dados do Cliente</h2><br>";
                echo "<h4>Código: <strong>".$clientes[$valor]->getId()."</strong></h4>";
                echo "<h4>Nome: <strong>".$clientes[$valor]->getnomeRS()."</strong></h4>";
                echo "<h4>E-mail: <strong>".$clientes[$valor]->getEmail()."</strong></h4>";
                echo "<h4>Cpf | CNPJ: <strong>".$clientes[$valor]->getCnpjCpf()."</strong></h4>";
                echo "<h4>Tipo: <strong>".$clientes[$valor]->getTipo()."</strong></h4>";
                echo "<h4>Cliente: <strong>".$clientes[$valor]->getGrauImportance()." Estrelas</strong></h4>";
                echo "<h4>Telefone: <strong>".$clientes[$valor]->getTelefone()."</strong></h4>";

                if(method_exists($clientes[$valor],'getCelular')){
                    echo "<h4>Celular: <strong>".$clientes[$valor]->getCelular()."</strong></h4>";
                }else{
                    echo "<h4>Fax: <strong>".$clientes[$valor]->getFax()."</strong></h4>";
                }
                echo "<h4>Rua: <strong>".$clientes[$valor]->getRua()."</strong></h4>";
                echo "<h4>Nº: <strong>".$clientes[$valor]->getNumero()."</strong></h4>";
                echo "<h4>Complemento: <strong>".$clientes[$valor]->getComplemento()."</strong></h4>";
                echo "<h4>Bairro: <strong>".$clientes[$valor]->getBairro()."</strong></h4>";
                echo "<h4>CEP: <strong>".$clientes[$valor]->getCep()."</strong></h4>";
                echo "<h4>Municipio: <strong>".$clientes[$valor]->getMunicipio()."</strong></h4>";
                echo "<h4>UF: <strong>".$clientes[$valor]->getUf()."</strong></h4>";

                echo "</div><div class=\"col-md-6\"> <h2>Endereço para Cobrança</h2><br>";

                echo "<h4>Telefone Contato: <strong>".$clientes[$valor]->getTelContato()."</strong></h4>";
                echo "<h4>Rua: <strong>".$clientes[$valor]->getCobrRua()."</strong></h4>";
                echo "<h4>Nº: <strong>".$clientes[$valor]->getCobrNumero()."</strong></h4>";
                echo "<h4>Complemento: <strong>".$clientes[$valor]->getCobrComplemento()."</strong></h4>";
                echo "<h4>Bairro: <strong>".$clientes[$valor]->getCobrBairro()."</strong></h4>";
                echo "<h4>CEP: <strong>".$clientes[$valor]->getCobrCep()."</strong></h4>";
                echo "<h4>Municipio: <strong>".$clientes[$valor]->getCobrMunicipio()."</strong></h4>";
                echo "<h4>UF: <strong>".$clientes[$valor]->getCobrUf()."</strong></h4>";

                echo "</div>";
            }
        }
        ?>
    </div>
    <a href="index.php"><button class="btn btn-info " >Voltar</button></a>
</div><!-- /jumbotron -->




