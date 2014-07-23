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
session_start();
require_once 'functions/functionsDb.php';
require_once 'functions/route.php';

if(!($_SESSION['loginUser'])){
    header('Location: ../index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>4º Projeto php Code Education</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div id="body-container">
        <div id="body-content">
            <section class="page container">
                <div class="row">
                    <div class="page-header col-md-12">
                        <div class="col-md-10">
                            <h1>Administração <small>04 Projeto - Code Education</small></h1>
                        </div>
                        <div class="col-md-2">
                            <a href="logoff.php"><button class="btn btn-warning" type="submit" name="alterar" >SAIR | DESLOGAR</button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <ul class="nav list-group">
                            <li class="list-group-item active">Paginas</a></li>
                            <li><a href="pages/listarPages.php">Listar</a></li>
                            <li class="list-group-item active">Asuários</li>
                            <li><a href="#">Criar</a></li>
                            <li><a href="#">Alterar</a></li>
                            <li><a href="#">Listar</a></li>
                            <li><a href="#">Deletar</a></li>
                        </ul>
                    </div>
                   
                    <?php require_once(route());?> 
                    
                </div>
            </section>
            <footer class="footer">
                <p>Administração | 04 Projeto - Code Education</p>
                <p>&copy Todos os direitos reservados 2014 - <?php echo date('Y'); ?></p>
            </footer>
        </div>
    </div>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
            CKEDITOR.replace( 'editor1' );
    </script>
</body>
</html>