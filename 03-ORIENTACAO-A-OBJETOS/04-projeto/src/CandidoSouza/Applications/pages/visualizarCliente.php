<!--
/**
 * User: candidosouza
 * Date: 13/08/14
 * Time: 08:15
 * 04 - Projeto Persistência de dados | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
* Arquivo: visualizarCliente.php
* Linguagem: php
*/
-->
<div class="jumbotron">
    <div class="col-md-12">
        <?php
        if(isset($_GET)) {
            $id = array_keys($_GET);

            foreach ($id as $key => $value) {
                $valor = $value-1;

                echo "<div class=\"col-md-6\"><h2>Dados do Cliente</h2><br>";
                echo "<h4>Código: <strong>" . $dados[$valor]['id'] . "</strong></h4>";
                echo "<h4>Nome: <strong>". $dados[$valor]['nome'] ."</strong></h4>";
                echo "<h4>E-mail: <strong>". $dados[$valor]['email'] ."</strong></h4>";
                echo "<h4>Cpf | CNPJ: <strong>". $dados[$valor]['cpf'] ."</strong></h4>";
                echo "<h4>Tipo: <strong>". $dados[$valor]['tipo'] ."</strong></h4>";
                echo "<h4>Cliente: <strong>". $dados[$valor]['estrela'] ." Estrelas</strong></h4>";
                echo "<h4>Telefone: <strong>". $dados[$valor]['telefone'] ."</strong></h4>";
                echo "<h4>Celular: <strong>". $dados[$valor]['celular'] ."</strong></h4>";
                echo "<h4>Fax: <strong>". $dados[$valor]['fax'] ."</strong></h4>";
                echo "<h4>Rua: <strong>". $dados[$valor]['rua'] ."</strong></h4>";
                echo "<h4>Nº: <strong>". $dados[$valor]['numero'] ."</strong></h4>";
                echo "<h4>Complemento: <strong>". $dados[$valor]['complemento'] ."</strong></h4>";
                echo "<h4>Bairro: <strong>". $dados[$valor]['bairro'] ."</strong></h4>";
                echo "<h4>CEP: <strong>". $dados[$valor]['cep'] ."</strong></h4>";
                echo "<h4>Municipio: <strong>". $dados[$valor]['cidade'] ."</strong></h4>";
                echo "<h4>UF: <strong>". $dados[$valor]['uf'] ."</strong></h4>";

                echo "</div><div class=\"col-md-6\"> <h2>Endereço para Cobrança</h2><br>";

                echo "<h4>Telefone Contato: <strong>". $dados[$valor]['telcontato'] ."</strong></h4>";
                echo "<h4>Rua: <strong>". $dados[$valor]['cobrrua'] ."</strong></h4>";
                echo "<h4>Nº: <strong>". $dados[$valor]['cobrnumero'] ."</strong></h4>";
                echo "<h4>Complemento: <strong>". $dados[$valor]['cobrcomplemento'] ."</strong></h4>";
                echo "<h4>Bairro: <strong>". $dados[$valor]['cobrbairro'] ."</strong></h4>";
                echo "<h4>CEP: <strong>". $dados[$valor]['cobrcep'] ."</strong></h4>";
                echo "<h4>Municipio: <strong>". $dados[$valor]['cobrmunicipio'] ."</strong></h4>";
                echo "<h4>UF: <strong>". $dados[$valor]['cobruf'] ."</strong></h4>";

                echo "</div>";
            }
        }
        ?>
    </div>
    <a href="index.php"><button class="btn btn-info " >Voltar</button></a>
</div><!-- /jumbotron -->




