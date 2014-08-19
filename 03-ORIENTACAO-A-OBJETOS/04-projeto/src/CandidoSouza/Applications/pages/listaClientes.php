<!--
/**
 * User: candidosouza
 * Date: 13/08/14
 * Time: 08:15
 * 04 - Projeto Persistência de dados | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: listaClientes.php
 * Linguagem: php
 */
-->
                    <div class="jumbotron">
                        <?php
                        if(isset($_POST['cres'])){
                            ksort($dados);
                        }elseif(isset($_POST['dec'])){
                            krsort($dados);
                        }else{
                            ksort($dados);
                        }
                        ?>
                        <form method="post">
                            <button class="btn btn-warning" type="submit" value="cres" name="cres">Ordem Crescente</button>
                            <button class="btn btn-warning " type="submit" value="dec" name="dec">Ordem Decrescente</button>
                        </form>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>COD..</th>
                                    <th>NOME</th>
                                    <th>E-MAILL</th>
                                    <th>TELEFONE</th>
                                    <th>FÍSICA | JÚRIDICA</th>
                                    <th>ESTRELAS</th>
                                    <th>VISUALIZAR</th>
                                    <th>ALTERAR</th>
                                    <th>DELETAR</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($dados as $key => $value) {
                                ?>
                                <tr>
                                <td><?php echo $value["id"];?></td>
                                <td><?php echo $value["nome"];?></td>
                                <td><?php echo $value["email"];?></td>
                                <td><?php echo $value["telefone"];?></td>
                                <td><?php echo $value["tipo"];?></td>
                                <td><?php echo $value["estrela"];?></td>
                                <td><a href="visualizarCliente?<?php echo $value["id"];?>"><button class="btn btn-info " type="submit" name="visualizar" >Visualizar</button></a></td>
                                <td><a href="#"><button class="btn btn-primary disabled" type="submit" name="alterar" >Alterar</button></a></td>
                                <td><a href="#"><button class="btn btn-danger disabled" type="submit" name="deletar">Deletar</button></a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div><!-- /jumbotron -->