<?php
/*
* @author Candido Souza
* Projeto: Estudos Potal Code Education - Módulo 03 Php Foundation
* Arquivo: fixture.php
* Linguagem: php
* Data: 17/07/2014
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>4º Projeto php Code Education</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="painel/css/style.css" type="text/css" rel="stylesheet" />
    <link href="painel/css/bootstrap.css" type="text/css" rel="stylesheet" />
</head>
    <body>
        <div id="body-container">
            <div id="body-content">
                <section class="page container">
                    <div class="row">
                        <div class="page-header">
                            <h1>Administração <small>04 Projeto - Code Education</small></h1>
                        </div>
                            <div class="col-md-6 col-md-offset-3">
                                <form action="painel/index.php" name="formAdmin" method="post">
                                    <div class="form-group">
                                      <label>Email</label>
                                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                      <label>Password</label>
                                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-default" type="submit" name="send">Entrar</button>
                                    </div>
                                </form>
                                <!--/form-->
                            </div>
                    </div>
                </section>
                <footer class="footer">
                    <p>Administração | 04 Projeto - Code Education</p>
                    <p>&copy Todos os direitos reservados 2014 - <?php echo date('Y');?></p>
                </footer>
                <!--/footer-->
            </div>
        </div>
    </body>
</html>