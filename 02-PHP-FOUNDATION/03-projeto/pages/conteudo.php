<?php
/*
* @author Candido Souza
* Projeto: Estudos Potal Code Education - Módulo 03 Php Foundation
* Arquivo: fixture.php
* Linguagem: php
* Data: 17/07/2014
 */

// Recebe a rota e imprime o conteúdo do banco de dados

$pagina = routeUrl();
?>
<section>
    <div class="row">
            <div class="col-lg-12">
                    <div class="jumbotron">
                            <h1><?php echo $pagina['conteudo_titulo'];?></h1>
                            <div class="page-header">
                                <h2><?php echo $pagina['conteudo_principal'];?></h2>
                                <small> <?php echo $pagina['conteudo_content'];?></small>
                            </div>
                    </div>
            </div>
    </div>
    <!-- /row section -->
</section>
<!-- /section -->
