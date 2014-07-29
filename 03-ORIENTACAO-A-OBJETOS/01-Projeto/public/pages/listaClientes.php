                    <h1>Lista de Clientes</h1>
                    <div class="jumbotron">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>COD..</th>
                                    <th>NOME</th>
                                    <th>SOBRENOME</th>
                                    <th>E-MAILL</th>
                                    <th>TELEFONE</th>
                                    <th>VISUALIZAR</th>
                                    <th>ALTERAR</th>
                                    <th>DELETAR</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($clientes as $key => $value) {
                                ?>
                                <tr>
                                <td><?php echo $value->getId();?></td>
                                <td><?php echo $value->getNome();?></td>
                                <td><?php echo $value->getSobrenome();?></td>
                                <td><?php echo $value->getEmail();?></td>
                                <td><?php echo $value->getTelefone();?></td>
                                <td><a href="visualizarCliente?<?php echo $value->getId();?>"><button class="btn btn-info " type="submit" name="visualizar" >Visualizar</button></a></td>
                                <td><a href="#"><button class="btn btn-primary disabled" type="submit" name="alterar" >Alterar</button></a></td>
                                <td><a href="#"><button class="btn btn-danger disabled" type="submit" name="deletar">Deletar</button></a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div><!-- /jumbotron -->